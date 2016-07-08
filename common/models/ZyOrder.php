<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%zy_order}}".
 *
 * @property integer $order_id
 * @property integer $user_id
 * @property integer $project_id
 * @property integer $designer_id
 * @property integer $status
 * @property string $appointment_location
 * @property integer $appointment_time
 * @property string $remark
 * @property string $service_type
 * @property integer $create_time
 * @property integer $update_time
 */
class ZyOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zy_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'project_id', 'designer_id', 'status', 'appointment_time', 'create_time', 'update_time'], 'required'],
            [['user_id', 'project_id', 'designer_id', 'status', 'appointment_time', 'create_time', 'update_time'], 'integer'],
            [['appointment_location', 'service_type'], 'string', 'max' => 50],
            [['remark'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'ID主键',
            'user_id' => '用户ID',
            'project_id' => '项目ID',
            'designer_id' => '设计师ID',
            'status' => '订单状态',
            'appointment_location' => '约见地点',
            'appointment_time' => '约见时间',
            'remark' => '订单备注',
            'service_type' => '服务类型',
            'create_time' => '创建订单',
            'update_time' => '修改时间',
        ];
    }
}
