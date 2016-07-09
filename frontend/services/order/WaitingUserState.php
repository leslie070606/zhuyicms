<?php
namespace frontend\services\order;

class WaitingUserState extends State{
	public function test(){
		$order = $this->order->getOrderInfo();
		$this->order->setState(\frontend\services\Order::STATUS_SERVICE_END);
	}

	public function timeConfirm(){
		$order = $this->order->getOrderInfo();
		$userId = $order->user_id;
		$orderController = new \frontend\controllers\orderController();
		$ret = $orderController->ActionUserConfirmingTime($orderId,$time);
		if($ret){
			$this->order->setState(\frontend\services\Order::STATUS_WAITING_MEETING);
		}else{
			$this->order->setState(\frontend\services\Order::STATUS_NOT_MEET);
		}
	}
	
	public function cancel(){
		$order = $this->order->getOrderInfo();
		$this->order->setState(\frontend\services\Order::STATUS_CANCEL_MEETING);
	}
}
