<?php

namespace backend\controllers;

use yii\web\Controller;
use yii;

class LoginController extends Controller {

    public $layout = 'main-login'; //使用布局main-login

    public function actions() {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'maxLength' => 4,
                'minLength' => 4,
                'width' => 80,
                'height' => 40
            ],
        ];
    }

    public function actionIndex() {

        $model = new \backend\models\Login();
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->redirect(['index/index']);
        }
        
        return $this->render('index', ['model' => $model]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
