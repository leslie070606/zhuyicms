<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%zy_project}}".
 *
 * @property integer $project_id
 * @property integer $user_id
 * @property string $city
 * @property string $address
 * @property string $compound
 * @property string $decoration_type
 * @property string $covered_area
 * @property string $use_area
 * @property string $budget_design_work
 * @property string $budget_design
 * @property string $budget_ruan
 * @property string $budget_ying
 * @property string $budget_yuanlin
 * @property string $work_time
 * @property string $home_type
 * @property string $project_status
 * @property string $service_type
 * @property string $home_img
 * @property string $favorite_img
 * @property string $designer_level
 * @property string $match_json
 * @property string $description
 * @property string $project_tags
 */
class ZyProject extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%zy_project}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
//            [['user_id', 'city', 'address', 'budget_design', 'description', 'project_tags'], 'required'],
//            [['user_id'], 'integer'],
//            [['description'], 'string'],
//            [['city', 'compound', 'decoration_type', 'covered_area', 'use_area', 'budget_design_work', 'budget_design', 'budget_ruan', 'budget_ying', 'budget_yuanlin', 'home_img', 'favorite_img', 'designer_level'], 'string', 'max' => 50],
//            [['address', 'work_time', 'home_type', 'project_status', 'service_type', 'project_tags'], 'string', 'max' => 100],
//            [['match_json'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'project_id' => 'ID主键',
            'user_id' => '用户ID',
            'city' => '城市',
            'address' => '地址',
            'compound' => '小区名称',
            'decoration_type' => '工装/家装',
            'covered_area' => '建筑面积',
            'use_area' => '使用面积',
            'budget_design_work' => '设计+施工费用',
            'budget_design' => '设计费',
            'budget_ruan' => '软装预算',
            'budget_ying' => '硬装预算',
            'budget_yuanlin' => '园林预算',
            'work_time' => '开工时间',
            'home_type' => '房型',
            'project_status' => '状态',
            'service_type' => '服务类型',
            'home_img' => '家的照片',
            'favorite_img' => '喜欢的照片',
            'designer_level' => '设计师档次',
            'match_json' => '匹配内容字符串JSON',
            'description' => '描述/备注',
            'project_tags' => '客户注重项',
        ];
    }

    public function getHomeImage() {

        $imgModel = new ZyImages();
        $imgarr = explode(',', $this->home_img);
        $imgarr = array_filter($imgarr);

        $this->home_img = '';
        foreach ($imgarr as $imgId) {
            $imgUrl = $imgModel->findOne($imgId);
            $this->home_img .= "<a href='http://www.zhuyihome.com" . $imgUrl->url . "' target='_blank'>" . \yii\helpers\Html::img('http://www.zhuyihome.com' . $imgUrl->url, array('width' => '100px', 'height' => '100px')) . "</a>";
        }

        return $this->home_img;
    }

    public function getFavoriteImage() {

        $imgModel = new ZyImages();
        $imgarr = explode(',', $this->favorite_img);
        $imgarr = array_filter($imgarr);

        $this->favorite_img = '';
        foreach ($imgarr as $imgId) {
            $imgUrl = $imgModel->findOne($imgId);
            $this->favorite_img .= "<a href='http://www.zhuyihome.com" . $imgUrl->url . "' target='_blank'>" . \yii\helpers\Html::img('http://www.zhuyihome.com' . $imgUrl->url, array('width' => '100px', 'height' => '100px')) . "</a>";
        }

        return $this->favorite_img;
    }

	public function getRengong($projectId){
		$rows = $this->findOne($projectId);
		if(empty($rows)){
			return "否";
		}
		$isRengong = $rows->is_rengong;
		if(!isset($isRengong) || empty($isRengong)){
			return "否";
		}
		return "是";
	}
}
