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
            [['user_name', 'pwd', 'nick_name', 'mobile', 'email', 'status', 'create_time'], 'required'],
            [['status', 'createtime'], 'integer'],
            [['user_name', 'nick_name', 'mobile'], 'string', 'max' => 32],
            [['pwd', 'email'], 'string', 'max' => 65],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User_name',
            'pwd' => 'Pwd',
            'nick_name' => 'Nick_name',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'status' => 'Status',
            'create_time' => 'Create_time',
        ];
    }
}
