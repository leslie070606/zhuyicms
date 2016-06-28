<?php
namespace common\util\emaysms;
define('SMS_PATH', dirname(__FILE__));
global $client;
set_include_path(SMS_PATH . '/');
//短息操作类，以封装函数，随用随取
include_once(SMS_PATH . '/sendsms.php');
/**
 * 给手机发送短信组件
 */
class Sms {

    /**
	 * 发送短信
	 * @param mixed $phones
	 * @param string $message
	 */
	public function send($phones, $message)
	{
		if(!is_array($phones))
			$phones = array($phones);

    	$retsms = $GLOBALS['client']->sendSMS($phones,$message);
        return  $retsms;
	}
}

?>
