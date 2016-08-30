<?php
/*
namespace common\atm;
use Yii;

class Consumer {
	private $_queue 	= NULL;
	
	public function __construct(){
		$this->_queue 	= new \common\atm\Queue();
	}

	public function consume($event){
		$params = $this->_queue->pop($event);
        $message = '消费事件：事件类型[' . $event . ']，参数[' . json_encode($params)
. ']';
		Yii::getLogger()->log($message,Yii\log\Logger::LEVEL_INFO);
		$handler = new \common\atm\Handler();
		$ret = $handler->process($event,$params);
		return $ret;
	}
}
*/
