<?php
namespace frontend\services\order;

class CancelMeetingState extends State{
	public function test(){
		$order = $this->order->getOrderInfo();
		echo("1111111111111111111111111111111");
		var_dump($order);
		$this->order->setState(\frontend\services\Order::STATUS_SERVICE_CANCELLED);
	}
}
