<?php
namespace frontend\services\order;

class PreInitState extends State{
	public function init(){
		$order = $this->order->getOrderInfo();	
		//FIXME 需要设置状态到数据库中。
		$this->order->setState(\frontend\services\Order::STATUS_INIT);
	}
}
