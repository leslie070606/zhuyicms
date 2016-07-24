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
            [['url'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'image_id'  => 'ID主键',
            'url'       => '图片地址',
        ];
    }
}
