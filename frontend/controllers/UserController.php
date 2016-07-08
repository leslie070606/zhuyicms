<?php

namespace frontend\controllers;

use backend\controllers\ZyuserController;
use frontend\models\User;

class UserController extends ZyuserController {

    public $layout = false;

    public function actionIndex() {

        return $this->render('index');
    }

    public function actionLogin() {
        return $this->render('login');
    }

    //微信授权
    public function actionWechat_allow() {

        $code = isset($_GET['code']) ? $_GET['code'] : '';

        if (!$code) {
            return $this->redirect(array('user/login'));
        }

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx36e36094bd446689&secret=1d8f874eda186deee2c8a81b577fe094&code=" . $code . "&grant_type=authorization_code";

        $res = $this->doCurlGetRequest($url);

        $res = json_decode($res, TRUE);

        $urlUser = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $res['access_token'] . "&openid=" . $res['openid'] . "";
        $userinfo = $this->doCurlGetRequest($urlUser);
        $userArr = json_decode($userinfo, TRUE);

        if (empty($userArr)) {
            return $this->redirect(array('user/login'));
        }
//         echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";
//       print_r($userArr);exit;
        // 获取用户openID 判断是不是首次登陆
        $userModel = new User();
        $user = $userModel->find()->where(['openid' => $userArr['openid']])->all();

        if (count($user)) {
            //登陆成功 加ssion
            echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";
            echo "登陆成功!";
            exit;
        } else {
            //第一次登陆绑定手机
            return $this->rsedirect(array('user/addphone', 'userinfo' => $userinfo));
        }
    }

    public function actionAddphone() {

        $userinfo = Yii::$app->request->get('userinfo');
        $userArr = json_decode($userinfo, TRUE);
        print_r($userArr);exit;
        // 存入用户信息
        $userModel->openid = $userArr['openid'];
        $userModel->nickname = $userArr['nickname'];
        $userModel->sex = $userArr['sex'];
        $userModel->language = $userArr['language'];
        $userModel->city = $userArr['city'];
        //$userModel->province = $userArr['province']; //数据库没有
        $userModel->country = $userArr['country'];
        $userModel->headimgurl = $userArr['headimgurl'];
        $userModel->unionid = $userArr['unionid'];
        $userModel->save();

        return $this->render('addphone');
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
