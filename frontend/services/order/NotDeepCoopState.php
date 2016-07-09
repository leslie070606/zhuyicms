<?php
namespace frontend\services\order;

class NotDeepCoopState extends State{
	public function deepCoop(){
		$orderController = new \frontend\controllers\OrderController();
		$ret = $orderController->deepCoop();
		if($ret){
			$this->order->setState(\frontend\services\Order::STATUS_WAITING_CONTRACT);
		}else{
			$this->order->setState(\frontend\services\Order::STATUS_MET_NOT_DEEP_COOPERATION);
		}
	}

	public function cancel(){
		$order = $this->order->getOrderInfo();
		$this->order->setState(\frontend\services\Order::STATUS_SERVICE_END);
	}
}
