<?php

namespace backend\controllers;

use backend\models\Upload;
use yii\web\UploadedFile;
use yii;

class UploadController extends \yii\web\Controller {

    /**
     *    文件上传
     *  我们这里上传成功后把图片的地址进行返回
     */
    public function actionUpload() {
        $model = new Upload();
        $uploadSuccessPath = "";
        if (Yii::$app->request->isPost) {
            $model->name = UploadedFile::getInstance($model, "name");

            //文件上传存放的目录
            $dir = Yii::getAlias("@webroot") . "/upload/" . date("Ymd");

            if (!is_dir($dir))
                mkdir($dir, 0777, true);
            if ($model->validate()) {
                //文件名
                $fileName = date("HiiHsHis") . $model->name->baseName . "." . $model->name->extension;

                $dir = $dir . "/" . $fileName;
                $model->name->saveAs($dir);
                $uploadSuccessPath = "/uploads/" . date("Ymd") . "/" . $fileName;
            }
        }
        return $this->render("upload", [
            "model" => $model,
            "uploadSuccessPath" => $uploadSuccessPath,
        ]);
    }

}
