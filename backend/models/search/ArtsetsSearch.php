<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ZyArtsets;

/**
 * ArtsetsSearch represents the model behind the search form about `common\models\ZyArtsets`.
 */
class ArtsetsSearch extends ZyArtsets
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['art_id', 'designer_id', 'design_cost', 'total_cost', 'sort', 'complete_time', 'create_time', 'update_time'], 'integer'],
            [['image_ids', 'video_ids', 'topic', 'brief', 'art_path', 'location', 'city', 'address', 'remark'], 'safe'],
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
        $query = ZyArtsets::find();

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
            'art_id' => $this->art_id,
            'designer_id' => $this->designer_id,
            'design_cost' => $this->design_cost,
            'total_cost' => $this->total_cost,
            'sort' => $this->sort,
            'complete_time' => $this->complete_time,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'image_ids', $this->image_ids])
            ->andFilterWhere(['like', 'video_ids', $this->video_ids])
            ->andFilterWhere(['like', 'topic', $this->topic])
            ->andFilterWhere(['like', 'brief', $this->brief])
            ->andFilterWhere(['like', 'art_path', $this->art_path])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
