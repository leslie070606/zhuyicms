<?php
namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models;

class OrderController extends Controller{
	//默认情况下一个用户只包含一个订单
	public function actionIndex(){
		$request = Yii::$app->request;
		
		//FIXME
		if(empty($request)){
			;
		}
		
		$orderId = $request->post('order_id');
		$orderModel = new \frontend\models\Order();
		$ret = $orderModel->getOrderbyId($orderId);
		
		return $this->rendPartial("index",['data' => $ret]);
	}

	public function actionSetStatus($orderId,$status){
		$orderModel = new \frontend\models\Order();
		$orderModel->setStatus($orderId,$status);
	}
}
