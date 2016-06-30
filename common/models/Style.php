<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zy_style".
 *
 * @property integer $style_id
 * @property string $type
 */
class Style extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zy_style';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'style_id' => 'ID主键',
            'type' => '测试后的风格',
        ];
    }
}
