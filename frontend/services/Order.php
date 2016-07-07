<?php
namespace frontend\services;

use frontend\services\order;

class Order extends \frontend\services\order\Base{
	protected $state = null;

	const STATUS_DISABLED 						= -1; //无效
	const STATUS_PRE_INIT 						= 0;  //未初始化 
	const STATUS_INIT 							= 1;  //初始化
	const STATUS_USER_DEMAND_NOT_SUBMITTED 		= 2;  //等待用户提交需求
	const STATUS_MATCHING_DESIGNER 				= 3;  //正在匹配设计师
	const STATUS_WAITING_FOR_USER_CONFIRM_TIME 	= 4;  //等待用户确认时间
	const STATUS_USER_TIME_CONFIRMED 			= 5;  //用户已确认时间
	const STATUS_WAITING_MEETING 				= 6;  //等待约见
	const STATUS_MET_NOT_DEEP_COOPERATION 		= 7;  //已见面未深度合作
	const STATUS_WAITING_CONTRACT 				= 8;  //深度合作等待合同上传中
	const STATUS_SERVICE_END					= 9;  //合作完成
	const STATUS_SERVICE_CANCELLED				= 10; //取消合作

	public function __construct($id){
		parent::__construct($id);

		//retrive order status accordingly
		$this->setState($this->row->status);
		//消息队列Q，通知订单状态修改。
	}

	public function test(){
		echo ("module test function ...");
	}

	public function setState($status){
		switch($status){
			case self::STATUS_PRE_INIT:
				$this->state = new \frontend\services\order\PreInitState($this);
				break;
			case self::STATUS_INIT:
				$this->state = new \frontend\services\order\InitState($this);
				$this->state->test();
				break;
			case self::STATUS_USER_DEMAND_NOT_SUBMITTED:
				$this->state = new \frontend\services\order\UserDemandNotSubmittedState($this);
				break;

			case self::STATUS_SERVICE_END:
			case self::STATUS_SERVICE_CANCELLED:
				$this->state = new \frontend\services\order\ServiceEndState($this);
				break;
			default:
				$this->state = new \frontend\services\order\InvalidState($this);
				break;
		}
	}

	public function addOrder($order){
		$orderModel = new \frontend\models\Order();
		return $orderModel->addOrder($order);
	}
}
