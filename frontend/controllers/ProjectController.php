<?php

namespace frontend\controllers;

use Yii;
use backend\models\Project;

class ProjectController extends \common\util\BaseController {

    public function actionRequirement() {

        $model = new Project();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['select-designer', 'project_id' => $model->id]);
        } else {
            return $this->render('requirement', [
                        'model' => $model,
            ]);
        }
    }

    public function actionSelectDesigner($project_id) {
        echo "OK";
    }
    
    public function actionIndex(){
        echo "!";
    }

}
