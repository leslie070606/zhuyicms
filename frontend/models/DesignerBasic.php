<?php
namespace frontend\models;
use yii\db\ActiveRecord;

class DesignerBasic extends ActiveRecord{
	public static function tableName(){
		return 'zy_designer_basic';
	}

	public function getDesignersCount(){
		return $this->find()->count();
	}
	
	public function getAllDesigners(){
		return $this->find()->all();
	}

	public function getDesignerById($designerId){
		return $this->findOne($designerId);
	}

	public function getDesignerByPhone($cellphone){
		return $this->find()->where(['cellphone' => $cellphone])->one();
	}

	public function getFilteredDesigners($condition){
		return $this->find()->where($condition)->all();
	}
}
