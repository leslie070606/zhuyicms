<?php

namespace frontend\controllers;

use Yii;
use common\models\Style;
use backend\models\search\StyleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StyleController implements the CRUD actions for Style model.
 */
class StyleController extends Controller {

    public $layout = false;

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Style models.
     * @return mixed
     */
    public function actionIndex() {
        //判断是否是微信内登录
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
            return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx36e36094bd446689&redirect_uri=http://zhuyihome.com/index.php?r=style/shou&response_type=code&scope=snsapi_userinfo&state=0#wechat_redirect');
        }
    }

    public function actionChoicestyle() {

        //授权
        //判断用户是否登录
//        $session = Yii::$app->session;
//        if (!$session->isActive) {
//            $session->open();
//        }
//        $userId = $session->get("user_id");
//        if (!isset($userId) || empty($userId)) {
//            $_cookieSts = \common\controllers\BaseController::checkLoginCookie();
//            if ($_cookieSts) {
//                $userId = $session->get("user_id");
//            } else {
//                $userId = '';
//            }
//        }
//        
//        //没有登录跳转到登录
//        if (!$userId) {
//            // 
//            return $this->redirect(['user/login']);
//        }
        //判断是否已经有风格测试
//        $styleModel = new Style();
//        $userStyle = $styleModel->findOne(['user_id'=>$userId]);
//        if(count($userStyle)>0){
//            return $this->redirect(['project/match_designer']);
//        }

        if (Yii::$app->request->get('g')) {

            $styleModel = new Style();
            $styleModel->user_id = $userId;
            $styleModel->choice_style = Yii::$app->request->get('g');
            $res = $styleModel->save();

            return Yii::$app->request->get('g');
        }

        return $this->render('choicestyle');
    }

    //风格测试报告
    public function actionReport() {

        $link_id = Yii::$app->request->get('link_id');
        if (isset($link_id) && !empty($link_id)) {
            
        } else {
            $link_id = 0;
        }
        //判断是否登陆过
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }

        // 分享JS接口
        $tokenModel = new \app\components\Token();
        // 获取JS签名
        $jsarr = $tokenModel->getSignature();

        //已经登录过
        if ($userinfo = $session->get('userInfo')) {

            // 如果有ID标示 说明是别人分享的
            if ($link_id) {
                // 判断是不是自己查看自己的分享
                $shareModel = new \common\models\ZyShare();
                $res = $shareModel->findOne(['link_id' => $link_id]);
                if (count($res) > 0) {
                    // 是自己查看自己的
                    if ($res['open_id'] == $userinfo['openid']) {
                        $farr = $shareModel->findAll(['source_openid' => $link_id]);
                        echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";
                        echo "自己查看自己!<br>";
                        foreach ($farr as $val) {
                            echo $val['user_name'] . "已完成测试!<br>";
                        }
                    } else {
                        //朋友查看分享
                        echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";

                        echo $res['user_name'] . "他的风格是日式!<br>";

                        $shareModel->open_id = $userinfo['openid'];
                        $shareModel->user_name = $userinfo['nickname'];
                        $shareModel->headimgurl = $userinfo['headimgurl'];
                         $shareModel->source_openid = $link_id;
                        $shareModel->create_time = (string) time();
                        $shareModel->unionid = $userinfo['unionid'];
                        $shareModel->link_id = $this->getRandomString();
                        $shareModel->save();
                        return $this->render('report', ['jsarr' => $jsarr, 'link_id' => $shareModel->link_id, 'userInfo' => $userinfo]);

                    }
                }

                // 没有link_ID分享标示 是第一次做题
            } else {
                $shareModel = new \common\models\ZyShare();

                $shareModel->open_id = $userinfo['openid'];
                $shareModel->user_name = $userinfo['nickname'];
                $shareModel->headimgurl = $userinfo['headimgurl'];
                $shareModel->create_time = (string) time();
                $shareModel->unionid = $userinfo['unionid'];
                $shareModel->link_id = $this->getRandomString();
                $shareModel->save();
                $share_id = $shareModel->attributes['share_id'];
                echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";
                echo $share_id . "###";
                return $this->render('report', ['jsarr' => $jsarr, 'link_id' => $shareModel->link_id, 'userInfo' => $userinfo]);
            }

            echo $link_id . '<br>';
            print_r($userinfo);
        } else {
            // 没有登录保存变量
            //判断是否是微信内登录
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
                return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx36e36094bd446689&redirect_uri=http://zhuyihome.com/index.php?r=style/shou&response_type=code&scope=snsapi_userinfo&state=' . $link_id . '#wechat_redirect');
            }
        }

        exit;
    }

    //风格报告分享
    public function actionShare() {

        $tokenModel = new \app\components\Token();

        // 获取JS签名
        $jsarr = $tokenModel->getSignature();

        return $this->render('share', ['jsarr' => $jsarr]);
    }

    //微信授权
    public function actionShou() {
        $code = $_GET['code'];

        $link_id = Yii::$app->request->get('state');

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx36e36094bd446689&secret=1d8f874eda186deee2c8a81b577fe094&code=" . $code . "&grant_type=authorization_code";

        $res = $this->doCurlGetRequest($url);

        $res = json_decode($res, TRUE);

        $urlUser = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $res['access_token'] . "&openid=" . $res['openid'] . "";
        $userinfo = $this->doCurlGetRequest($urlUser);
        $userinfo = json_decode($userinfo, TRUE);

        if (count($userinfo) > 0) {
            //初始化session
            $session = Yii::$app->session;
            if (!$session->isActive) {
                $session->open();
            }

            // 登录成功!
            $session->set('userInfo', $userinfo);
            $this->redirect(array('style/report', 'link_id' => $link_id));
        }
    }

    public function getRandomString($len = 6, $type = '3') {
        if ($type == '1') {
            $str = '0123456789';
        } elseif ($type == '2') {
            $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxzy';
        } elseif ($type == '3') {
            $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxzy';
        }
        $n = $len;
        $len = strlen($str) - 1;
        $s = '';
        for ($i = 0; $i < $n; $i ++) {
            $s .= $str [rand(0, $len)];
        }
        return $s;
    }

    private function doCurlGetRequest($url, $data = array(), $timeout = 10) {
        if ($url == "" || $timeout <= 0) {
            return false;
        }
        if ($data != array()) {
            $url = $url . '?' . http_build_query($data);
        }

        $con = curl_init((string) $url);
        curl_setopt($con, CURLOPT_HEADER, false);
        curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($con, CURLOPT_TIMEOUT, (int) $timeout);

        // 访问https 需要设置
        curl_setopt($con, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书 
        curl_setopt($con, CURLOPT_SSL_VERIFYHOST, 0); // 检查证书中是否设置域名（为0也可以，就是连域名存在与否都不验证了）

        return curl_exec($con);
    }

}
