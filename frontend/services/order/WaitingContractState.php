<?php
namespace frontend\services\order;

class WaitingContractState extends State{
	public function cancel(){
		$order = $this->order->getOrderInfo();
		$this->order->setState(\frontend\services\Order::STATUS_SERVICE_CANCELLED);
	}

	public function uploadContract(){
		$orderController = new \frontend\services\OrderController();
		$ret = $orderController->uploadContract();
		if($ret){
			$this->order->setState(\frontend\services\Order::STATUS_SERVICE_END);
		}else{
			$this->order->setState(\frontend\services\Order::STATUS_SERVICE_CANCELLED);
		}
	}
}
