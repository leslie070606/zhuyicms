<?php
namespace frontend\services\order;

class ServiceEndState extends State{
	public function test(){
		$order = $this->order->getOrderInfo();
		$this->order->setState(\frontend\services\Order::STATUS_SERVICE_CANCELLED);
	}
}
