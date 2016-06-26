<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $nickname
 * @property string $mobile
 * @property string $email
 * @property string $avatar
 * @property integer $status
 * @property integer $createtime
 */
class TblUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nickname', 'mobile', 'email', 'avatar', 'status', 'createtime'], 'required'],
            [['status', 'createtime'], 'integer'],
            [['username', 'nickname', 'mobile'], 'string', 'max' => 32],
            [['password', 'email'], 'string', 'max' => 65],
            [['avatar'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'nickname' => 'Nickname',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'avatar' => 'Avatar',
            'status' => 'Status',
            'createtime' => 'Createtime',
        ];
    }
}
