<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%zy_history}}".
 *
 * @property integer $user_id
 * @property string $user_name
 * @property string $phone
 * @property string $content
 * @property string $create_time
 */
class ZyHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zy_history}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'phone', 'create_time'], 'string', 'max' => 50],
            [['content'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'history_id' => 'ID',
            'user_id' => '用户ID',
            'user_name' => '用户姓名',
            'phone' => '手机电话',
            'content' => '搜索内容',
            'create_time' => '搜索时间',
        ];
    }
}
