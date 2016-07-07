<?php
namespace frontend\services\order;

class InitState extends State{
	public function test(){
		$order = $this->order->getOrderInfo();
		echo("1111111111111111111111111111111");
		var_dump($order);
		$this->order->setState(\frontend\services\Order::STATUS_USER_DEMAND_NOT_SUBMITTED);
	}
}
