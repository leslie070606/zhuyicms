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
	
	public function getServiceContent($designerId){
		$rows = $this->find()->where(['designer_id' => $designerId])->one();
		$serviceContent = '';
		if(!empty($rows)){
			$serviceContent = $rows->include_project;
		}
		return $serviceContent;
	}

	public function getServeCity($designerId){
		$rows = $this->find()->where(['designer_id' => $designerId])->one();
		$serveCity = '全国';
		if(!empty($rows)){
			$serveCity = $rows->service_city;
		}
		return $serveCity;
	}

	public function getStyle($designerId){
		$rows = $this->find()->where(['designer_id' => $designerId])->one();
		$style = '皆可';
		if(!empty($rows)){
			$style = $rows->style;
		}
		return $style;
	}
}
