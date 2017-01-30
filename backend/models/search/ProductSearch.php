<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Product;
use backend\models\Category;

/**
 * ProductSearch represents the model behind the search form about `backend\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'price_push_up', 'price_real', 'quantity', 'id_category', 'status', 'created_at', 'updated_at'], 'integer'],
            [['product_name', 'product_slug', 'image', 'start_sale', 'end_sale', 'id_supplier', 'meta_keyword', 'meta_description', 'tags'], 'safe'],
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
        $productId =[];


        $query = Product::find()->orderBy(['product_id'=>SORT_DESC]);

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
         $childrent = Category::find()->where(['parent_id'=>$this->id_category])->all();
        if ($childrent) {
            foreach ($childrent as $cr) {
                $products = Product::find()->where(['id_category'=>$cr->category_id])->all();
                if ($products) {
                   foreach ($products as $pro)
                    $productId[] = $pro->product_id;
                }
            }
        }
        // grid filtering conditions
        if ($productId) {
             $query->andFilterWhere(['product_id'=>$productId]);
        }else{
             $query->andFilterWhere([
                'product_id'=> $this->product_id,
                'id_category'=> $this->id_category
            ]);
        }   
        $query->andFilterWhere([
            'price_push_up' => $this->price_push_up,
            'price_real' => $this->price_real,
            'quantity' => $this->quantity,
            'start_sale' => $this->start_sale,
            'end_sale' => $this->end_sale,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
       
        $query->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'product_slug', $this->product_slug])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'id_supplier', $this->id_supplier])
            ->andFilterWhere(['like', 'meta_keyword', $this->meta_keyword])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'tags', $this->tags]);

        return $dataProvider;
    }
}
