<?php

namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models;

class ZyzhinanController extends Controller {
    public $layout = false;
    public function actionGuide() {
        
                // 分享JS接口
        $tokenModel = new \app\components\Token();
        // 获取JS签名
        $jsarr = $tokenModel->getSignature();
        
        return $this->render('guide',['jsarr' => $jsarr]);
    }
    
    public function actionGuidea(){
        return $this->render('guidea');
    }
    
    public function actionGuideb(){
        return $this->render('guideb');
    }
    
    public function actionGuidec(){
        return $this->render('guidec');
    }
    
    public function actionAbout(){
        return $this->render('about');
    }
}
