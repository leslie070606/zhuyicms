<?php
namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models;

class MyController extends Controller{
	//收藏设计师
    public function actionCollect(){
		echo ("1111111111111");
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
		$serviceTimes = 100;
        $data = array(
            'user_id'           => $userId,
            'designer_id'       => $designerId,
            'status'            => \frontend\models\CollectDesigner::STATUS_OK,
            'service_times'     => $serviceTimes,
            'create_time'       => time(),
            'update_time'       => time(),
        );
        $collectModel->opCollectDesigner($data);
	}

    public function actionUncollect(){
        $request = Yii::$app->request;
		if(!$request->isAjax){
			return false;
		}
        $params         = $request->get('params');
		$params			= explode(',',$params);
		$userId			= $params[0];
		$designerId		= $params[1];
		/*
        $userId         = isset($params['user_id'])? $params['user_id'] : 0;
        $designerId     = isset($params['designer_id'])? $params['designer_id'] : 0;
		*/
        $collectModel   = new \frontend\models\CollectDesigner();
    
        $ret = $collectModel->find()->where(['user_id'=> $userId,'designer_id' => $designerId,'status' => \
frontend\models\CollectDesigner::STATUS_OK])->all();
        //未收藏过
        if(empty($ret)){
            return false;
        }else{
            $now = time();
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
            );
            $collectModel->opCollectDesigner($data);
       }
	}

	public function actionGetCollectDesigners(){
        $request = Yii::$app->request();
        if(empty($request)){
            return false;
        }
        $params         = $request->post();
        $userId         = isset($params['user_id'])? $params['user_id'] : 0;
		$collectM       = new \frontend\models\CollectDesigner();
		$data			= $collectM->getCollectDesignerById($userId);

		return $this->render('collect',['data' => $data]);
	}
}
