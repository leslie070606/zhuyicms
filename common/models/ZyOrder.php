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
class ZyOrder extends \yii\db\ActiveRecord {

    const STATUS_DISABLED = -1;
    const STATUS_WAITING_DESIGNER_TO_CONFIRM = 0;
    const STATUS_WAITING_USER_TO_CONFIRM_TIME = 1;
    const STATUS_WAITING_MEETING = 2;
    const STATUS_CANCEL_MEETING = 3;
    const STATUS_NOT_TO_MEET = 4;
    const STATUS_WAITING_MET_DONE = 5;
    const STATUS_MET_DONE = 6;
    const STATUS_MET_NOT_DEEP_COOPERATION = 7;
    const STATUS_MET_DEEP_COOPERATION = 8;
    const STATUS_WAITING_CONTRACT = 9;
    const STATUS_SERVICE_END = 10;
    const STATUS_SERVICE_CANCELLED = 11;
	
	const TYPE_CUSTOM_CREATED = 0;
	const TYPE_USER_CREATED = 1;

	static $SERVICE_TYPE_DICT = array(
		self::TYPE_CUSTOM_CREATED => '客服创建',
		self::TYPE_USER_CREATED	=> '用户创建'
	);
    static $ORDER_STATUS_DICT = array(
        self::STATUS_DISABLED => '无效订单',
        self::STATUS_WAITING_DESIGNER_TO_CONFIRM => '待设计师确认',
        self::STATUS_WAITING_USER_TO_CONFIRM_TIME => '待用户确认时间',
        self::STATUS_WAITING_MEETING => '待见面',
        self::STATUS_CANCEL_MEETING => '预约已取消',
        self::STATUS_NOT_TO_MEET => '不见面',
        self::STATUS_WAITING_MET_DONE => '待确认见面完成',
        self::STATUS_MET_DONE => '已见面',
        self::STATUS_MET_NOT_DEEP_COOPERATION => '已见面未深度合作',
        self::STATUS_MET_DEEP_COOPERATION => '已深度合作',
        self::STATUS_WAITING_CONTRACT => '已深度合作未上传合同',
        self::STATUS_SERVICE_END => '已深度合作已上传合同',
        self::STATUS_SERVICE_CANCELLED => '取消合作'
    );

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%zy_order}}';
    }
    
    public function getZy_user(){
        return $this->hasOne(\common\models\ZyUser::className(), ['user_id'=>'user_id'])
;
    }

    public function getZyj_designer_basic(){
        return $this->hasOne(\common\models\ZyjDesignerBasic::className(), ['id'=>'designer_id']);
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'project_id', 'designer_id'], 'required'],
            [['user_id', 'project_id', 'designer_id', 'status', 'create_time', 'update_time'], 'integer'],
            [['appointment_location', 'service_type'], 'string', 'max' => 255],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'order_id' => '订单ID',
            'user_id' => '用户ID',
            'project_id' => '需求ID',
            'designer_id' => '设计师ID',
            'status' => '订单状态',
            'designer_spare_time' => '设计师的空闲时间',
            'appointment_location' => '约见地点',
            'appointment_time' => '约见时间',
            'remark' => '订单备注',
            'reason' => '推荐理由',
            'service_type' => '订单类型',
            'create_time' => '创建订单',
            'update_time' => '修改时间',
        ];
    }

    public static function getStatusMessage($orderId) {
        $rows = self::findOne($orderId);
        if (empty($rows)) {
            return "无效状态";
        }
        $status = $rows->status;
        return self::$ORDER_STATUS_DICT[$status];
    }

	public static function getDesignerName($designerId){
		$rows = \backend\models\DesignerBasic::findOne($designerId);
		$name = '';
		if(!empty($rows)){
			$name = $rows->name;
		}
		return $name;
	}

	/*
	public function getDesigner(){
		return $this->hasOne(\backend\models\DesignerBasic::className(),['id' => 'designer_id']);
	}*/
}
