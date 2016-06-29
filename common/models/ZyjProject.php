<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zyj_project".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $province
 * @property integer $city
 * @property integer $house_type
 * @property integer $completion_time
 * @property string $room_area
 * @property string $budget_ceiling
 * @property string $service_item
 * @property string $generic_require
 * @property string $description
 * @property string $residential_district
 * @property string $photo
 * @property integer $status
 * @property integer $createtime
 * @property integer $updatetime
 */
class ZyjProject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zyj_project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'province', 'city', 'house_type', 'completion_time', 'room_area', 'budget_ceiling', 'service_item', 'generic_require', 'description', 'residential_district', 'photo', 'status', 'createtime', 'updatetime'], 'required'],
            [['user_id', 'province', 'city', 'house_type', 'completion_time', 'status', 'createtime', 'updatetime'], 'integer'],
            [['description'], 'string'],
            [['room_area', 'budget_ceiling', 'residential_district'], 'string', 'max' => 20],
            [['service_item', 'generic_require'], 'string', 'max' => 30],
            [['photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => 'ID',
            'user_id' => '用户id',
            'province' => '省份',
            'city' => '城市',
            'house_type' => '房子类型',
            'completion_time' => '完工时间',
            'room_area' => '房间使用面积',
            'budget_ceiling' => '预算上限',
            'service_item' => '服务的项目',
            'generic_require' => '共性要求',
            'description' => '详细描述',
            'residential_district' => '居住小区',
            'photo' => '照片',
            'status' => '状态',
            'createtime' => '创建时间',
            'updatetime' => '更新时间',
        ];
    }
}
