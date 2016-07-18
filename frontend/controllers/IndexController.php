<?php

namespace frontend\controllers;

use yii\web\Controller;

class IndexController extends Controller {
    
    public $layout = false;
    
    public function actionIndex(){
        
        $model = new \common\models\ZyIndex();
        $video = $model->find()->orderBy('sort asc')->all();
        
        return $this->render('index',['data'=>$video]);
    }
}

