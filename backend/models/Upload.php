<?php
namespace backend\models;
use Yii;
use yii\web\UploadedFile;
class Upload extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $name;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
           // [["name"], "file",],
        ];
    }
}
