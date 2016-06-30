<?php

namespace backend\models;
use yii\db\ActiveRecord;
class DesignerWork extends ActiveRecord{
    public static function tableName(){
        
        return '{{%zyj_designer_work}}';
    }
    
    public function getAllDesigner(){
        
        return $this->find()->all();
    }
}


