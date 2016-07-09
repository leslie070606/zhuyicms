<?php
namespace backend\models;

use yii\db\ActiveRecord;

class Order extends ActiveRecord{
	public static function tableName(){
		return 'zy_order';
	}

	public function getAllOrders(){
		return $this->find()->all();
	}

	public function getOrderById($orderId){
		return $this->findOne($orderId);
	}

	public function deleteOrderById($orderId){
		return $this->findOne($orderId)->delete();
	}
}
