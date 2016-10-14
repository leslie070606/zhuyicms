<?php

namespace backend\controllers;

use yii\web\Controller;
use bacend\models;
use yii\web\UploadedFile;
use yii;

class DesignerController extends Controller {

    public function actionIndex() {

        $designerlistModel = \backend\models\DesignerBasic::find();
        $designerlistModel->joinWith(['zyj_designer_additional', 'zyj_designer_work']);

        $w = $this->_getDesignerCondition();

        $designerlistModel->where($w)->orderBy(' zyj_designer_basic.id desc ');

        $pagination = new \yii\data\Pagination(['totalCount' => $designerlistModel->count('zyj_designer_basic.id'), 'pageSize' => 10]);

        $data = $designerlistModel->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render("index", [
                    'data' => $data,
                    'pagination' => $pagination,
                    'model' => $designerlistModel,
                    'getParams' => Yii::$app->request->get()
        ]);
    }

    /**
     * 私有条件搜索拼接方法
     * @author 郝帅卫 <shuaiwei.hao@condenast.net>
     * @date 2016-09-13
     * @param null
     * @return string
     */
    private function _getDesignerCondition() {
        $_params = Yii::$app->request->get();
        if (empty($_params)) {
            return '1';
        }
        foreach ($_params as $k => $v) {
            $_params[$k] = addslashes($v);
        }
        unset($_params['page']);
        unset($_params['per-page']);
        if (empty($_params)) {
            return '1';
        }
        $w = '1';
        if ($_params['ds_id']) {
            $w .= ' and zyj_designer_basic.id="' . $_params['ds_id'] . '" ';
        }
        if ($_params['ds_sjf_dx']) {
            $w .= ' and zyj_designer_work.charge>="' . $_params['ds_sjf_dx'] . '" ';
        }
        if ($_params['ds_sjf_sx']) {
            $w .= ' and zyj_designer_work.charge<="' . $_params['ds_sjf_sx'] . '" ';
        }
        if ($_params['ds_city']) {
            $w .= ' and zyj_designer_work.service_city="' . $_params['ds_city'] . '" ';
        }
        if ($_params['ds_name']) {
            $w .= ' and zyj_designer_basic.name like "%' . $_params['ds_name'] . '%" ';
        }
        if ($_params['ds_style']) {
            $w .= ' and zyj_designer_work.style like "%' . $_params['ds_style'] . '%" ';
        }
        if ($_params['ds_zxf_dx']) {
            $w .= ' and zyj_designer_work.charge_work>="' . $_params['ds_zxf_dx'] . '" ';
        }
        if ($_params['ds_zxf_sx']) {
            $w .= ' and zyj_designer_work.charge_work<="' . $_params['ds_zxf_sx'] . '" ';
        }
        if ($_params['ds_sex'] != '') {
            $w .= ' and zyj_designer_basic.sex = "' . $_params['ds_sex'] . '" ';
        }


        return $w;
    }

    public function actionDetail($id) {
        $id = (int) $id;
        $designerbasicModel = new \backend\models\DesignerBasic();
        $designerbasicModel = $designerbasicModel::findOne($id);

        $designerWorkModel = new \backend\models\DesignerWork();
        $designerWorkModel = $designerWorkModel::findOne(['designer_id' => $id]) ? $designerWorkModel::findOne(['designer_id' => $id]) : $designerWorkModel;

        $designerAdditionalModel = new \backend\models\DesignerAdditional();
        $designerAdditionalModel = $designerAdditionalModel::findOne(['designer_id' => $id]) ? $designerAdditionalModel::findOne(['designer_id' => $id]) : $designerAdditionalModel;

        return $this->render('detail', ['model' => $designerbasicModel, 'modeladditional' => $designerAdditionalModel, 'modelwork' => $designerWorkModel, 'did' => $id]);
    }

    //设计师编辑
    public function actionEdit($id) {
        error_reporting(E_ALL & ~E_NOTICE);
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

                    //$designerbasicModel->load(Yii::$app->request->post());
                    $_img_head = Yii::$app->request->post('here_imga');
                    $_img_bakcground = Yii::$app->request->post('here_imgb');

                    $_saveData = Yii::$app->request->post();

                    unset($_saveData['here_imga']);
                    unset($_saveData['here_imgb']);
                    if (!empty($_img_head)) {
                        $_saveData['DesignerBasic']['image_id'] = $this->_saveImage($_img_head);
                    }
                    if (!empty($_img_bakcground)) {
                        $_saveData['DesignerBasic']['head_imgid'] = $this->_saveImage($_img_bakcground);
                    }
                    foreach ($_saveData['DesignerBasic'] as $k => $v) {
                        $designerbasicModel->$k = $v;
                    }

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

                    //无值添加
                    $post = Yii::$app->request->post();


                    //字段处理
                    //xl modified
                    if (isset($post['DesignerWork']['pay_extra']) && !empty($post['DesignerWork']['pay_extra'])) {
                        $post['DesignerWork']['pay_extra'] = implode(',', $post['DesignerWork']['pay_extra']);
                    } else {
                        $post['DesignerWork']['pay_extra'] = '';
                    }

                    if (isset($post['DesignerWork']['include_project']) && !empty($post['DesignerWork']['include_project'])) {
                        $post['DesignerWork']['include_project'] = implode(',', $post['DesignerWork']['include_project']);
                    } else {
                        $post['DesignerWork']['include_project'] = '';
                    }
                    //$post['DesignerWork']['pay_extra'] = implode(',', $post['DesignerWork']['pay_extra']);
                    //$post['DesignerWork']['include_project'] = implode(',', $post['DesignerWork']['include_project']);
                    $post['DesignerWork']['nowork_time'] = strtotime($post['DesignerWork']['nowork_time']);
                    $post['DesignerWork']['nowork_time2'] = strtotime($post['DesignerWork']['nowork_time2']);

                    $designerWorkModel->load($post);

//                    echo "<pre>";
//                    print_r($post);
//                    exit;
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
                    if ($dm->include_project) {
                        $dm->include_project = explode(',', $dm->include_project);
                    };
                    if ($dm->pay_extra) {
                        $dm->pay_extra = explode(',', $dm->pay_extra);
                    };
                    if ($dm->nowork_time && $dm->nowork_time2) {
                        $dm->nowork_time = date('Y-m-d', (int) $dm->nowork_time);
                        $dm->nowork_time2 = date('Y-m-d', (int) $dm->nowork_time2);
                    } else {
                        $dm->nowork_time = '';
                        $dm->nowork_time2 = '';
                    }
                    $designerWorkModel = $dm;
                }
                // 非编辑动作 跳转页面
                return $this->render('edit', ['model' => $designerbasicModel, 'modeladditional' => $designerAdditionalModel, 'modelwork' => $designerWorkModel, 'did' => $id]);
            }
        } else {
            return $this->redirect(['index']);
        }
    }

    public function actionImage() {
        if (Yii::$app->request->isPost) {
            $designerbasicModel = new \backend\models\DesignerBasic();
            $designerbasicModel->load(Yii::$app->request->post());
            $designerId = $designerbasicModel->id;

            $upFile = UploadedFile::getInstance($designerbasicModel, "image_id");
            //图片存放位置
            $dir = Yii::getAlias('@frontend') . "/web/uploads/" . date("Ymd");
            // Yii::info($dir, 'pushNotifications');
            if (!is_dir($dir)) {
                @mkdir($dir, 0777, true);
            }

            $fileName = date("HiiHsHis") . $upFile->baseName . "." . $upFile->extension;
            $dir = $dir . "/" . $fileName;
            $upFile->saveAs($dir);

            //操作zy_images表
            $uploadSuccessPath = "/uploads/" . date("Ymd") . "/" . $fileName;
            $imageModel = new \common\models\ZyImages();
            $imageModel->url = $uploadSuccessPath;
            $imageId = '';
            if ($imageModel->save()) {
                $imageId = $imageModel->image_id;
                $ret = $designerbasicModel::findOne($designerId);
                if (empty($ret)) {
                    return false;
                }
                $ret->image_id = $imageId;
                $ret->save();
            } else {
                return false;
            };


            $ret = array('designer_id' => $designerId, 'upfile' => $upFile);
            $json = json_encode($ret);

            //return $json;
            return $this->render('image', ['model' => $designerbasicModel]);
        } else {
            // 非添加动作 跳转页面
            $designerbasicModel = new \backend\models\DesignerBasic();

            return $this->render('image', ['model' => $designerbasicModel]);
        }
    }

    public function actionAdd() {
        error_reporting(E_ALL & ~E_NOTICE);

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

                $_img_head = Yii::$app->request->post('here_imga');
                if (empty($_img_head)) {
                    return json_encode(['msg' => '请上传头像']);
                }
                $_img_bakcground = Yii::$app->request->post('here_imgb');
                if (empty($_img_bakcground)) {
                    return json_encode(['msg' => '请上传背景图']);
                }
                $_saveData = Yii::$app->request->post();
                unset($_saveData['here_imga']);
                unset($_saveData['here_imgb']);
                $_saveData['DesignerBasic']['image_id'] = $this->_saveImage($_img_head);
                $_saveData['DesignerBasic']['head_imgid'] = $this->_saveImage($_img_bakcground);

                foreach ($_saveData['DesignerBasic'] as $k => $v) {
                    $designerbasicModel->$k = $v;
                }

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
                $post = Yii::$app->request->post();

                //字段处理
                $post['DesignerWork']['nowork_time'] = strtotime($post['DesignerWork']['nowork_time']);
                $post['DesignerWork']['nowork_time2'] = strtotime($post['DesignerWork']['nowork_time2']);

                if (isset($post['DesignerWork']['pay_extra']) && !empty($post['DesignerWork']['pay_extra'])) {
                    $post['DesignerWork']['pay_extra'] = implode(',', $post['DesignerWork']['pay_extra']);
                } else {
                    $post['DesignerWork']['pay_extra'] = '';
                }

                if (isset($post['DesignerWork']['include_project']) && !empty($post['DesignerWork']['include_project'])) {
                    $post['DesignerWork']['include_project'] = implode(',', $post['DesignerWork']['include_project']);
                } else {
                    $post['DesignerWork']['include_project'] = '';
                }

                $designerWorkModel->load($post);

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

    /**
     * 保存到图片数据表，产生图片ID
     * @author 郝帅卫 <shuaiwei.hao@condenast.com.cn>
     * @date 2016-09-13
     * @param string $_imgUrl
     * @return string
     */
    private function _saveImage($_imgUrl) {
        $imageModel = new \common\models\ZyImages();
        $imageModel->url = $_imgUrl;
        $imageId = '';
        if ($imageModel->save()) {
            return $imageModel->image_id;
        } else {
            return '';
        }
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
            if ($de) {
                $designerAdditionalModel::findOne(['designer_id' => $id])->delete();
            }
        }
        return $this->redirect(['index']);
    }

    public function uploadfile($model) {
        //$model = new Upload();
        $uploadSuccessPath = "";
        if (Yii::$app->request->isPost) {
            $model->image_id = UploadedFile::getInstance($model, "image_id");
            //文件上传存放的目录
            $dir = Yii::getAlias("@webroot") . "/upload/" . date("Ymd");
            if (!is_dir($dir))
                mkdir($dir);
            if ($model->validate()) {
                echo var_dump($model);
                exit;
                echo $model['image_id']->baseName;
                exit;
                //文件名
                $fileName = date("HiiHsHis") . $model->image_id->baseName . "." . $model->image_id->extension;
                $dir = $dir . "/" . $fileName;


                $model->image_id->saveAs($dir);
                $uploadSuccessPath = "/uploads/" . date("Ymd") . "/" . $fileName;
            }
        }
//        return $this->render("upload", [
//            "model" => $model,
//            "uploadSuccessPath" => $uploadSuccessPath,
//        ]);
    }

    public function actionHeadimg() {

        $uploadSuccessPath = "";
        $debasicModel = new \backend\models\DesignerBasic();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $designerId = $post['DesignerBasic']['id'];
            // echo $designerId;exit;
            $upFile = UploadedFile::getInstance($debasicModel, "head_imgid");
            //文件上传存放的目录
            $dir = Yii::getAlias('@frontend') . "/web/uploads/" . date("Ymd");

            if (!is_dir($dir)) {
                @mkdir($dir, 0777, true);
            }
            if ($upFile) {
                $fileName = date("HiiHsHis") . $upFile->baseName . "." . $upFile->extension;
                $dir = $dir . "/" . $fileName;
                $upFile->saveAs($dir);

                //操作zy_images表
                $uploadSuccessPath = "/uploads/" . date("Ymd") . "/" . $fileName;
                $imageModel = new \common\models\ZyImages();
                $imageModel->url = $uploadSuccessPath;

                if ($imageModel->save()) {
                    $imageId = $imageModel->attributes['image_id'];
                    $ret = $debasicModel::findOne($designerId);
                    if (empty($ret)) {
                        return false;
                    }
                    $ret->head_imgid = $imageId;
                    if ($ret->save()) {
                        Yii::$app->getSession()->setFlash('success', '保存成功');
                        Yii::$app->getSession()->setFlash('imgurl', $uploadSuccessPath);
                    }
                } else {
                    return false;
                };
            }
        }

        return $this->render('headimg', ['model' => $debasicModel]);
    }

}
