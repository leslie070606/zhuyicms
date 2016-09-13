<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class IndexController extends controller {

    public function actionIndex() {

        //添加登录判断
       if (!($username = Yii::$app->session->get('mrs_username')) && !($username = \backend\models\Login::loginByCookie())) {
            return $this->redirect(['site/index']);
        }

        return $this->render('index');
    }


}
