<?php
gc_enable();

define('SLEEP_TIME',1);
define('RETRY_TIMES',15);

while(1){
	$orders = \frontend\models\Order::find()->where('status' => \frontend\services\Order::STATUS_WAITING_USER_TO_CONFIRM_TIME)->all();

	/*对于产品需求中的待用户确认时间状态12小时内，
	这个需求不建议增加定时器，在原有的订单表的字段
	中增加一个对应此状态的timestamp，另外为了不重复推送短消息
	需要增加一个推送短消息的状态tag*/
	foreach($orders as $o){
		if((time() - $o->timestamp < 12)  && (!empty($o->appointment_time) || !empty($o->appointment_locaiton)))
	}
	sleep(SLEEP_TIME);
}
