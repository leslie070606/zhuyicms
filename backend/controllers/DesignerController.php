<?php

namespace backend\controllers;

use yii\web\Controller;
use bacend\models;
use yii;

class DesignerController extends controller {
    
    public function  actions(){
        //添加登录判断
        if (!($username = Yii::$app->session->get('mrs_username')) && !($username = \backend\models\Login::loginByCookie())) {
            return $this->redirect(['login/index']);
        }
    }

    public function actionIndex() {

        $designerlistModel = new \backend\models\DesignerBasic();

        $designer = $designerlistModel::find();

        $pagination = new \yii\data\Pagination(['totalCount' => $designer->count(), 'pageSize' => 10]);

        $data = $designer->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render("index", ['data' => $data, 'pagination' => $pagination]);
    }

    public function actionEdit($id) {

        $id = (int) $id;
        //if(!$id){$id = Yii::$app->request->post('id');}
        // 判断是否有可编辑数据
        $designerbasicModel = new \backend\models\DesignerBasic();
        if ($id > 0 && ($designerbasicModel = $designerbasicModel::findOne($id))) {

            // 判断是否是ajax提交 以及是否是编辑动作
            if (Yii::$app->request->isPost && Yii::$app->request->isAjax) {
                //return $id;
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
                } else if ("DesignerWork" == $formx[1]) {
                    $designerWorkModel = new \backend\models\DesignerWork();

                    //判断是否有值
                    $dm = $designerWorkModel::findOne(['designer_id' => $id]);
                    if ($dm) {
                        $designerWorkModel = $dm;
                    }
                    $designerWorkModel->load(Yii::$app->request->post());
                    if ($designerWorkModel->save()) {
                        return '修改成功!';
                    } else {
                        return '失败!';
                    }
                } else if ('DesignerAdditional' == $formx[1]) {
                    $designerAdditionalModel = new \backend\models\DesignerAdditional();

                    //判断是否有值
                    $dm = $designerAdditionalModel::findOne(['designer_id' => $id]);
                    if ($dm) {
                        $designerAdditionalModel = $dm;
                    }

                    $designerAdditionalModel->load(Yii::$app->request->post());
                    if ($designerAdditionalModel->save()) {
                        return '修改成功!';
                    } else {
                        return '失败!';
                    }
                }
            } else {
                //赋值
                $designerAdditionalModel = new \backend\models\DesignerAdditional();
                $de = $designerAdditionalModel::findOne(['designer_id' => $id]);
                if ($de) {
                    $designerAdditionalModel = $de;
                }

                $designerWorkModel = new \backend\models\DesignerWork();
                $dm = $designerWorkModel::findOne(['designer_id' => $id]);
                if ($dm) {
                    $designerWorkModel = $dm;
                }
                // 非编辑动作 跳转页面
                return $this->render('edit', ['model' => $designerbasicModel, 'modeladditional' => $designerAdditionalModel, 'modelwork' => $designerWorkModel, 'did' => $id]);
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
            // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            // return json_encode(Yii::$app->request->post());
            // 判断是那张表的信息
            if ("DesignerBasic" == $formx[1]) {
                //判断model
                $designerbasicModel = new \backend\models\DesignerBasic();
                $designerbasicModel->load(Yii::$app->request->post());
                if ($designerbasicModel->save()) {
                    //return '添加成功!';
                    $res = array('designerID' => $designerbasicModel->id, 'msg' => '添加成功!');
                    $resjson = json_encode($res);
                    return $resjson;
                } else {
                    return '失败!';
                }
            } else if ("DesignerWork" == $formx[1]) { //添加work表
                $designerWorkModel = new \backend\models\DesignerWork();
                $designerWorkModel->load(Yii::$app->request->post());
                if ($designerWorkModel->save()) {
                    return '添加成功!';
                } else {
                    return '失败!';
                }
            } else if ('DesignerAdditional' == $formx[1]) {
                $designerAdditionalModel = new \backend\models\DesignerAdditional();
                $designerAdditionalModel->load(Yii::$app->request->post());
                if ($designerAdditionalModel->save()) {
                    return '添加成功!';
                } else {
                    return '失败!';
                }
            } else {
                
            }
        } else {
            // 非添加动作 跳转页面
            $designerBasicModel = new \backend\models\DesignerBasic();
            $designerWorkModel = new \backend\models\DesignerWork();
            $designerAdditionalModel = new \backend\models\DesignerAdditional();

            return $this->render('add', ['model' => $designerBasicModel, 'modelwork' => $designerWorkModel, 'modeladditional' => $designerAdditionalModel]);
        }
    }

    public function actionDelete($id) {
        $designerlistModel = new \backend\models\DesignerBasic();
        $designerWorkModel = new \backend\models\DesignerWork();
        $designerAdditionalModel = new \backend\models\DesignerAdditional();


        $id = (int) $id;
        if ($id > 0) {
            $designerlistModel::findOne($id)->delete();
            $dm = $designerWorkModel::findOne(['designer_id' => $id]);
            if ($dm) {
                $designerWorkModel::findOne(['designer_id' => $id])->delete();
            }
            
            $de = $designerAdditionalModel::findOne(['designer_id' => $id]);
            if($de){
                $designerAdditionalModel::findOne(['designer_id' => $id])->delete();
            }
        }
        return $this->redirect(['index']);
    }

}
