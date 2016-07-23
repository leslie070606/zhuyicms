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
                //插入成功保存ID
                return $model->attributes['project_id'];
            }
        }

        return $this->render('match_designer');
    }

    public function actionAdditional() {
        if (Yii::$app->request->post('aa_0')) {
            echo "<pre>";
            var_dump(Yii::$app->request->post('aa_0'));
            exit;
            

            $img = file_get_contents('http://www.baidu.com/img/baidu_logo.gif');

            $dir = Yii::getAlias("@frontend") . "/web/uploads/" . date("Ymd");
            if (!is_dir($dir))
                mkdir($dir, 0777, true);

            //$ext = strrchr('http://www.baidu.com/img/baidu_logo.gif', ".");
            $ext = '.jpg';

            $fileName = $dir . '/' . date("HiiHsHis") . $ext;
            //echo $fileName;
            $res = file_put_contents($fileName, $img);
            echo $res;
            echo '<img src="' . $fileName . '">';
            exit;
        }





//        $upfile = UploadedFile::getInstanceByName('aa');


        $tokenModel = new \app\components\Token();

        // 获取JS签名
        $jsarr = $tokenModel->getSignature();

        return $this->render('additional', ['jsarr' => $jsarr]);

        // if ($project_id = Yii::$app->request->get('project_id')) {
        //echo $project_id;
        // }
    }

    public function GrabImage($url, $filename = "") {
        if ($url == ""):return false;
        endif;
        //如果$url地址为空，直接退出
        if ($filename == "") {


            $dir = Yii::getAlias("@frontend") . "/web/uploads/" . date("Ymd");

            if (!is_dir($dir))
                mkdir($dir, 0777, true);
            //if ($model->validate()) {//未验证
            //文件名
            //$fileName = date("HiiHsHis") . $upfile->baseName . "." . $upfile->extension;
            $ext = strrchr($url, ".");
            $fileName = date("HiiHsHis") . $ext;

            // $fileName = $dir . "/" . $fileName;
            // echo $fileName;exit;
//            //如果没有指定新的文件名
//            $ext = strrchr($url, ".");
//            //得到$url的图片格式
//            if ($ext != ".gif" && $ext != ".jpg"):return false;
//            endif;
//            //如果图片格式不为.gif或者.jpg，直接退出
//            $filename = date("dMYHis") . $ext;
//            //用天月面时分秒来命名新的文件名
        }
        ob_start(); //打开输出
        readfile($url); //输出图片文件
        $img = ob_get_contents(); //得到浏览器输出
        ob_end_clean(); //清除输出并关闭
        $size = strlen($img); //得到图片大小
        $fp2 = @fopen($filename, "a");
        var_dump($fp2);
        exit;
        fwrite($fp2, $img); //向当前目录写入图片文件，并重新命名
        fclose($fp2);
        return $filename; //返回新的文件名
    }

    //匹配设计师
    public function actionChoose_designer() {
        //判断是否有已匹配的设计师
        //引入算法类
        $matchModel = new \app\components\Match();

        $project_id = Yii::$app->request->get('project_id');
        //全部设计师
        $designerModel = new DesignerWork();
        $designerArr = $designerModel->find()->all();

        //根据ID查找需求
        $projectModel = new ZyProject();
        $project = $projectModel->findOne('14');
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
            //$projectModel->project_id = 14;
            $project->match_json = json_encode($scoreArr);
            //$project->save();
            $scoreArr = $scoreArr + $scoreArr + $scoreArr + $scoreArr;
            //$scoreArr = array_merge($scoreArr,$scoreArr,$scoreArr,$scoreArr,$scoreArr,$scoreArr,$scoreArr);
        }
        return $this->render('choose_designer', ['model' => $scoreArr]);
    }

}
