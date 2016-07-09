<?php
namespace frontend\services;

use frontend\services\order;

class Order extends \frontend\services\order\Base{
	protected $state = null;

	const STATUS_PRE_INIT 						= -1;
	const STATUS_WAITING_DESIGNER_TO_CONFIRM	= 0;
	const STATUS_WAITING_USER_TO_CONFIRM_TIME	= 1;
	const STATUS_WAITING_MEETING 				= 2;
	const STATUS_CANCEL_MEETING 				= 3;
	const STATUS_NOT_TO_MEET					= 4;
	const STATUS_MET_NOT_DEEP_COOPERATION		= 5;
	const STATUS_WAITING_CONTRACT				= 6;
	const STATUS_SERVICE_END					= 7;
	const STATUS_SERVICE_CANCELLED				= 8;

	static $ORDER_STATUS_DICT = array(
		self::STATUS_PRE_INIT 						=> '初始状态',
		self::STATUS_WAITING_DESIGNER_TO_CONFIRM 	=> '待设计师确认',
		self::STATUS_WAITING_USER_TO_CONFIRM_TIME 	=> '待用户确认时间',
		self::STATUS_WAITING_MEETING				=> '待见面',
		self::STATUS_CANCEL_MEETING					=> '取消约见',
		self::STATUS_NOT_TO_MEET					=> '不见面',
		self::STATUS_MET_NOT_DEEP_COOPERATION		=> '已见面未深度合作',
		self::STATUS_WAITING_CONTRACT				=> '已深度合作未上传合同',
		self::STATUS_SERVICE_END					=> '已深度合作已上传合同',
		self::STATUS_SERVICE_CANCELD				=> '取消合作'
	);

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
			case self::STATUS_WAITING_DESIGNER_TO_CONFIRM:
				$this->state = new \frontend\services\order\WaitingDesignerState($this);
				$this->state->test();
				break;
			case self::STATUS_WAITING_USER_TO_CONFIRM_TIME:
				$this->state = new \frontend\services\order\WaitingUserState($this);
				break;
			case self::STATUS_WAITING_MEETING:
				$this->state = new \frontend\services\order\WaitingMeetingState($this);
				break;
			case self::STATUS_CANCEL_MEETING:
				$this->state = new \frontend\services\order\CancelMeetingState($this);
				break;
			case self::STATUS_NOT_TO_MEET:
				$this->state = new \frontend\services\order\NotMeetState($this);
				break;
			case self::STATUS_MET_NOT_DEEP_COOPERATION:
				$this->state = new \frontend\services\order\NotDeepCoopState($this);
				break;
			case self::STATUS_WAITING_CONTRACT:
				$this->state = new \frontend\services\order\WaitingContractState($this);
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
