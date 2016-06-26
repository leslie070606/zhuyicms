<?php

namespace frontend\controllers;

use Yii;
use backend\models\Project;

class ProjectController extends \common\util\BaseController {

    public function actionRequirement() {
        $model = new Project();

        return $this->render('requirement', [
                    'model' => $model,
        ]);
    }

    public function actionCreate() {
        if(!Yii::$app->request->isAjax) {
            return;
        }
        
        $model = new Project();
        
        $model->load(Yii::$app->request->post());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->sendRes(true, 'ok');
        } else {
            var_dump($model->getErrors());
        }
    }

}
