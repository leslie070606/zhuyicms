<?php
namespace frontend\services\order;

use frontend\models;
abstract class Base{
	protected $row = null;
	public function __construct($id){
		$orderModel = new \frontend\models\Order();
		$ret = $orderModel->getOrderById($id);
		
		$this->row = $ret;
	}
	
	public final function getOrderInfo(){
		return $this->row;
	}
}
