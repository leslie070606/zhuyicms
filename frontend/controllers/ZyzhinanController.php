<?php

namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models;

class ZyzhinanController extends Controller {
    public $layout = false;
    public function actionGuide() {
        
        return $this->render('guide');
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

}
