<?php

namespace backend\controllers;

use yii\web\Controller;
use bacend\models;
use yii;

class DesignerController extends controller {

    public function actionIndex() {

        $designerlistModel = new \backend\models\DesignerBasic();
        //$designerList = $designerlistModel->getAllDesigner();
        $designer = $designerlistModel::find();
        $pagination = new \yii\data\Pagination(['totalCount' => $designer->count(), 'pageSize' => 10]);
        $data = $designer->offset($pagination->offset)->limit($pagination->limit)->all();
        
//        echo "<pre>";
//        print_r($pagination->totalCount);
        return $this->render("index", ['data' => $data, 'pagination' => $pagination]);
    }

    public function actionEdit($id) {
        $designerlistModel = new \backend\models\DesignerList();

        $id = (int) $id;
        if ($id > 0 && ($designerlistModel = $designerlistModel::findOne($id))) {

            if (Yii::$app->request->isPost && $designerlistModel->load(Yii::$app->request->post()) && $designerlistModel->save()) {
                return $this->redirect(['index']);
            }

            return $this->render('edit', ['model' => $designerlistModel]);
        }

        return $this->redirect(['index']);
    }

    public function actionAdd() {

        $designerlistModel = new \backend\models\DesignerBasic();

        if (Yii::$app->request->isPost && $designerlistModel->load(Yii::$app->request->post()) && $designerlistModel->save()) {

            return $this->redirect(['index']);
        }
        return $this->render('add', ['model' => $designerlistModel]);
    }

    public function actionDelete($id) {
        $designerlistModel = new \backend\models\DesignerList();

        $id = (int) $id;
        if ($id > 0) {
            $designerlistModel::findOne($id)->delete();
        }
        return $this->redirect(['index']);
    }

}
