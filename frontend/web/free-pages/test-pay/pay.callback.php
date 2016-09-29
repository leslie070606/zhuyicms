<?php

require_once 'index.controller.php';
$r = file_get_contents("php://input");
$obj = new IndexController();
$obj->payCallBack($r);
