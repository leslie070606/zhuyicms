<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%zy_video}}".
 *
 * @property integer $video_id
 * @property string $video_url
 * @property string $video_image
 * @property integer $designer_id
 * @property integer $create_time
 * @property integer $update_time
 */
class ZyVideo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zy_video}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video_url', 'designer_id', 'update_time'], 'required'],
            [['designer_id', 'create_time', 'update_time'], 'integer'],
            [['video_url', 'video_image'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'video_id' => '视频ID',
            'video_url' => '视频URL',
            'video_image' => '视频封面图',
            'designer_id' => '设计师ID',
            'create_time' => '创建时间',
            'update_time' => '添加时间',
        ];
    }
}
