<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Order;

/**
 * OrderSearch represents the model behind the search form about `backend\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'id_customer', 'total', 'status', 'created_at', 'updated_at'], 'integer'],
            [['customer_name', 'mobile', 'address', 'email', 'customer_ship', 'mobile_ship', 'address_ship', 'email_ship', 'request', 'id_payment', 'id_deliver'], 'safe'],
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
        $query = Order::find();

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
            'id_customer' => $this->id_customer,
            'total' => $this->total,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'customer_ship', $this->customer_ship])
            ->andFilterWhere(['like', 'mobile_ship', $this->mobile_ship])
            ->andFilterWhere(['like', 'address_ship', $this->address_ship])
            ->andFilterWhere(['like', 'email_ship', $this->email_ship])
            ->andFilterWhere(['like', 'request', $this->request])
            ->andFilterWhere(['like', 'id_payment', $this->id_payment])
            ->andFilterWhere(['like', 'id_deliver', $this->id_deliver]);

        return $dataProvider;
    }
}
