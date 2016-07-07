<?php
namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models;
use frontend\services;

class OrderController extends Controller{
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
	
	public function actionTest(){
		echo ("test action!!!");
		$orderModule = new \frontend\services\Order(1);
		$orderModule->test();
	}
}
