<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Order extends ActiveRecord {

    private $_field = null;

    const STATUS_DISABLED = -1;
    const STATUS_WAITING_DESIGNER_TO_CONFIRM = 0;
    const STATUS_WAITING_USER_TO_CONFIRM_TIME = 1;
    const STATUS_WAITING_MEETING = 2;
    const STATUS_CANCEL_MEETING = 3;
    const STATUS_NOT_TO_MEET = 4;
    const STATUS_WAITING_MET_DONE = 5;
    const STATUS_MET_DONE = 6;
    const STATUS_MET_NOT_DEEP_COOPERATION = 7;
    const STATUS_MET_DEEP_COOPERATION = 8;
    const STATUS_WAITING_CONTRACT = 9;
    const STATUS_SERVICE_END = 10;
    const STATUS_SERVICE_CANCELLED = 11;

    static $ORDER_STATUS_DICT = array(
        self::STATUS_DISABLED => '无效订单',
        self::STATUS_WAITING_DESIGNER_TO_CONFIRM => '待设计师确认',
        self::STATUS_WAITING_USER_TO_CONFIRM_TIME => '待用户确认时间',
        self::STATUS_WAITING_MEETING => '待见面',
        self::STATUS_CANCEL_MEETING => '预约已取消',
        self::STATUS_NOT_TO_MEET => '不见面',
        self::STATUS_WAITING_MET_DONE => '待确认见面完成',
        self::STATUS_MET_DONE => '已见面',
        self::STATUS_MET_NOT_DEEP_COOPERATION => '已见面未深度合作',
        self::STATUS_MET_DEEP_COOPERATION => '已深度合作',
        self::STATUS_WAITING_CONTRACT => '已深度合作未上传合同',
        self::STATUS_SERVICE_END => '已深度合作已上传合同',
        self::STATUS_SERVICE_CANCELLED => '取消合作'
    );

    public function __construct() {
        parent::__construct();
        $this->_field = array(
            'order_id', 'user_id', 'designer_id', 'project_id',
            'status', 'appointment_time', 'appointment_location',
            'remark', 'service_type', 'create_time', 'update_time',
        );
    }

    public static function tableName() {
        return 'zy_order';
    }

    //添加订单
    public function addOrder($data) {
        if (empty($data) || !is_array($data)) {
            return false;
        }
        $updateField = array_intersect($this->_field, array_keys($data));
        foreach ($updateField as $k => $v) {
            $this->$v = $data[$v];
        }
        $this->save();
    }

    public function updateOrder($data, $condition) {
        /*
          \app\models\Article::updateAll(['title' => 'change title'],['id' => 1]);
         */
        //return $this->updateAll(['status' => 2],['order_id' => 3]);
        return $this->updateAll($data, $condition);
    }

	public function updateOrderById($data,$orderId){
		return $this->updateAll($data,['order_id' => $orderId]);
	}

    public function setStatus($orderId, $status) {
        $order = $this->findOne($orderId);
        $order->status = $status;
        $order->save();
    }

    public function getAllOrders() {
        return $this->find()->all();
    }

    public function getOrderById($orderId) {
        return $this->findOne($orderId);
    }

    public function getOrdersByUserId($userId) {
        return $this->find()->where(['user_id' => $userId])->all();
    }

    public function getOrders($sql) {
        return $this->findBySql($sql)->all();
    }

    public function getOrder($sql) {
        return $this->findBySql($sql)->one();
    }

    public function deleteOrderById($id) {
        return $this->findOne($id)->delete();
    }

    public function deleteOrder($condition, $params) {
        // 删除多个年龄大于20，性别为男（Male）的客户记录
        //Customer::deleteAll('age > :age AND gender = :gender',
        //[':age' => 20,':gender' => 'M']);
        return $this->deleteAll($condition, $params);
    }

}
