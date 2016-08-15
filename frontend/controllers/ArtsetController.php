<?php

namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models;

class ArtsetController extends Controller {

    public function actionGet_artset() {
        $request = Yii::$app->request;
        if (!$request) {
            return false;
        }
        $designerId = $request->get('designer_id');
        $artsetModel = new \frontend\models\Artsets();
        return $artsetModel->getOneArtByDesignerId($designerId);
    }

}
