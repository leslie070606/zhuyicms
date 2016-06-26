<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Project;

/**
 * ProjectSearch represents the model behind the search form about `backend\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uid', 'province', 'city', 'house_type', 'completion_time', 'service_item', 'generic_require', 'status', 'createtime', 'updatetime'], 'integer'],
            [['room_area', 'budget_ceiling', 'description', 'residential_district', 'photo'], 'safe'],
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
        $query = Project::find();

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
            'id' => $this->id,
            'uid' => $this->uid,
            'province' => $this->province,
            'city' => $this->city,
            'house_type' => $this->house_type,
            'completion_time' => $this->completion_time,
            'service_item' => $this->service_item,
            'generic_require' => $this->generic_require,
            'status' => $this->status,
            'createtime' => $this->createtime,
            'updatetime' => $this->updatetime,
        ]);

        $query->andFilterWhere(['like', 'room_area', $this->room_area])
            ->andFilterWhere(['like', 'budget_ceiling', $this->budget_ceiling])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'residential_district', $this->residential_district])
            ->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
