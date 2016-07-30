<?php
namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models;

class MyController extends Controller{
	//收藏设计师
	public $layout = false;

    public function actionCollect(){
        $request = Yii::$app->request;
		if(!$request->isAjax){
			return false;
		}
		
		$params = $request->get('params');
		$params = explode(',',$params);
		if(empty($params)){
			return false;
		}
		var_dump($params);

		/*
        $userId         = isset($params['user_id'])? $params['user_id'] : 0;
        $designerId     = isset($params['designer_id'])? $params['designer_id'] : 0;
		*/
		$userId			= $params[0];
		$designerId		= $params[1];
        $collectModel   = new \frontend\models\CollectDesigner();

        //取得设计师的服务用户次数。
		/*
        $orderM = new \frontend\models\Order();
        $serviceTimes = $orderM ->find()->where(['user_id' => $userId,'designer_id' => $designerId,'status'
 => \frontend\models\Order::SERVICE_END])->all()->count();
        $ret = $collectModel->find()->where(['user_id' => $userId,'designer_id' => $designerId,'status' => 
\frontend\models\CollectDesigner::STATUS_OK])->all()->count();
		*/
		//如果针对此设计师，已经收藏过,不重复收藏。
        $ret = $collectModel->find()->where(['user_id' => $userId,'designer_id' => $designerId,'status' => 
\frontend\models\CollectDesigner::STATUS_OK])->all();
		if(!empty($ret)){
			return false;
		}
		
		//在数据库中，针对此用户和设计师，已经有撤销收藏的记录，那么只更新，不重新插入数据
		$ret = $collectModel->find()->where(['user_id' => $userId,'designer_id' => $designerId,'status' => \frontend\models\CollectDesigner::STATUS_DELETE])->all();
		if(!empty($ret)){
			$set = array(
				'status'  		=> \frontend\models\CollectDesigner::STATUS_OK,
				'update_time'	=> time(),
			);
			$where = array(
				'user_id'		=> $userId,
            	'designer_id'   => $designerId,
			);
			return $collectModel->updateAll($set,$where);
		}

		$serviceTimes = 100;
        $data = array(
            'user_id'           => $userId,
            'designer_id'       => $designerId,
            'status'            => \frontend\models\CollectDesigner::STATUS_OK,
            'service_times'     => $serviceTimes,
            'create_time'       => time(),
            'update_time'       => time(),
        );
        $collectModel->collectDesigner($data);
	}

    public function actionUncollect(){
        $request = Yii::$app->request;
		if(!$request->isAjax){
			return false;
		}
        $params         = $request->get('params');
		$params			= explode(',',$params);
		$userId			= isset($params[0])? $params[0] : 1;
		$designerId		= isset($params[1])? $params[1] : 1;

        $collectModel   = new \frontend\models\CollectDesigner();
    
        $ret = $collectModel->find()->where(['user_id'=> $userId,'designer_id' => $designerId,'status' => \
frontend\models\CollectDesigner::STATUS_OK])->all();
        //未收藏过
        if(empty($ret)){
            return false;
        }else{
            $now = time();
			/*
            $data = array(
                'user_id'           => $userId,
                'designer_id'       => $designerId,
                'status'            => \frontend\models\CollectDesigner::STATUS_DELETE,
				//这地方有个问题，需要换一种更新的方法
				//比如如果create_time没有赋值，会报错create_time doesn't have a default value
				//需要换一种只更新局部改变值的数据库操作方法，而非save()
				//而且你通过前台操作，最后数据库的数据会无限增加，而非update
				'service_times'		=> 100,
				'create_time'		=> $now,
                'update_time'       => $now,
            );*/
			$where = array(
                'user_id'           => $userId,
                'designer_id'       => $designerId,
			);
			$set = array(
                'status'            => \frontend\models\CollectDesigner::STATUS_DELETE,
                'update_time'       => $now,
			);
			
            $collectModel->unCollectDesigner($set,$where);
       }
	}

	public function actionAll(){
		$data = array();
		
		return $this->render('collect',['data' => $data]);
	}

	public function actionShow(){
        $request = Yii::$app->request;
		if(!$request->isAjax){
			return -1;
		}

        $userId         = isset($params['user_id'])? $params['user_id'] : 1;
		$collectM       = new \frontend\models\CollectDesigner();
		$data			= $collectM->getCollectDesignerById($userId);

		if(empty($data)){
			return -1;
		}else{
			foreach($data as $d){
				$designerId 		= $d['designer_id'];
				//设计师个人主页的跳转路径返回给前端
				$redirectUrl 		= Yii::getAlias('@web') . '/index.php?r=designer/detail&&params=' . $designerId;
				$dbModel 			= new \frontend\models\DesignerBasic();
				$rows 				= $dbModel->getDesignerById($designerId);
				if(empty($rows)){
					continue;
				}

				//设计师名字，标签
				$name 				= $rows->name;
				$tag  				= $rows->tag;
        		if(!isset($tag) || empty($tag)){
            		$tag = "艺术家,设计小达人";
        		}
        		$tmp            = $dbModel->getHeadPortrait($designerId);
        		$headPortrait   = isset($tmp)? $tmp : "/img/home_page/banner_head.jpg";
        
        		$tmp            = $dbModel->getBackground($designerId);
        		$background     = isset($tmp)? $tmp : "/img/home_page/prob.jpg";


				$designerRet = array(
                	'designer_id'   => $designerId,
                	'name'          => $name,
                	'tag'           => $tag,
                	'head_portrait' => $headPortrait,
					'background'	=> $background,
					'redirect_url'	=> $redirectUrl,
            	);
            	$finalData[] 		= $designerRet;
			}
			return json_encode($finalData);
		}
	}
}
