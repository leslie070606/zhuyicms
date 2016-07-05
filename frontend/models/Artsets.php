<?php
namespace frontend\models;
use yii\db\ActiveRecord;

class Artsets extends ActiveRecord{
	public static function tableName(){
		return 'zy_artsets';
	}
	
	public function getArtsetById($artId){
		return $this->findOne($artId);
	}

	public function getArtsetsByDesignerId($designerId){
		return $this->find()->where(['designer_id' => $designerId])->all();
	}

	public function getOneArtByDesignerId($designerId){
		return $this->find()->where(['designer_id' => $designerId])->one();
	}
}
