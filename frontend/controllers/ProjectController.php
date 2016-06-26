<?php

namespace frontend\controllers;

use backend\models\Project;

class ProjectController extends \yii\web\Controller {

    public function actionRequirement() {
        $model = new Project();

        return $this->render('requirement', [
                    'model' => $model,
        ]);
    }

}
