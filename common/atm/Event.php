<?php
/*
namespace common\atm;
use Yii;

class Event{
	const SERVICE_ORDER_CHANGE = 1;

	public static function send($apiHost,$event,$params,$retry = 3){
		if($retry < 1){
			return false;
		}
		
		$_url = "http://$apiHost/api/event_receive.php";
        $_data = array();
        $_data['event'] = $event;
        foreach($params as $k => $v) {
            $_data["param[$k]"] = $v;
        }
        $_ch = curl_init($_url);
        curl_setopt($_ch, CURLOPT_HEADER, false);
        curl_setopt($_ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($_ch, CURLOPT_POST, true);
        curl_setopt($_ch, CURLOPT_POSTFIELDS, $_data);
        curl_setopt($_ch, CURLOPT_TIMEOUT, 3);
        $_ret = curl_exec($_ch);
		$_retCode = curl_getinfo($_ch, CURLINFO_HTTP_CODE);
        Yii::getLogger()->log(__METHOD__ . "::Response Code = $_retCode",Yii\log\Logger::LEVEL_INFO);
		if($_retCode != 200){
            Yii::getLogger()->log(__METHOD__ . '::Error Msg = '.  curl_errno($_ch)
            	. " " . $event . " " .var_export($params, true),Yii\log\Logger::LEVEL_INFO);
        }
        curl_close($_ch);
        return $_ret ? : self::send($apiHost, $event, $params, $retry - 1);
	}
}
*/
