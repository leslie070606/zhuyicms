<?php

namespace backend\controllers;

use yii\web\Controller;
use bacend\models;
use yii;

class DesignerController extends controller {

    public function actionIndex() {

        $designerlistModel = new \backend\models\DesignerBasic();

        $designer = $designerlistModel::find();

        $pagination = new \yii\data\Pagination(['totalCount' => $designer->count(), 'pageSize' => 10]);

        $data = $designer->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render("index", ['data' => $data, 'pagination' => $pagination]);
    }

    public function actionEdit($id) {

        $id = (int) $id;
        
        // 判断是否有可编辑数据
        $designerbasicModel = new \backend\models\DesignerBasic();
        if ($id > 0 && ($designerbasicModel = $designerbasicModel::findOne($id))) {

            // 判断是否是ajax提交 以及是否是编辑动作
            if (Yii::$app->request->isPost && Yii::$app->request->isAjax) {

                // 获取表单类型
                $formx = array_keys(Yii::$app->request->post());
                // 判断是那张表的信息
                if ("DesignerBasic" == $formx[1]) {
                    //判断model
                    $designerbasicModel = new \backend\models\DesignerBasic();
                    $designerbasicModel = $designerbasicModel::findOne($id);
                    $designerbasicModel->load(Yii::$app->request->post());
                    if ($designerbasicModel->save()) {
                        return '修改成功!';
                    } else {
                        return '失败!';
                    }
                }
            } else {
                //$designerbasicModel = new \backend\models\DesignerBasic();
                // 非编辑动作 跳转页面
                return $this->render('edit', ['model' => $designerbasicModel]);
            }
        } else {
            return $this->redirect(['index']);
        }
    }

    public function actionAdd() {
        // 返回json格式响应
        // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        // 判断是否是ajax提交 以及是否是添加动作
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {

            // 获取表单类型
            $formx = array_keys(Yii::$app->request->post());

            // 判断是那张表的信息
            if ("DesignerBasic" == $formx[1]) {
                //判断model
                $designerbasicModel = new \backend\models\DesignerBasic();
                $designerbasicModel->load(Yii::$app->request->post());
                if ($designerbasicModel->save()) {
                    return '添加成功!';
                } else {
                    return '失败!';
                }
            }
        } else {
            // 非添加动作 跳转页面
            $designerlistModel = new \backend\models\DesignerBasic();
            return $this->render('add', ['model' => $designerlistModel]);
        }
    }

    public function actionDelete($id) {
        $designerlistModel = new \backend\models\DesignerBasic();

        $id = (int) $id;
        if ($id > 0) {
            $designerlistModel::findOne($id)->delete();
        }
        return $this->redirect(['index']);
    }

}
