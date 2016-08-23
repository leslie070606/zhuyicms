<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%zy_feedback}}".
 *
 * @property integer $feedback_id
 * @property integer $user_id
 * @property string $feedback
 * @property string $create_time
 */
class ZyFeedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zy_feedback}}';
    }
    
    public function getZy_user(){
        return $this->hasOne(\common\models\ZyUser::className(), ['user_id'=>'user_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['user_id'], 'integer'],
//            [['feedback'], 'string'],
//            [['create_time'], 'required'],
//            [['create_time'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'feedback_id' => 'ID主键',
            'user_id' => '用户ID',
            'feedback' => '用户反馈',
            'create_time' => '创建时间',
        ];
    }
}
