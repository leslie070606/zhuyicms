<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%zy_share}}".
 *
 * @property integer $share_id
 * @property string $source_openid
 * @property string $open_id
 * @property string $user_name
 * @property string $headimgurl
 * @property string $create_time
 * @property string $share_time
 */
class ZyShare extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zy_share}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['source_openid', 'open_id','problem_data','style', 'user_name','unionid'], 'string', 'max' => 200],
            [['headimgurl', 'create_time', 'share_time'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'share_id' => '自增ID',
            'source_openid' => '源openid',
            'open_id' => 'openid',
            'user_name' => '用户昵称',
            'headimgurl' => '用户的头像',
            'create_time' => '创建时间',
            'share_time' => '分享时间',
            'unionid' => '联合ID',
            'style' => '风格',
            'problem_data'=>'问题的匹配度'
        ];
    }
}
