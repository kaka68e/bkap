<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Categorypost;

/**
 * CategorypostSearch represents the model behind the search form about `backend\models\Categorypost`.
 */
class CategorypostSearch extends Categorypost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categorypost_id', 'parent_id', 'order_by', 'status', 'created_at', 'updated_at'], 'integer'],
            [['categorypost_name', 'categorypost_slug', 'image', 'description', 'meta_keyword', 'meta_description'], 'safe'],
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
        $query = Categorypost::find();

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
            'categorypost_id' => $this->categorypost_id,
            'parent_id' => $this->parent_id,
            'order_by' => $this->order_by,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'categorypost_name', $this->categorypost_name])
            ->andFilterWhere(['like', 'categorypost_slug', $this->categorypost_slug])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'meta_keyword', $this->meta_keyword])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description]);

        return $dataProvider;
    }
}
