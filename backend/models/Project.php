<?php

namespace backend\models;

class Project extends \common\models\ZyjProject {

    public function rules() {
        return [
            [['house_type', 'completion_time', 'room_area', 'budget_ceiling', 'service_item'], 'required'],
            [['uid', 'province', 'city', 'house_type', 'completion_time', 'status', 'createtime', 'updatetime'], 'integer'],
            [['description'], 'string'],
            [['room_area', 'budget_ceiling', 'residential_district'], 'string', 'max' => 20],
            [['service_item', 'generic_require'], 'string', 'max' => 30],
            [['photo'], 'string', 'max' => 255],
        ];
    }

    public function beforeValidate() {
        $this->service_item = is_array($this->service_item) ? ',' . implode(',', $this->service_item) . ',' : $this->service_item;
        $this->generic_require = is_array($this->generic_require) ? ',' . implode(',', $this->generic_require) . ',' : $this->generic_require;

        return parent::beforeValidate();
    }

}
