<?php

namespace backend\models;
use yii\db\ActiveRecord;
class DesignerList extends ActiveRecord{
    public static function tableName(){
        
        return '{{%zyj_designer}}';
    }
    
    public function getAllDesigner(){
        
        return $this->find()->all();
    }
}

