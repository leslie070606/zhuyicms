<?php
namespace frontend\models;
use yii\db\ActiveRecord;
use Yii;

class DesignerWork extends ActiveRecord{
	public static function tableName(){
		return 'zyj_designer_work';
	}

	public function getCity($designerId){
		$rows = $this->find()->where(['designer_id' => $designerId])->one();
		$city = '';
		if(!empty($rows)){
			return isset($rows->city)? $rows->city : '北京';
		}

		return '北京';
	}

	public function getCost($designerId){
		$rows = $this->find()->where(['designer_id' => $designerId])->one();
		$charge = '';
		$chargeWork = '';
		if(!empty($rows)){
			$charge = $rows->charge;
			$chargeWork = $rows->charge_work;
		}
		return array('charge'=> $charge,'charge_work' => $chargeWork);
	}
	
}
