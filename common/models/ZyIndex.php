<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%zy_index}}".
 *
 * @property integer $index_id
 * @property integer $designer_id
 * @property string $designer_name
 * @property string $designer_city
 * @property string $description
 * @property integer $video_id
 * @property integer $sort
 */
class ZyIndex extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zy_index}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['designer_id', 'designer_name', 'designer_city', 'description', 'video_id'], 'required'],
            [['designer_id', 'video_id', 'sort'], 'integer'],
            [['designer_name', 'designer_city'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'index_id' => '首页ID',
            'designer_id' => '设计师ID',
            'designer_name' => '设计师姓名',
            'designer_city' => '所在城市',
            'description' => '描述',
            'video_id' => '视频ID',
            'sort' => '排序',
        ];
    }
}
