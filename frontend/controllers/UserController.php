<?php

namespace frontend\controllers;

use common\util\emaysms\Sms;
use backend\controllers\ZyuserController;
use frontend\models\User;
use yii;

class UserController extends ZyuserController {

    public $layout = false;

    public function actionIndex() {


        return $this->render('index');
    }

    public function actionLogin() {

        //判断ssion
        return $this->render('login');
    }

    public function actionPhone() {
        //手机登录
        $phone = Yii::$app->request->post('phone');
        $phonestr = Yii::$app->request->post('phonestr');
        $code = Yii::$app->request->post('code');

        if ($phone && $phonestr && $code) {
            //判断验证码是否正确
            if ($phonestr == $code) {
                $userModel = new User();
                $user = $userModel->find()->where(['phone' => $phone])->all();

                //如果不是第一次登录
                if (count($user)) {
                    //加ssion
                    echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";
                    echo "登陆成功!";
                    exit;
                } else {
                    //第一次登录添加
                    $userModel->phone = $phone;
                    $res = $userModel->save();
                    if ($res) {
                        //加ssion
                        echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";
                        echo $res;
                        echo "添加成功!";
                        exit;
                    }
                }
            }
        }
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

        if ($phone && $code) {//无提交读取页面
            if (!empty($userArr)) {
                //echo $phonestr;exit;
                if ($phonestr == $code) {
                    $userModel = new User();
                    //查询手机号码
                    $user = $userModel->find()->where(['phone' => $phone])->all();
                    //var_dump($user);exit;
                    //如果所填写的手机号码重复update
                    if(count($user)){
                       $userModel->user_id = $user[0]['user_id'];
                    }
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
                    $res = $userModel->save();
                    if ($res) {
                        echo "<img src='" . $userArr['headimgurl'] . "'/><br>";
                        echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";
                        echo "登录成功!<br>";
                        echo "您的昵称是:" . $userArr['nickname'] . "<br>";
                        echo "您绑定的手机号是:" . $phone . "<br>";
                    }
                } else {
                    echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";
                    echo "验证码错误!";
                    exit;
                }
            } else {
                echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";
                echo "找不到用户!";
                exit;
            }
        }

        return $this->render('addphone');
    }

    public function actionSendmsg() {

        $phone = Yii::$app->request->post('phone');
        //验证码
        $phonestr = $this->createNum();

        //实例化短信接口
        $sms = Yii::$app->Sms;

        $ret = $sms->send(array($phone), '欢迎注册住艺设计师平台,您的验证码是[ ' . $phonestr . ' ]');
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