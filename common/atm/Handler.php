<?php

/*
namespace common\atm;
use Yii;

class Handler{
	public function __construct(){

	}
	public function process($event,$params){
		Yii::getLogger()->log('处理事件：事件[' . $event . ']，参数[' . json_encode($params) . ']',Yii\log\Logger::LEVEL_INFO);
		//第一版调用短信接口只发短信
        $sms = new \common\util\emaysms\Sms();
        $phone = '15810782798';
        $designerName = "阿鲁迪巴";
        $ret = $sms->send(array($phone),'【住艺】尊敬的用户,设计师'. $designerName .
 '已回复了见面时间，请尽快到住艺微信公众号-我的订单中进行查看并确认。客服电话:4000-600-636');
		return $ret;
	}
}
*/
