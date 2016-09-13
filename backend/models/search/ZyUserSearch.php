<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ZyUser;

/**
 * ZyUserSearch represents the model behind the search form about `common\models\ZyUser`.
 */
class ZyUserSearch extends ZyUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'project_id', 'style_id', 'status', 'sex', 'create_time', 'update_time'], 'integer'],
            [['favored_designer_ids', 'name', 'openid', 'nickname', 'phone', 'email', 'profession', 'city', 'language', 'country', 'headimgurl', 'unionid', 'privilege', 'address'], 'safe'],
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
        $query = ZyUser::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query->orderBy(' user_id desc '),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'project_id' => $this->project_id,
            'style_id' => $this->style_id,
            'status' => $this->status,
            'sex' => $this->sex,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'favored_designer_ids', $this->favored_designer_ids])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'openid', $this->openid])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'profession', $this->profession])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'headimgurl', $this->headimgurl])
            ->andFilterWhere(['like', 'unionid', $this->unionid])
            ->andFilterWhere(['like', 'privilege', $this->privilege])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
