<?php

namespace common\models;

use yii\db\ActiveRecord;

class Message extends ActiveRecord {

    const STATUS_UNREAD = 0;
    const STATUS_READ_DONE = 1;
    const MESSAGE_TYPE_PROJECT = 0;
    const MESSAGE_TYPE_ORDER = 1;
    const MESSAGE_TYPE_USER = 2;

    public static function tableName() {

        return '{{%zyj_message}}';
    }

    public function rules() {
        return [
            ['contents', 'required', 'message' => '内容不能为空'],
            ['type', 'in', 'range' => ['0', '1', '2'], 'message' => '非法操作'],
            ['status', 'in', 'range' => ['0', '1'], 'message' => '非法操作'],
            [['link', 'create_time', 'update_time'], 'safe'],
        ];
    }

    //在添加或者更新
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $time = time();
            if ($this->isNewRecord) {
                $this->create_time = $time;
            } else
                $this->update_time = $time;

            return true;
        }
        return false;
    }

    public function getLatestMessage($n) {
        $ret = $this->find()->orderBy('create_time DESC')->limit($n)->all();
        return $ret;
    }

    public function getUnHandledProject() {
        $ret = $this->find()->where(['type' => self::MESSAGE_TYPE_PROJECT,'status'=>0])->orderBy('create_time DESC')->all();
        return $ret;
    }

    public function getUnHandledOrder() {
        $ret = $this->find()->where(['type' => self::MESSAGE_TYPE_ORDER,'status'=>0])->orderBy('create_time DESC')->all();
        return $ret;
    }

    public function createMessage($data, $type) {
        if (!isset($data) || empty($data)) {
            return -1;
        }
        //type来标识是新需求消息，还是新订单消息。
        $connection = \Yii::$app->db;
        $contents = isset($data['contents']) ? $data['contents'] : '';
        $projectId = isset($data['project_id']) ? $data['project_id'] : null;
        $orderId = isset($data['order_id']) ? $data['order_id'] : null;

        $connection->createCommand()->insert('zyj_message', [
            'project_id' => $projectId,
            'order_id' => $orderId,
            'contents' => $contents,
            'link' => '',
            'type' => $type,
            'status' => self::STATUS_UNREAD,
            'create_time' => time(),
            'update_time' => time(),
        ])->execute();
    }

}
