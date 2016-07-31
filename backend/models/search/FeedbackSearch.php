<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ZyFeedback;

/**
 * FeedbackSearch represents the model behind the search form about `common\models\ZyFeedback`.
 */
class FeedbackSearch extends ZyFeedback
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feedback_id', 'user_id'], 'integer'],
            [['feedback', 'create_time'], 'safe'],
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
        $query = ZyFeedback::find();

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
            'feedback_id' => $this->feedback_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'feedback', $this->feedback])
            ->andFilterWhere(['like', 'create_time', $this->create_time]);

        return $dataProvider;
    }
}
