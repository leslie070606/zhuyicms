<?php
namespace backend\controllers;
use yii\web\Controller;
use backend\models;

class OrderController extends Controller{
	private $_orderM  = null;
	
	public function __construct(){
		parent::__construct();
		$this->_orderM = new \backend\models\Order();
	}

	public function actionInit(){
		$list = $this->_orderM->getAllOrders();
		$pagination = new \yii\data\Pagination(
			['totalCount' => $list->count,'pageSize' => 10]);
		$data = $designer->offset($pagination->offset)->limit($pagination->limit)->all();
		return $this->render("index",['data' => $data,'pagination' => $pagination,'model' => $this->_orderM]);
	}

	//create
	public function actionAdd(){
		if(Yii::$app->request->isPost){
			$this->_orderM->load(Yii::$app->request->post());
			if($this->_orderM->save()){
				$ret = array(
					'order_id' 	=> $this->_orderM->order_id,
					'message' 	=> '添加成功',
				);
				return json_encode($ret);
			}else{
				$ret = array(
					'order_id' 	=> $this->_orderM->order_id,
					'message' 	=> '添加失败',
				);
			}
		}else{
			return $this->render('add',['model' => $this->_orderM]);
		}
	}

	//update
	public function actionEdit($orderId){
		if(!isset($orderId)){
			return "empty order id";
		}
		
		$ret = $this->_orderM->findOne($this->_orderId);
		if(!empty($ret)){
			if(Yii::$app->request->isPost){
				$ret->load(Yii::$app->request->post());
				if($ret->save()){
					return "修改成功";
				}else{
					return "修改失败";
				}
			}else{
				return $this->render('edit',['model' => $this->_orderM]);
			}
		}else{
			return $this->redirect(['index']);
		}
	}

	//read
	public function actionDetail($orderId){
		$orderM = new \backend\models\Order();
		$data = $orderM->findOrderById($orderId);
		
		return $this->render('detail',['model' => $orderM]);
	}

	public function actionDelete($orderId){
		$orderM = new \backend\models\Order();
		$orderM->deleteOrderById($orderId);
		return $this->redirect(['index']);
	}
}
