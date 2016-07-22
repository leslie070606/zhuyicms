<?php

namespace common\models;

use Yii;
class ZyImages extends \yii\db\ActiveRecord{
    public static function tableName()
    {
        return '{{%zy_images}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['related_id'], 'integer'],
            [['category', 'url'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'image_id'  => 'ID主键',
            'category'  => '类别',
            'url'       => '图片地址',
            'relate_id' => '相关ID',
        ];
    }
}
