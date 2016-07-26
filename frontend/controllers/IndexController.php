<?php

namespace frontend\controllers;
use yii;
use yii\web\Controller;

class IndexController extends Controller {

    public $layout = 'zhuyimain';

    public function actionIndex() {
//        //初始化session
//        $session = Yii::$app->session;
//        if (!$session->isActive) {
//            $session->open();
//        }
//        //session_set_cookie_params(10);
//        if($session->get('user_id')){
//            echo $session->get('user_id');
//            exit;
//        }else{
//            echo 'no login!';
//            exit;
//        }
        $model = new \common\models\ZyIndex();
        $video = $model->find()->orderBy('sort asc')->all();

        return $this->render('index', ['data' => $video]);
    }
    
    public function actionTest(){
        $session = Yii::$app->session;
        
        if (!$session->isActive) {
            $session->open();
        }
        //session_set_cookie_params(10);
        $session->set('user_id', '123');
        //$session->removeall();
        return $this->render('test');
    }

}
