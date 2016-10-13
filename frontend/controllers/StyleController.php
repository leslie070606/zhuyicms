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
            return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx36e36094bd446689&redirect_uri=http://zhuyihome.com/index.php?r=style/shou&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect');
                       // return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx36e36094bd446689&redirect_uri=http://192.168.104.81/zhuyicms/frontend/web/index.php?r=style/shou&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect');

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
//         $shareModel = new \common\models\ZyShare();
//         $shareModel->user_name = '123';
//          $shareModel->save();
//        $share_id = $shareModel->attributes['share_id'];
//        
//        echo $share_id."###";exit;
        
//        $userinfo =  Yii::$app->request->get('userInfo');
//          echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";
//        print_r($userinfo);
        
        $shareModel = new \common\models\ZyShare();
        
       // $shareModel->open_id = $userinfo['openid'];
        $shareModel->user_name = '123';
       // $shareModel->headimgurl = $userinfo['headimgurl'];
       // $shareModel->create_time = time();
       // $shareModel->unionid = $userinfo['unionid'];
        
        $shareModel->save();
        $share_id = $shareModel->attributes['share_id'];
        
        echo $share_id."###";
        
       // print_r($shareModel);
        
      
        $v = 1;

        //Yii::$app->request->post();
//        $newdata = Yii::$app->request->get('newdata');
//        $style = explode(',', $newdata);
//
//        $jsonstyle = json_encode($style);
//
//        $model = new Style();
//
//        $model->user_id = 1;
//        $model->type = $jsonstyle;
//        $v = $model->save();
//
//        $num = $style[0] + $style[2] + $style[4];
//
//        $styleArr = array(
//            $style[1] => $style[0] / $num * 100,
//            $style[3] => $style[2] / $num * 100,
//            $style[5] => $style[4] / $num * 100,
//        );
        //echo "<pre>";
        //print_r($model);
        return $this->render('report', ['userInfo' => $userinfo]);
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

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx36e36094bd446689&secret=1d8f874eda186deee2c8a81b577fe094&code=" . $code . "&grant_type=authorization_code";

        $res = $this->doCurlGetRequest($url);

        $res = json_decode($res, TRUE);

        $urlUser = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $res['access_token'] . "&openid=" . $res['openid'] . "";
        $userinfo = $this->doCurlGetRequest($urlUser);
        $userinfo = json_decode($userinfo, TRUE);
        
        if(count($userinfo)>0){
            $this->redirect(array('style/report','userInfo'=>$userinfo));
        }
        
      
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
