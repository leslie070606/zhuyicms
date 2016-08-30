<?php
/*
namespace common\atm;
use Yii;

class Recipient{
	private $_queue 	= NULL;

	public function __construct(){
		$this->_queue 	= new \common\atm\Queue();
	}

	public function receive($event,$param){
		if($this->_queue){
			$message = '接收事件：事件类型[' . $event . ']，参数[' . json_encode($param). ']';
			Yii::getLogger()->log($message,Yii\log\Logger::LEVEL_INFO);
			return $this->_queue->push($event,$param);
		}else{
			return false;
		}
	}
}
*/
