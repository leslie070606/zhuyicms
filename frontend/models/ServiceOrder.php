<?php
namespace frontend\models;
use yii\db\ActiveRecord;

class ServiceOrder extends ActiveRecord{
	const STATUS_DISABLED 						= -1; //无效
	const STATUS_NOT_INIT 						= 0;  //未初始化 
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
	public static function tableName(){
		return 'zy_order';
	}

	public function getOrderById($orderId){
		return $this->findOne($orderId);
	}

	public function setStatus($orderId,$status){
		$order = $this->findOne($orderId);
		$order->status = $status;
		$order->save();
	}
}
