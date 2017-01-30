<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Reviewproduct;

/**
 * ReviewproductSearch represents the model behind the search form about `backend\models\Reviewproduct`.
 */
class ReviewproductSearch extends Reviewproduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reviewproduct_id', 'id_customer', 'id_product', 'rating', 'parent_review_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['customer_name', 'customer_email', 'content'], 'safe'],
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
        $query = Reviewproduct::find();

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
            'reviewproduct_id' => $this->reviewproduct_id,
            'id_customer' => $this->id_customer,
            'id_product' => $this->id_product,
            'rating' => $this->rating,
            'parent_review_id' => $this->parent_review_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_email', $this->customer_email])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
