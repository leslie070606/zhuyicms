<?php

namespace backend\models;

class Project extends \common\models\ZyjProject {

    public function rules() {
        return [
            [['uid', 'province', 'city', 'house_type', 'completion_time', 'room_area', 'budget_ceiling', 'service_item', 'generic_require', 'description', 'residential_district', 'photo', 'status', 'createtime', 'updatetime'], 'required'],
            [['uid', 'province', 'city', 'house_type', 'completion_time', 'service_item', 'generic_require', 'status', 'createtime', 'updatetime'], 'integer'],
            [['description'], 'string'],
            [['room_area', 'budget_ceiling', 'residential_district'], 'string', 'max' => 20],
            [['photo'], 'string', 'max' => 255],
        ];
    }

}
