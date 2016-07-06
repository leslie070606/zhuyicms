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
    
    
    // 匹配设计师
    public function actionMatch_designer(){
        
    }
    public function actionSelect_designer() {
        echo "OK";
    }
    


}
