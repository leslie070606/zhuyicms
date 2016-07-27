<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%zy_user}}".
 *
 * @property integer $user_id
 * @property integer $project_id
 * @property integer $style_id
 * @property string $favored_designer_ids
 * @property string $name
 * @property string $openid
 * @property string $nickname
 * @property string $phone
 * @property string $email
 * @property integer $status
 * @property string $profession
 * @property integer $sex
 * @property string $city
 * @property string $language
 * @property string $country
 * @property string $headimgurl
 * @property string $unionid
 * @property string $privilege
 * @property string $address
 * @property integer $create_time
 * @property integer $update_time
 */
class ZyUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zy_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['project_id', 'style_id', 'status', 'sex', 'create_time', 'update_time'], 'integer'],
//            [['name', 'phone', 'email', 'sex', 'city', 'language', 'country', 'headimgurl', 'privilege', 'create_time', 'update_time'], 'required'],
//            [['favored_designer_ids', 'openid', 'address'], 'string', 'max' => 100],
//            [['name'], 'string', 'max' => 32],
//            [['nickname'], 'string', 'max' => 30],
//            [['phone', 'profession', 'city', 'headimgurl'], 'string', 'max' => 50],
//            [['email'], 'string', 'max' => 256],
//            [['language'], 'string', 'max' => 10],
//            [['country'], 'string', 'max' => 20],
//            [['unionid', 'privilege'], 'string', 'max' => 200],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'project_id' => '需求ID',
            'style_id' => '风格报告ID',
            'favored_designer_ids' => '收藏的设计师ID 以逗号隔开',
            'name' => '用户名',
            'openid' => '微信',
            'nickname' => '用户昵称',
            'phone' => '手机号',
            'email' => 'Email',
            'status' => 'Status',
            'profession' => '职业',
            'sex' => '性别',
            'city' => '城市',
            'language' => '语言',
            'country' => '国家',
            'headimgurl' => '用户的头像',
            'unionid' => '联合ID',
            'privilege' => '特权',
            'address' => '住址',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
