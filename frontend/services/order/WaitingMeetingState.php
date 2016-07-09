<?php
namespace frontend\services\order;

class WaitingMeetingState extends State{
	public function test(){
		$order = $this->order->getOrderInfo();
		$this->order->setState(\frontend\services\Order::STATUS_SERVICE_END);
	}

	public function met(){
		$order = $this->order->getOrderInfo();
		$orderController = new \frontend\controllers\OrderController();
		$ret = $orderController->met($order->order_id);
		if($ret){
			$this->order->setState(\frontend\services\Order::STATUS_MET_NOT_DEEP_COOPERATION);
		}else{
			$this->order->setState(\frontend\services\Order::STATUS_NOT_MEET);
		}
	}

	public function cancel(){
		$order = $this->order->getOrderInfo();
		$this->order->setState(\frontend\services\Order::STATUS_SERVICE_CANCELLED);
	}
}
