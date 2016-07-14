<?php

namespace frontend\controllers;

use Yii;
use common\models\ZyProject;
use backend\models\DesignerWork;

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
    public function actionMatch_designer(){
        
        if($prostr = Yii::$app->request->get('g')){
            // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $proarr = explode("@",$prostr);
            
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
            if($proarr[4] == 'budget_design'){
                $model->service_type = '设计';
                $model->budget_design = $proarr[5];
            }else{
                $model->service_type = '设计和施工';
                $model->budget_design_work = $proarr[5];
            }
            $model->designer_level = $proarr[6];
            $res = $model->save();
            if($res){
                //插入成功保存ID
                return $model->attributes['project_id'];
            }
        }
        
        return $this->render('match_designer');
    }
    public function actionAdditional() {
        if($project_id = Yii::$app->request->get('project_id')){
            
            //echo $project_id;
            return $this->render('additional');
        }
    }
    
    //匹配设计师
    public function actionChoose_designer(){
        
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
        for($i=0;$i<count($designerArr);$i++){
            $scoreArr[$i]['did'] = $designerArr[$i]['designer_id'];
            $scoreArr[$i]['score'] = $matchModel->assigns($project, $designerArr[$i]);
        }
        echo "<pre>";
        print_r($scoreArr);exit;
        return $this->render('choose_designer');
    }
}
