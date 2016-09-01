<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%zy_data_count}}".
 *
 * @property integer $id
 * @property integer $main_type_id
 * @property integer $main_detail_id
 * @property string $main_type_name
 * @property string $main_detail_name
 * @property integer $user_id
 * @property integer $designer_id
 * @property string $main_mark
 * @property string $create_time
 * @property integer $main_num
 */
class ZyDataCount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zy_data_count}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main_type_id', 'main_detail_id', 'main_type_name', 'main_detail_name', 'create_time'], 'required'],
            [['main_type_id', 'main_detail_id', 'user_id', 'designer_id', 'main_num'], 'integer'],
            [['main_type_name', 'main_detail_name', 'main_mark'], 'string', 'max' => 500],            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_type_id' => 'Main Type ID',
            'main_detail_id' => 'Main Detail ID',
            'main_type_name' => 'Main Type Name',
            'main_detail_name' => 'Main Detail Name',
            'user_id' => 'User ID',
            'designer_id' => 'Designer ID',
            'main_mark' => 'Main Mark',
            'create_time' => 'Create Time',
            'main_num' => 'Main Num',
        ];
    }
}
