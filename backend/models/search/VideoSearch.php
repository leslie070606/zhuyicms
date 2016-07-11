<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ZyVideo;

/**
 * VideoSearch represents the model behind the search form about `common\models\ZyVideo`.
 */
class VideoSearch extends ZyVideo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video_id', 'designer_id', 'create_time', 'update_time'], 'integer'],
            [['video_url', 'video_image'], 'safe'],
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
        $query = ZyVideo::find();

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
            'video_id' => $this->video_id,
            'designer_id' => $this->designer_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'video_url', $this->video_url])
            ->andFilterWhere(['like', 'video_image', $this->video_image]);

        return $dataProvider;
    }
}
