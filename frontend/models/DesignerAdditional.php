<?php
namespace frontend\models;
use yii\db\ActiveRecord;
use Yii;

class DesignerAdditional extends ActiveRecord{
	public static function tableName(){
		return 'zyj_designer_additional';
	}
	
	public function getPhoneByDesignerId($designerId){
		$rows = $this->find()->where(['designer_id' => $designerId])->one();
		if(!empty($rows)){
			return $rows->phone;
		}
		return NULL;
	}
}
