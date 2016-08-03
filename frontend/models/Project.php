<?php
namespace frontend\models;
use yii\db\ActiveRecord;
use Yii;

class Project extends ActiveRecord{
	public static function tableName(){
        return '{{%zy_project}}';
	}

	//目前仅支持一个用户提交一个需求，
	//后期肯定会有多个需求，暂时用one来获取。
	public function getProjectByUserId($userId){
		return $this->find()->where(['user_id' => $userId])->one();
	}
}
