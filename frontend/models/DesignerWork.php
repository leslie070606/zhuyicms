<?php
namespace frontend\models;
use yii\db\ActiveRecord;
use Yii;

class DesignerWork extends ActiveRecord{
	public static function tableName(){
		return 'zyj_designer_work';
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
