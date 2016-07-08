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
    public function actionWechat_allow() {
        
        $code = isset($_GET['code'])? $_GET['code'] : '';
        
        if(!$code){
            return $this->redirect(array('user/login'));
        }

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx36e36094bd446689&secret=1d8f874eda186deee2c8a81b577fe094&code=" . $code . "&grant_type=authorization_code";

        $res = $this->doCurlGetRequest($url);

        $res = json_decode($res, TRUE);

        $urlUser = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $res['access_token'] . "&openid=" . $res['openid'] . "";
        $userinfo = $this->doCurlGetRequest($urlUser);
        $userArr = json_decode($userinfo, TRUE);
        
        if(empty($userArr)){
            return $this->redirect(array('user/login'));
        }
        
        $userModel = new common\models\ZyUser();
        
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
