<?php
gc_enable();

define('SLEEP_TIME',1);
define('RETRY_TIMES',15);

define('ADMIN_PHONE_NUM','13800138000');
define('USER_PHONE_NUM','13800138001');
define('DESIGNER_PHONE_NUM','13800138002');

$sms = Yii::$app->sms;
while(1){
	/*
	 	对于产品需求中的待用户确认时间状态12小时内，
		这个需求不建议增加定时器，在原有的订单表的字段
		中增加一个对应此状态的timestamp，另外为了不重复推送短消息
		需要增加一个推送短消息的状态tag,另外后期是需要放入队列里来操作。
	*/

	$orders = \frontend\models\Order::find()->all();
	foreach($orders as $o){
		$status = $o->status;
		switch($status){
			case \frontend\services\Order::STATUS_PREINIT:
				$userId = $o->user_id; 
				$message = "［住艺后台］［有新需求］用户$userId刚刚提交了新需求，并选中了$designerId设计师，请尽快联系设计师确认时间。";
				$sms->send(array(ADMIN_PHONE_NUM),$message);
				$message = "［住艺后台］［有订单状态变更］用户$userId刚刚确定了时间、地点，请尽快联系双方再次人工确定时间。";
				$sms->send(array(USER_PHONE_NUM),$message);
				break;
			case \frontend\services\Order::WAITING_USER_TO_CONFIRM_TIME:
				if((time() - $o->timestamp < 12) &&
				(!empty($o->appointment_time) || !empty($o->appointment_locaiton))){
            		$userId = $o->user_id;
            		$userName = \frontend\models\User::findOne($userId)->name;
					$appointmentTime = $o->appointment_time;
					$appointmentLocation = $o->appointment_location;
            		$message = "［住艺后台］［有订单状态变更］用户$userId刚刚确定了时间、地点，>请尽快联系双方再次确定时间。";
            		$sms->send(array(ADMIN_PHONE_NUM),$message);
					$message = "［住艺］［预约成功］尊敬的用户，你的设计师将于$appointmentTime前往$appointmentLocation与你见面，请保持电话畅通，预祝合作愉快。";
					$sms->send(array(ADMIN_USER_NUM),$message);
					$message = "发送文案：［住艺］［预约成功］Hi $designerdId，你的客户已确定$appointmentTime前往地址$appointmentLocation与你见面，请保持电话畅通，预祝合作愉快。";
        		}
				break;
			case \frontend\services\Order::STATUS_WAITING_CONTRACT:
				$userId = $o->user_id; 
				$designerId = $o->designer_id;
				$message = "［住艺后台］［有用户确认深度合作］用户$userId与设计师$designerId确认深度合作，请关注合同上传进程。";
				$sms->send(array(ADMIN_PHONE_NUM),$message);
				break;
		}
	}
	sleep(SLEEP_TIME);
}
