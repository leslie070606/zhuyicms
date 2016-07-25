<?php

namespace frontend\controllers;

use yii\web\Controller;

class IndexController extends Controller {

    public $layout = false;

    public function actionIndex() {
        //初始化session
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        
        if($session->get('user_id')){
            echo $session->get('user_id');
            exit;
        }else{
            echo 'no login!';
            exit;
        }
        $model = new \common\models\ZyIndex();
        $video = $model->find()->orderBy('sort asc')->all();

        return $this->render('index', ['data' => $video]);
    }

}
