<?php
namespace frontend\models;
use yii\db\ActiveRecord;

class Order extends ActiveRecord{
	private $_field = null;  
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

	public function __construct(){
		parent::__construct();
		$this->_field = array(
			'order_id','user_id','project_id',
			'status','appointment_time','appointment_location',
			'remark','service_type','create_time','update_time',
		);
	}

	public static function tableName(){
		return 'zy_order';
	}


	//添加订单
	public function addOrder($data){
		if(empty($data) || !is_array($data)){
			return false;
		}
		$updateField = array_intersect($this->_field,array_keys($data));
		foreach($updateField as $k => $v){
			$this->v = $data[$v];
		}
		
		$this->save();
	}

	public function updateOrderById($id,$data){
		$ret = $this->findOne($id);
		if(empty($ret)){
			return false;
		}
		if(empty($data) || !is_array($data)){
			return false;
		}
		$updateField = array_intersect($this->_field,array_keys($data));
		foreach($updateField as $k => $v){
			$ret->v = $data[$v];
		}
		
		$ret->save();
	}

	public function updateOrder($condition,$data){
		/*
		\app\models\Article::updateAll(['title' => 'change title'],['id' => 1]);
		*/
		return $this->updateAll($data,$condition);
	}

	public function setStatus($orderId,$status){
		$order = $this->findOne($orderId);
		$order->status = $status;
		$order->save();
	}

	public function getAllOrders(){
		return $this->find()->all();
	}

	public function getOrderById($orderId){
		return $this->findOne($orderId);
	}

	public function getOrders($sql){
		return $this->findBySql($sql)->all();
	}
	
	public function getOrder($sql){
		return $this->findBySql($sql)->one();
	}

	public function deleteOrderById($id){
		return $this->findOne($id)->delete();
	}
	
	public function deleteOrder($condition,$params){
		// 删除多个年龄大于20，性别为男（Male）的客户记录
		//Customer::deleteAll('age > :age AND gender = :gender',
		//[':age' => 20,':gender' => 'M']);
		return $this->deleteAll($condition,$params);
	}
}
