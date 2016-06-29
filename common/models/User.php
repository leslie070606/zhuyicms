<?php

namespace common\models;

class User extends TblUser implements \yii\web\IdentityInterface {

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['pwd' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['user_name' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->user_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->pwd;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->pwd === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return $this->pwd === md5($password);
    }

}
