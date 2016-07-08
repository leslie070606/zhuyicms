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
            [['order_id', 'user_id', 'project_id', 'designer_id', 'status', 'appointment_time', 'create_time', 'update_time'], 'integer'],
            [['appointment_location', 'remark', 'service_type'], 'safe'],
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
