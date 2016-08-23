<?php

namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models;
use \common\models\ZySearchHot;

class ZysearchhotController extends Controller {

    public $layout = false;

    public function actionGetSearchHot() {
        $model = ZySearchHot::find();
        $model->joinWith(['zyj_designer_basic', 'zyj_designer_work']);
        $model = $model->orderBy('hot_sort')->limit('3')->all();


        $_tmpNewArr = [];
        if (empty($model)) {
            $_code = '201';
            $_msg = '没有推荐的设计师';
        } else {
            foreach ($model as $k => $v) {
                $_imgRes = \common\models\ZyImages::findOne(['image_id' => $v->zyj_designer_basic->image_id]);
                $_tmpNewArr[$k]['dId'] = $v->hot_designer_id;
                $_tmpNewArr[$k]['dImg'] = Yii::$app->params['frontDomain'] . $_imgRes['url'];
                $_tmpNewArr[$k]['dName'] = $v->zyj_designer_basic->name;
                $_tmpNewArr[$k]['dCity'] = $v->zyj_designer_work->city;
                $_tmpNewArr[$k]['dTag'] = $v->zyj_designer_basic->tag;
            }
            $_code = '1';
            $_msg = $_tmpNewArr;
        }

        echo json_encode(['code' => $_code, 'msg' => $_msg]);
        exit();
    }

}
