<?php
$event = isset($_REQUEST['event']) ? $_REQUEST['event'] : false;
$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : false;

echo "1111111111111111\n";

if($param) {
    $param = array_map("html_entity_decode", $param);
}

$_ret = false;

if($event && $param) {
    $recipient = new \common\atm\Recipient();
    $_ret = $recipient->receive($event, $param);
}

echo json_encode($_ret);
