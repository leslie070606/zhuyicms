<?php
namespace frontend\services\order;

class WaitingDesignerState extends State{
	public function timeConfirm(){
		$order = $this->order->getOrderInfo();
		//导出用户匹配的设计师。
		$controller = new \frontend\controllers\DesignerController();
		$matchedDesigners = $controller->getMatchedDesigners();
		$ret = $controller->confirmTime($order->order_id,$matchedDesigners->designer_id);
		if($ret){
			$this->order->setState(\frontend\services\Order::STATUS_WAITING_USER_TO_CONFIRM_TIME);
		}else{
			$this->order->setState(\frontend\services\Order::CANCEL_MEETING);
		}
	}
	
	public function cancel(){
		$order = $this->order->getOrderInfo();
		$this->order->setState(\frontend\services\Order::SERVICE_CANCELLED);
	}
}
