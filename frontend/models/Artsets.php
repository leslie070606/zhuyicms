<?php
namespace frontend\models;
use yii\db\ActiveRecord;

class Artsets extends ActiveRecord{
	public static function tableName(){
		return 'zy_artsets';
	}

	public function getArtCntsByDesignerId($designerId){
		return $this->find()->where(['designer_id' => $designerId])->count();
	}
	
	public function getArtsetById($artId){
		return $this->findOne($artId);
	}

	public function getArtsetsByDesignerId($designerId){
		return $this->find()->where(['designer_id' => $designerId])->orderBy(' sort asc ')->all();
	}

	public function getOneArtByDesignerId($designerId){
		$ret = $this->find()->where(['designer_id' => $designerId])->one();
		if(empty($ret)){
			return false;
		}
		
		$topic 		= (isset($ret->topic) && !empty($ret->topic))? $ret->topic: '';
		$brief 		= (isset($ret->brief) && !empty($ret->brief))? $ret->brief: '';
		$location 	= (isset($ret->location) && !empty($ret->location))?
						$ret->location: '';
		$imageIds 	= (isset($ret->image_ids) && !empty($ret->image_ids))?
						$ret->image_ids: '';
		$imageUrl = array();
		if(!empty($imageIds)){
			$imageIdsArray = explode(',',$imageIds);
			$imageModel = new \frontend\models\Images();
			foreach($imageIdsArray as $id){
				$ret = $imageModel->findOne($id);	
				if(empty($ret)){
					continue;
				}
				$imageUrl[] = $ret->url;
			}
		}
		$videoIds 	= (isset($ret->viedo_ids) && !empty($ret->viedo_ids))?
						$ret->viedo_ids: '';
		$viedoUrl = array();
		if(!empty($viedoIds)){
	 		$viedoIdsArray = explode(',',$viedoIds);
			$viedoModel = new \frontend\models\Viedos();
			foreach($viedoIdsArray as $id){
				$ret = $viedoModel->findOne($id);
				if(empty($ret)){
					continue;
				}
				$viedoUrl[] = $ret->url;
			}
		}

		$data = array(
			'topic' 	=> $topic,
			'brief' 	=> $brief,
			'location' 	=> $location,
			'image_url'	=> $imageUrl,
			'viedo_url' => $viedoUrl,
		);
		
		return $data;
	}

	public function getPartArtsByDesignerId($did){
		if(!isset($did) || empty($did)){
			return NULL;
		}
		$ret = $this->find()->where(['designer_id' => $did])->orderBy(' sort ')->limit(3)->all();
		if(empty($ret)){
			return NULL;
		}
		return $ret;
	}
}
