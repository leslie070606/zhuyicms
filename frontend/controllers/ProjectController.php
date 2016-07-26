<?php

namespace frontend\controllers;

use Yii;
use common\models\ZyProject;
use backend\models\DesignerWork;
use yii\web\UploadedFile;

class ProjectController extends \common\util\BaseController {

    public $layout = false;

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

    //题目页
    public function actionMatch_designer() {
        //判断跳转
        //初始化session
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        if ($user_id = $session->get('user_id')) {
            $model = new ZyProject();
            $project = $model->findOne(['user_id' => $user_id]);

            //如果有需求就跳转到个人中心
            if ($project) {
                echo "个人中心!";
                exit;
            }
        } else {
            return $this->redirect(['user/login']);
        }

        if ($prostr = Yii::$app->request->get('g')) {
            // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $proarr = explode("@", $prostr);

            $aera = explode('$', $proarr[2]);
            $model = new ZyProject();
            //$model->project_id = 2;
            $model->user_id = 1;
            $model->city = $proarr[0];
            $model->home_type = $proarr[1];
            $model->covered_area = $aera[0];
            $model->use_area = $aera[1];
            $model->work_time = $proarr[3];

            //判断是设计还是设计+施工
            if ($proarr[4] == 'budget_design') {
                $model->service_type = '设计';
                $model->budget_design = $proarr[5];
            } else {
                $model->service_type = '设计和施工';
                $model->budget_design_work = $proarr[5];
            }
            $model->designer_level = $proarr[6];
            $res = $model->save();
            if ($res) {
                //插入成功返回保存ID
                return $model->attributes['project_id'];
            }
        }

        return $this->render('match_designer');
    }

    //需求附加信息
    public function actionAdditional() {

        //已添加的项目ID
        $project_id = Yii::$app->request->get('project_id');
        if (!$project_id) {
            //没有提交成功跳转返回
            return $this->redirect(['match_designer']);
        }
        $tokenModel = new \app\components\Token();

        if ($post = Yii::$app->request->post()) {

            $model = new ZyProject();
            $project = $model->findOne($project_id);

            $project->compound = $post['compound'] ? $post['compound'] : '';
            $project->project_tags = $post['project_tags'] ? $post['project_tags'] : '';
            $project->description = $post['description'] ? $post['description'] : '';

            //家的照片
            if ($post['home']) {

                $accessToken = $tokenModel->getToken();

                //分割
                $postArr = explode('$', $post['home']);

                // 除去空数组
                $postArr = array_filter($postArr);

                $imgId = '';
                foreach ($postArr as $mid) {
                    $wd = new \app\components\WeixinDownloadImg();
                    $imgModel = new \common\models\ZyImages();
                    //上传图片
                    $uploadImgUrl = $wd->wxDownImg($mid, $accessToken);
                    if ($uploadImgUrl) {
                        $imgModel->url = $uploadImgUrl;
                        // print_r($imgModel->save());
                        if ($imgModel->save()) {
                            $imgId .= ',' . (string) $imgModel->attributes['image_id'];
                        } else {
                            return '';
                        }
                    }
                }

                if ($imgId) {

                    $project->home_img = $imgId;
                }

                // $mid = 'AZrRol_3CMfEitrO0pxCkOWrmAAtJ8r6F80qTe78UTzmStSUVVDeM8thiwEoAzbL';
            }

            //喜欢的照片
            if ($post['like']) {

                $accessToken = $tokenModel->getToken();

                //分割
                $postArr = explode('$', $post['like']);

                // 除去空数组
                $postArr = array_filter($postArr);

                $imgId = '';
                foreach ($postArr as $mid) {
                    $wd = new \app\components\WeixinDownloadImg();
                    $imgModel = new \common\models\ZyImages();
                    //上传图片
                    $uploadImgUrl = $wd->wxDownImg($mid, $accessToken);
                    if ($uploadImgUrl) {
                        $imgModel->url = $uploadImgUrl;
                        // print_r($imgModel->save());
                        if ($imgModel->save()) {
                            $imgId .= ',' . (string) $imgModel->attributes['image_id'];
                        } else {
                            return '';
                        }
                    }
                }

                if ($imgId) {

                    $project->favorite_img = $imgId;
                }
            }

            $res = $project->save();

            echo "<pre>";
            var_dump($res);
            exit;
        }
        // 获取JS签名
        $jsarr = $tokenModel->getSignature();

        return $this->render('additional', ['jsarr' => $jsarr, 'project_id' => $project_id]);
    }

    //匹配设计师
    public function actionChoose_designer() {
        //判断是否有已匹配的设计师
        
        //引入算法类
        $matchModel = new \app\components\Match();

        $project_id = Yii::$app->request->get('project_id');
        if (!$project_id) {
            //没有需求跳转到题目页
            return $this->redirect('match_designer');
        }
        //全部设计师
        $designerModel = new DesignerWork();
        $designerArr = $designerModel->find()->all();

        //根据ID查找需求
        $projectModel = new ZyProject();
        $project = $projectModel->findOne($project_id);
        $scoreArr = array();

        //循环判断设计师
        for ($i = 0; $i < count($designerArr); $i++) {
            //完全不符合标准的设计师
            // 判断城市
            $tcity = false;
            if ($designerArr[$i]['service_city'] != '全国') {
                $descity = explode(',', $designerArr[$i]['service_city']);
                $tcity = in_array($project['city'], $descity);
            } else {
                $tcity = TRUE;
            }

//判断时间
            $usertime = time();
            switch ($project['work_time']) {

                case "我想尽快开始":
                    $usertime = time();
                    break;
                case "3个月以后":
                    $usertime = time() + 60 * 60 * 24 * 30 * 3;
                    break;
                case "我不是很着急":
                    $usertime = time() + 60 * 60 * 24 * 365;
                    break;
            }
// 判断时间是否允许
            $projecttime = TRUE;
            if ($designerArr[$i]['nowork_time'] < $usertime && $usertime < $designerArr[$i]['nowork_time2']) {
                $projecttime = false;
            }

            if ($tcity && $projecttime) {
                
            } else {

                //跳出本次循环
                continue;
            }

            $scoreArr[$i]['did'] = $designerArr[$i]['designer_id'];
            $scoreArr[$i]['customer'] = $designerArr[$i]['customer'];
//匹配设计师计算分数
            $scoreArr[$i]['score'] = $matchModel->assigns($project, $designerArr[$i]);
        }

//判断是否为空
        if (count($scoreArr) > 0) {

            //排序
            foreach ($scoreArr as $key => $value) {

                $rating[$key] = $value['score'];
            }
            // 按照score降序排列
            array_multisort($rating, SORT_DESC, $scoreArr);

            if (count($scoreArr) >= 9) {
                $scoreArr = array_slice($scoreArr, 0, 9);
            }

//            echo "<pre>";
//            print_r($scoreArr);
//            exit;

            $project->match_json = json_encode($scoreArr);
            $project->save();
            //$scoreArr = $scoreArr + $scoreArr + $scoreArr + $scoreArr;
            //$scoreArr = array_merge($scoreArr,$scoreArr,$scoreArr,$scoreArr,$scoreArr,$scoreArr,$scoreArr);
        }
        return $this->render('choose_designer', ['model' => $scoreArr]);
    }

}
