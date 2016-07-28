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

	public function getHeadPortrait($did){
		if(!isset($did)){
			return null;
		}
		$rows = $this->findOne($did);
		if(empty($rows)){
			return null;
		}
		$imgId = $rows->image_id;
		$rows = \frontend\models\Images::findOne($imgId);		
		if(empty($rows)){
			return null;
		}
		return $rows->url;
	}

	public function getBackground($did){
		if(!isset($did) || empty($did)){
			return NULL;
		}
		$rows = \frontend\models\Artsets::find()
			->where(['designer_id' => $did])->orderBy('art_id ASC')->limit(1)->one();
		if(empty($rows)){
			return NULL;
		}
		$imageIds = $rows->image_ids;
		if(!isset($imageIds) || empty($imageIds)){
			return NULL;
		}
		//取出第一个图片id.
		$tmpArr = explode(',',$imageIds);
		$firstId = $tmpArr[0];
		
		$imgRows = \frontend\models\Images::findOne($firstId);
		if(empty($imgRows)){
			return NULL;
		}

		$background = isset($imgRows->url)? $imgRows->url : '/img/home_page/prob.jpg';
		return $background;
	}
}
