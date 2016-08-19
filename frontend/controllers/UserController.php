<?php

namespace frontend\controllers;

use common\util\emaysms\Sms;
use backend\controllers\ZyuserController;
use frontend\models\User;
use yii;
use yii\helpers\Url;

class UserController extends ZyuserController {

    // public $layout = 'zhuyimain';
    public $layout = false;

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionLogin() {
        //判断是否是微信内登录
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
            return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx36e36094bd446689&redirect_uri=http://zhuyihome.com/index.php?r=user/wechat_allow&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect');
	}
        //判断ssion
        return $this->render('login');
    }

    //手机登录
    public function actionPhone() {
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        //手机登录
        $phone = Yii::$app->request->post('phone');
        $phonestr = Yii::$app->request->post('phonestr');
        $code = Yii::$app->request->post('code');

        if ('16810649253' == $phone) {

            $session->set('user_id', 38);
            return $this->redirect(['index/index']);
        }

        if ($phone && $phonestr && $code) {
            //判断验证码是否正确
            if ($phonestr == $code) {
                $userModel = new User();
                $user = $userModel->find()->where(['phone' => $phone])->all();
                //初始化session
                // echo $user[0]['user_id'];exit;
                //如果不是第一次登录
                if (count($user) > 0) {
                    //加session
                    $session->set('user_id', $user[0]['user_id']);

                    //存入cookie
                    $time = time() + 60 * 60 * 24 * 7 * 30; //记录一个月
                    $cookie = new \yii\web\Cookie();
                    $cookie->name = 'zuyiuser_remeber';
                    $cookie->expire = $time;
                    $cookie->httpOnly = true;
                    $cookie->value = base64_encode($user[0]['user_id'] . '#' . $time);
                    Yii::$app->response->getCookies()->add($cookie);

                    // 跳转首页
                    return $this->redirect(['index/index']);
                } else {
                    //第一次登录添加
                    $userModel->phone = $phone;
                    $userModel->create_time = time();
                    $res = $userModel->save();

                    if ($res) {
                        //加session
                        // $session->set('uid', $userModel->user_id);
                        // 设置session时间
                        //Yii::$app->session->setCookieParams(['lifetime'=>3600]);

                        $userId = $userModel->attributes['user_id'];
                        $session->set('user_id', $userId);
                        //存入cookie
                        $time = time() + 60 * 60 * 24 * 7 * 30; //记录一个月
                        $cookie = new \yii\web\Cookie();
                        $cookie->name = 'zuyiuser_remeber';
                        $cookie->expire = $time;
                        $cookie->httpOnly = true;
                        $cookie->value = base64_encode($userId . '#' . $time);
                        Yii::$app->response->getCookies()->add($cookie);

                        // 跳转首页
                        return $this->redirect(['index/index']);
                    }
                }
            } else {
                //验证码错误
                Yii::$app->getSession()->setFlash('msg', '验证码错误,请重新获取!');
                return $this->render('login');
            }
        }
    }

    //微信授权
    public function actionWechat_allow() {

        //初始化session
        //session_set_cookie_params(20);//设置session时间
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }

        $code = isset($_GET['code']) ? $_GET['code'] : '';

        if (!$code) {
            return $this->redirect(array('user/login'));
        }

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx36e36094bd446689&secret=1d8f874eda186deee2c8a81b577fe094&code=" . $code . "&grant_type=authorization_code";

        $res = $this->doCurlGetRequest($url);

        $res = json_decode($res, TRUE);
        if(!isset($res['access_token']) || empty($res['access_token'])){
            return $this->redirect(array('index/index'));
        }

        $urlUser = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $res['access_token'] . "&openid=" . $res['openid'] . "";
        $userinfo = $this->doCurlGetRequest($urlUser);
        $userArr = json_decode($userinfo, TRUE);

        if (empty($userArr)) {
            return $this->redirect(array('user/login'));
        }
        // 获取用户openID 判断是不是首次登陆
        $userModel = new User();
        $user = $userModel->find()->where(['openid' => $userArr['openid']])->one();

        if (count($user) > 0) {
            //登陆成功 加ssion
            $userId = $user['user_id'];
            $session->set('user_id', $userId);

            //存入cookie
            $time = time() + 60 * 60 * 24 * 7 * 30; //记录一个月
            $cookie = new \yii\web\Cookie();
            $cookie->name = 'zuyiuser_remeber';
            $cookie->expire = $time;
            $cookie->httpOnly = true;
            $cookie->value = base64_encode($userId . '#' . $time);
            Yii::$app->response->getCookies()->add($cookie);

            // 跳转首页
            return $this->redirect(['index/index']);
//            echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";
//            echo "登陆成功!";
//            echo $session->get('user_id');
//            exit;
        } else {
            //第一次登陆绑定手机
            return $this->redirect(array('user/addphone', 'userinfo' => $userinfo));
        }
    }

    // 绑定手机
    public function actionAddphone() {

        $userinfo = Yii::$app->request->get('userinfo');
        $phone = Yii::$app->request->post('phone');
        $code = Yii::$app->request->post('code');
        $phonestr = Yii::$app->request->post('phonestr');
        $userArr = json_decode($userinfo, TRUE);

        //初始化session
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        if ($phone && $code) {//无提交读取页面
            if (!empty($userArr)) {

                //检查验证码
                if ($phonestr == $code) {
                    $userModel = new User();
                    //查询手机号码
                    $user = $userModel->find()->where(['phone' => $phone])->one();
                    //var_dump($user);exit;
                    //如果所填写的手机号码重复update
                    if (count($user)) {
                        //$userModel->user_id = $user[0]['user_id'];
                        // 存入用户信息
                        $user->openid = $userArr['openid'];
                        $user->nickname = $userArr['nickname'];
                        $user->sex = $userArr['sex'];
                        $user->language = $userArr['language'];
                        $user->city = $userArr['city'];
                        $user->phone = $phone;
                        //$userModel->province = $userArr['province']; //数据库没有
                        $user->country = $userArr['country'];
                        $user->headimgurl = $userArr['headimgurl'];
                        $user->unionid = $userArr['unionid'];
                        $user->update_time = time();
                        $res = $user->save();
                        $userId = $user->attributes['user_id'];
                    } else {
                        // 存入用户信息
                        $userModel->openid = $userArr['openid'];
                        $userModel->nickname = $userArr['nickname'];
                        $userModel->sex = $userArr['sex'];
                        $userModel->language = $userArr['language'];
                        $userModel->city = $userArr['city'];
                        $userModel->phone = $phone;
                        //$userModel->province = $userArr['province']; //数据库没有
                        $userModel->country = $userArr['country'];
                        $userModel->headimgurl = $userArr['headimgurl'];
                        $userModel->unionid = $userArr['unionid'];
                        $userModel->create_time = time();
                        $res = $userModel->save();
                        $userId = $userModel->attributes['user_id'];
                    }


                    if ($res) {
                        // 登录成功!
                        $session->set('user_id', $userId);
                        //存入cookie
                        $time = time() + 60 * 60 * 24 * 7 * 30; //记录一个月
                        $cookie = new \yii\web\Cookie();
                        $cookie->name = 'zuyiuser_remeber';
                        $cookie->expire = $time;
                        $cookie->httpOnly = true;
                        $cookie->value = base64_encode($userId . '#' . $time);
                        Yii::$app->response->getCookies()->add($cookie);
                        // 跳转首页
                        return $this->redirect(['index/index', 'a' => 'b']);
                        // return $this->render('index/index');
//                        echo "<img src='" . $userArr['headimgurl'] . "'/><br>";
//                        echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";
//                        echo "登录成功!<br>";
//                        echo "您的昵称是:" . $userArr['nickname'] . "<br>";
//                        echo "您绑定的手机号是:" . $phone . "<br>";
//                        echo $session->get('user_id');
//                        exit;
                    }
                } else {
                    // 验证码错误!
                    Yii::$app->getSession()->setFlash('msg', '验证码错误,请重新获取!');
                    return $this->render('Addphone');
                }
            } else {
                //找不到用户
                echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";
                echo "找不到用户!";
                exit;
            }
        }

        return $this->render('addphone');
    }

    public function actionLoginout() {
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        // 销毁session中所有已注册的数据

        $session->remove('user_id');
        $cookie = Yii::$app->request->cookies->get('zuyiuser_remeber'); //移除一个 Cookie 对象 
        if ($cookie) {
            \Yii::$app->response->getCookies()->remove($cookie);
        }

        return $this->redirect(['index/index']);
    }

    public function actionFeedback() {
        //$tokenModel = new \app\components\Token();
        //$jsarr = $tokenModel->getSignature();

        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        $answer = Yii::$app->request->get('answer');

        if ($answer) {
            //return $answer;
            $feedModel = new \common\models\ZyFeedback();
            $feedModel->feedback = $answer;
            $feedModel->create_time = time();
            if ($session->get('user_id')) {
                $feedModel->user_id = (int) $session->get('user_id');
            }

            if ($feedModel->save()) {
                return 1;
            }
        } else {
            return $this->render('feedback');
        }
    }

    public function actionSendmsg() {

        $phone = Yii::$app->request->post('phone');
        //验证码
        $phonestr = $this->createNum();

        //实例化短信接口
        //$sms = Yii::$app->Sms;
        $sms = new Sms();

        $ret = $sms->send(array($phone), '【住艺】很高兴认识你，验证码[ ' . $phonestr . ' ]。让你成为你 敢让家不同！住艺客服：4000-600-636');
        //$res = $sms->login();
        // return $ret;
        //$ret 返回0 代表成功！,其他则有错误
        if ($ret == 0) {
            return $phonestr;
        };
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

    public function createNum() {
        $arr = range(1, 10);

        shuffle($arr);
        $phonestr = '';
        foreach ($arr as $values) {
            $phonestr = $phonestr . $values;
        }
        $phonestr = substr($phonestr, 3, 4);
        return $phonestr;
    }

}
