<?php
namespace frontend\models;
use yii\db\ActiveRecord;

class Images extends ActiveRecord{
	const IMAGE_USER_HEAD_PORTRAIT 			= 0;
	const IMAGE_DESIGNER_HEAD_PORTRAIT 		= 1;
	const IMAGE_CUSTOMER_HEAD_PORTRAIT		= 2;
	const IMAGE_USER_BACKGROUND 			= 3;
	const IMAGE_DESIGNER_BACKGROUND 		= 4;
	const IMAGE_CUSTOMER_BACKGROUND			= 5;
	const IMAGE_ATTACHMENT					= 6;
	const IMAGE_OTHERS						= 7;
	public static function tableName(){
		return 'zy_images';
	}

	public function getImage($type,$relatedId){
		return $this->find()->where(['category' => $type,'related_id' => $relatedId])->one();
	}
}
