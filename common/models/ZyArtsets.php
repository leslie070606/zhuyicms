<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%zy_artsets}}".
 *
 * @property integer $art_id
 * @property integer $designer_id
 * @property string $image_ids
 * @property string $video_ids
 * @property string $topic
 * @property string $brief
 * @property string $art_path
 * @property string $location
 * @property string $city
 * @property string $address
 * @property integer $design_cost
 * @property integer $total_cost
 * @property string $remark
 * @property integer $sort
 * @property integer $complete_time
 * @property integer $create_time
 * @property integer $update_time
 */
class ZyArtsets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zy_artsets}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['designer_id', 'design_cost', 'total_cost', 'sort', 'create_time', 'update_time'], 'integer'],
            [['remark'], 'string'],
            [['image_ids', 'video_ids', 'topic', 'brief', 'art_path', 'location', 'complete_time','city', 'address'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'art_id' => 'ID主键',
            'designer_id' => '设计师ID',
            'image_ids' => '作品相关图片',
            'video_ids' => '作品相关视频',
            'topic' => '作品的名称',
            'brief' => '作品的简介',
            'art_path' => '作品的背景图、视频路径',
            'location' => '作品地点',
            'city' => '作品所在城市',
            'address' => '作品所在小区',
            'design_cost' => '设计费用',
            'total_cost' => '总项目费用',
            'remark' => '备注',
            'sort' => '排序字段',
            'complete_time' => '完成时间',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
        ];
    }
}
