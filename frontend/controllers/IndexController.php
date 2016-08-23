<?php

namespace frontend\controllers;

use yii;
use yii\web\Controller;

class IndexController extends Controller {

    public $layout = 'zhuyimain';

    public function actionIndex() {

        $model = new \common\models\ZyIndex();
        $video = $model->find()->orderBy('sort asc')->all();

        // 分享JS接口
        $tokenModel = new \app\components\Token();
        // 获取JS签名
        $jsarr = $tokenModel->getSignature();

        return $this->render('index', ['data' => $video, 'jsarr' => $jsarr]);
    }

    public function actionTest() {
        $session = Yii::$app->session;

        if (!$session->isActive) {
            $session->open();
        }
        //session_set_cookie_params(10);
        $session->set('user_id', '123');
        //$session->removeall();
        return $this->render('test');
    }

    public function actionToolsdesign() {
        return $this->render('toolsdesign');
    }

    public function actionAgreement() {
        return $this->render('agreement');
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionUploadImage() {
        if (empty($_FILES)) {
            echo json_encode(['code' => 101, 'msg' => '没有要上传的文件']);
            exit();
        }

        $_strFile = '';
        foreach ($_FILES as $k => $v) {
            $_strFile = $k;
            break;
        }

        $_fileType = strtolower($_FILES[$_strFile]["type"]);

        if (( $_fileType == "image/gif") || ($_fileType == "image/jpeg") || ($_fileType == "image/pjpeg") || ($_fileType == "image/png")) {
            if ($_FILES[$_strFile]["error"] > 0) {
                
            } else {
                $dir = Yii::getAlias("@frontend") . "/web/uploads/" . date("Ymd");
                if (!is_dir($dir))
                    mkdir($dir, 0777, true);


                $_endFileExt = pathinfo($_FILES[$_strFile]['name']);

                $_rnd = \common\controllers\BaseController::getRandomString();
                $fileName = date("HiiHsHis") . $_rnd . "." . $_endFileExt['extension'];

                $dirimg = $dir . "/" . $fileName;

                $res = move_uploaded_file($_FILES[$_strFile]["tmp_name"], $dirimg);
                if ($res) {
                    echo json_encode(['code' => 1, 'msg' => '/uploads/' . date("Ymd") . '/' . $fileName]);
                } else {
                    echo json_encode(['code' => 102, 'msg' => '保存文件失败']);
                }
            }
        } else {
            echo json_encode(['code' => 101, 'msg' => '文件类型错误']);
        }
        exit();
    }

}
