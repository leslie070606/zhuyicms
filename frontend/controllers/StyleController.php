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

    public function actionIndex() {

        //判断是否登陆过
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }

        // 判断是第一次还是别人的分享
        $link_id = Yii::$app->request->get('link_id');
        if (isset($link_id) && !empty($link_id)) {
            
        } else {
            $link_id = 0;
        }

        // 判断用户是否授权成功
        if ($userinfo = $session->get('userInfo')) {

            return $this->render('index', ['link_id' => $link_id]);
        } else {
            //判断是否是微信内登录
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
                return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx36e36094bd446689&redirect_uri=http://zhuyihome.com/index.php?r=style/shouindex&response_type=code&scope=snsapi_userinfo&state=' . $link_id . '#wechat_redirect');
            } else {
                return $this->render('index', ['link_id' => $link_id]);
            }
        }
    }

    public function actionProblem() {

        //判断是否登陆过
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        $link_id = Yii::$app->request->get('link_id');
        if (isset($link_id) && !empty($link_id)) {
            
        } else {
            $link_id = 0;
        }
        // 判断用户是否授权成功
        if ($userinfo = $session->get('userInfo')) {
            return $this->render('problem', ['link_id' => $link_id]);
        } else {
            //判断是否是微信内登录
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
                return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx36e36094bd446689&redirect_uri=http://zhuyihome.com/index.php?r=style/shouproblem&response_type=code&scope=snsapi_userinfo&state=' . $link_id . '#wechat_redirect');
            } else {
                return $this->render('problem', ['link_id' => $link_id]);
            }
        }
    }

    //风格测试报告
    public function actionReport() {

        // 查看返回的结果
        $flashid = Yii::$app->request->get('flash');

        //获取分享ID
        $link_id = Yii::$app->request->get('link_id');

        // 风格结果
        $style = '';

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
                        $frindstyle = $shareModel->findAll(['source_openid' => $link_id]);
                        $mystyle = $shareModel->findOne(['link_id' => $link_id]);
                        return $this->render('mytestdata', ['mystyle' => $mystyle, 'frindstyle' => $frindstyle, 'link_id' => $link_id]);
                    } else {
                        // 有ID说明朋友在测试
                        if (isset($flashid) && !empty($flashid)) {
                            $shareModel = new \common\models\ZyShare();
                            switch ($flashid) {
                                case 'a' :
                                    $style = "波西米亚";
                                    break;
                                case 'b' :
                                    $style = "中古";
                                    break;
                                case 'c' :
                                    $style = "法式古典";
                                    break;
                                case 'd' :
                                    $style = "工业";
                                    break;
                                case 'e' :
                                    $style = "美式";
                                    break;
                                case 'f' :
                                    $style = "和式";
                                    break;
                                case 'g' :
                                    $style = "现代简约";
                                    break;
                                default :
                                    $style = '新中式';
                            }
                            $shareModel->open_id = $userinfo['openid'];
                            $shareModel->user_name = $userinfo['nickname'];
                            $shareModel->source_openid = $link_id;
                            $shareModel->headimgurl = $userinfo['headimgurl'];
                            $shareModel->create_time = (string) time();
                            $shareModel->unionid = $userinfo['unionid'];
                            $shareModel->style = $style;
                            $shareModel->link_id = $this->getRandomString();
                            $shareModel->save();
                            switch ($flashid) {
                                case 'a' :
                                    return $this->render('flasha', ['jsarr' => $jsarr, 'link_id' => $shareModel->link_id, 'userInfo' => $userinfo]);
                                    break;
                                case 'b' :
                                    return $this->render('flashb');
                            }
                        } else {
                           
                            return $this->render('flasha', ['jsarr' => $jsarr, 'link_id' => $link_id, 'frindf' => 1, 'userInfo' => $userinfo]);
                        }
                    }
                }

                // 没有link_ID分享标示 是第一次做题
            } else {
                $shareModel = new \common\models\ZyShare();
                switch ($flashid) {
                    case 'a' :
                        $style = "波西米亚";
                        break;
                    case 'b' :
                        $style = "中古";
                        break;
                    case 'c' :
                        $style = "法式古典";
                        break;
                    case 'd' :
                        $style = "工业";
                        break;
                    case 'e' :
                        $style = "美式";
                        break;
                    case 'f' :
                        $style = "和式";
                        break;
                    case 'g' :
                        $style = "现代简约";
                        break;
                    default :
                        $style = '新中式';
                }

                $shareModel->open_id = $userinfo['openid'];
                $shareModel->user_name = $userinfo['nickname'];
                $shareModel->headimgurl = $userinfo['headimgurl'];
                $shareModel->create_time = (string) time();
                $shareModel->unionid = $userinfo['unionid'];
                $shareModel->style = $style;
                $shareModel->link_id = $this->getRandomString();
                $shareModel->save();
                switch ($flashid) {
                    case 'a' :
                        return $this->render('flasha', ['jsarr' => $jsarr, 'link_id' => $shareModel->link_id, 'userInfo' => $userinfo]);
                        break;
                    case 'b' :
                        return $this->render('flashb');
                }
            }
        } else {
            // 没有登录保存变量
            //判断是否是微信内登录
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
                return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx36e36094bd446689&redirect_uri=http://zhuyihome.com/index.php?r=style/shoureport&response_type=code&scope=snsapi_userinfo&state=' . $link_id . '#wechat_redirect');
            } else {
                $userinfo['nickname']= '游客';
                $jsarr['timestamp'] = '234234234';
                switch ($flashid) {
                    case 'a' :
                        return $this->render('flasha',['userInfo' => $userinfo,'jsarr' => $jsarr,'link_id'=>'1233']);
                        break;
                    case 'b' :
                        return $this->render('flashb');
                }
            }
        }
    }

    //风格报告分享
    public function actionChosestyle() {

        //判断是否登陆过
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        // 判断用户是否授权成功
        if ($userinfo = $session->get('userInfo')) {
            return $this->render('chosestyle');
        } else {
            //判断是否是微信内登录
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
                return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx36e36094bd446689&redirect_uri=http://zhuyihome.com/index.php?r=style/Shouchosestyle&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect');
            }
        }
    }

    // 查看朋友的具体测试
    public function actionFriendstyle() {
        //判断是否登陆过
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }

        $style = Yii::$app->request->get('style');
        $link_id = Yii::$app->request->get('link_id');
        // 判断用户是否授权成功
        if ($userinfo = $session->get('userInfo')) {

            $shareModel = new \common\models\ZyShare();

            $friendstyle = $shareModel->find()->where(['style' => $style, 'source_openid' => $link_id])->all();

            return $this->render('friendtest', ['friendstyle' => $friendstyle, 'style' => $style]);
        } else {
            //判断是否是微信内登录
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
                return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx36e36094bd446689&redirect_uri=http://zhuyihome.com/index.php?r=style/Shoufstyle&response_type=code&scope=snsapi_userinfo&state=' . $link_id . '#wechat_redirect');
            }
        }
    }

    //首页微信授权
    public function actionShouindex() {
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

            // 授权登录成功!
            $session->set('userInfo', $userinfo);

            $this->redirect(array('style/index', 'link_id' => $link_id));
        }
    }

    //问题页微信授权
    public function actionShouproblem() {
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

            // 授权登录成功!
            $session->set('userInfo', $userinfo);

            $this->redirect(array('style/problem', 'link_id' => $link_id));
        }
    }

    //结果页微信授权
    public function actionShoureport() {
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

            // 授权登录成功!
            $session->set('userInfo', $userinfo);


            $this->redirect(array('style/report', 'link_id' => $link_id));
        }
    }

    //选择其它风格授权
    public function actionShouchosestyle() {
        $code = $_GET['code'];

        //$link_id = Yii::$app->request->get('state');

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

            // 授权登录成功!
            $session->set('userInfo', $userinfo);

            $this->redirect(array('style/chosestyle'));
        }
    }

    //朋友的风格结果授权
    public function actionShoufstyle() {
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

            // 授权登录成功!
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
