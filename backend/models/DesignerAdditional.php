<?php

namespace backend\models;
use yii\db\ActiveRecord;
class DesignerAdditional extends ActiveRecord{
    public static function tableName(){
        
        return '{{%zyj_designer_additional}}';
    }
    
    public function getAllDesigner(){
        
        return $this->find()->all();
    }
}
