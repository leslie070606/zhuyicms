<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%zy_search_hot}}".
 *
 * @property integer $hot_search_id
 * @property integer $hot_designer_id
 * @property integer $hot_sort
 * @property integer $hot_status
 * @property string $hot_uptime
 */
class ZySearchHot extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%zy_search_hot}}';
    }

    public function getZyj_designer_basic() {
        return $this->hasOne(\common\models\ZyjDesignerBasic::className(), ['id' => 'hot_designer_id']);
    }

    public function getZyj_designer_work() {
        return $this->hasOne(\common\models\ZyjDesignerWork::className(), ['designer_id' => 'hot_designer_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['hot_designer_id', 'hot_sort', 'hot_uptime'], 'required'],
            [['hot_designer_id', 'hot_sort', 'hot_status'], 'integer'],
            [['hot_uptime'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'hot_search_id' => 'Hot Search ID',
            'hot_designer_id' => 'Hot Designer ID',
            'hot_sort' => 'Hot Sort',
            'hot_status' => 'Hot Status',
            'hot_uptime' => 'Hot Uptime',
        ];
    }

}
