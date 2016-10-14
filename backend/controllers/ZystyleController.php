<?php

namespace backend\controllers;

use yii\web\Controller;
use bacend\models;
use yii\web\UploadedFile;
use yii;

class ZystyleController extends Controller {

    public function actionIndex() {

        $styleModel = new \common\models\ZyShare();
        $res = $styleModel->find()->orderBy('create_time desc');

        $pagination = new \yii\data\Pagination(['totalCount' => $res->count(), 'pageSize' => 10]);

        $data = $res->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render("index", [
            'styleList' => $data,
            'pagination' => $pagination,
            'model' => $res,
            'getParams' => Yii::$app->request->get()
        ]);

       // return $this->render('index', ['styleList' => $res]);
    }

}
