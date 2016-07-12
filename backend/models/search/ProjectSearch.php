<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ZyProject;

/**
 * ProjectSearch represents the model behind the search form about `common\models\ZyProject`.
 */
class ProjectSearch extends ZyProject
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'user_id'], 'integer'],
            [['city', 'address', 'compound', 'decoration_type', 'covered_area', 'use_area', 'budget_design_work', 'budget_design', 'budget_ruan', 'budget_ying', 'budget_yuanlin', 'work_time', 'home_type', 'project_status', 'service_type', 'home_img', 'favorite_img', 'designer_level', 'match_json', 'description', 'project_tags'], 'safe'],
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
        $query = ZyProject::find();

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
            'project_id' => $this->project_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'compound', $this->compound])
            ->andFilterWhere(['like', 'decoration_type', $this->decoration_type])
            ->andFilterWhere(['like', 'covered_area', $this->covered_area])
            ->andFilterWhere(['like', 'use_area', $this->use_area])
            ->andFilterWhere(['like', 'budget_design_work', $this->budget_design_work])
            ->andFilterWhere(['like', 'budget_design', $this->budget_design])
            ->andFilterWhere(['like', 'budget_ruan', $this->budget_ruan])
            ->andFilterWhere(['like', 'budget_ying', $this->budget_ying])
            ->andFilterWhere(['like', 'budget_yuanlin', $this->budget_yuanlin])
            ->andFilterWhere(['like', 'work_time', $this->work_time])
            ->andFilterWhere(['like', 'home_type', $this->home_type])
            ->andFilterWhere(['like', 'project_status', $this->project_status])
            ->andFilterWhere(['like', 'service_type', $this->service_type])
            ->andFilterWhere(['like', 'home_img', $this->home_img])
            ->andFilterWhere(['like', 'favorite_img', $this->favorite_img])
            ->andFilterWhere(['like', 'designer_level', $this->designer_level])
            ->andFilterWhere(['like', 'match_json', $this->match_json])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'project_tags', $this->project_tags]);

        return $dataProvider;
    }
}
