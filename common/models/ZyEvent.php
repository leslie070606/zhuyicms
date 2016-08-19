<?php
namespace common\models;
use yii\db\ActiveRecord;

class ZyEvent extends ActiveRecord{
	public static function tableName(){
        return '{{%zy_event}}';
	}

	public function getAllEvents(){
		return $this->find()->all();
	}
}
