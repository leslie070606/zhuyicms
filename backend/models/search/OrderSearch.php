<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ZyOrder;

/**
 * OrderSearch represents the model behind the search form about `common\models\ZyOrder`.
 */
class OrderSearch extends ZyOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'user_id', 'project_id', 'designer_id', 'appointment_time', 'create_time', 'update_time'], 'integer'],
            [['status', 'appointment_location', 'remark', 'service_type'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ZyOrder::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

		//前台传递过来的状态参数，
		//MBD改成中文了，必须转变成原有的整形常量。
		switch($this->status){
			case '待设计师确认':
				$this->status = ZyOrder::STATUS_WAITING_DESIGNER_TO_CONFIRM;
				break;
			case '待用户确认时间':
				$this->status = ZyOrder::STATUS_WAITING_USER_TO_CONFIRM_TIME;
				break;
			case '待见面':
				$this->status = ZyOrder::STATUS_WAITING_MEETING;
				break;
			case '预约已取消':
				$this->status = ZyOrder::STATUS_CANCEL_MEETING;
				break;
			case '待确认见面完成':
				$this->status = ZyOrder::STATUS_WAITING_MET_DONE;
				break;
			case '已见面':
				$this->status = ZyOrder::STATUS_MET_DONE;
				break;
			case '已见面未深度合作':
				$this->status = ZyOrder::STATUS_MET_NOT_DEEP_COOPERATION;
				break;
			case '已深度合作':
				$this->status = ZyOrder::STATUS_MET_DEEP_COOPERATION;
				break;
			case '已深度合作未上传合同':
				$this->status = ZyOrder::STATUS_WAITING_CONTRACT;
				break;
			case '已深度合作已上传合同':
				$this->status = ZyOrder::STATUS_SERVICE_END;
				break;
		}

        // grid filtering conditions
        $query->andFilterWhere([
            'order_id' => $this->order_id,
            'user_id' => $this->user_id,
            'project_id' => $this->project_id,
            'designer_id' => $this->designer_id,
            'status' => $this->status,
            'appointment_time' => $this->appointment_time,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'appointment_location', $this->appointment_location])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'service_type', $this->service_type]);

        return $dataProvider;
    }
}
