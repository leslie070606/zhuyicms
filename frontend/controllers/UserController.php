<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use backend\controllers\ZyuserController;

class UserController extends ZyuserController {

    public $layout = false;

    public function actionIndex() {

        return $this->render('index');
    }

    public function actionLogin() {
        return $this->render('login');
    }

    //微信授权
    public function actionWechatAllow() {
        
        $code = $_GET['code'];
        
        if(!$code){
            return $this->redirect('login');
        }

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx1344a7a9fac82094&secret=9243c0f51650717abdca06178461c137&code=" . $code . "&grant_type=authorization_code";

        $res = $this->doCurlGetRequest($url);

        $res = json_decode($res, TRUE);

        $urlUser = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $res['access_token'] . "&openid=" . $res['openid'] . "";
        $userinfo = $this->doCurlGetRequest($urlUser);
        $userArr = json_decode($userinfo, TRUE);
        
        if(empty($userArr)){
            return $this->redirect('login');
        }
        
        $userModel = new common\models\User();
        
        $userModel->openid = $userArr['openid'];
        $userModel->nickname = $userArr['nickname'];
        $userModel->sex = $userArr['sex'];
        $userModel->language = $userArr['language'];
        $userModel->city = $userArr['city'];
        $userModel->province = $userArr['province'];
        $userModel->country = $userArr['country'];
        $userModel->headimgurl = $userArr['headimgurl'];
        $userModel->unionid = $userArr['unionid'];
        $userModel->save();
        return $this->render('');
    }

}
