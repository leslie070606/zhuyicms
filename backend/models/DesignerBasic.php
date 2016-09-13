<?php

namespace backend\models;

use yii\db\ActiveRecord;

class DesignerBasic extends ActiveRecord {

    public static function tableName() {

        return '{{%zyj_designer_basic}}';
    }

    public function getZyj_designer_work() {
        return $this->hasOne(\backend\models\DesignerWork::className(), ['designer_id' => 'id']);
    }

    public function getZyj_designer_additional() {
        return $this->hasOne(\backend\models\DesignerAdditional::className(), ['designer_id' => 'id']);
    }

    public function getAllDesigner() {

        return $this->find()->all();
    }

}
