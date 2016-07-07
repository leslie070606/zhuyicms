<?php
namespace frontend\services\order;

class UserDemandNotSubmittedState extends State{
	public function test(){
		$order = $this->order->getOrderInfo();
		$this->order->setState(\frontend\services\Order::STATUS_SERVICE_END);
	}
}
