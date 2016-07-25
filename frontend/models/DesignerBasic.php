<?php
namespace frontend\models;
use yii\db\ActiveRecord;
use Yii;

class DesignerBasic extends ActiveRecord{
	public static function tableName(){
		return 'zyj_designer_basic';
	}

	public function getDesignersCount(){
		return $this->find()->count();
	}

	public function getPartDesigners($start){
		$count 	= 3;//固定显示3条数据.
		$sql 	= "SELECT * FROM zyj_designer_basic LIMIT $start,$count;";
		$rows 	= Yii::$app->db->createCommand($sql)->queryAll();
		return $rows;
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
