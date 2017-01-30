<?php

namespace frontend\controllers;
use backend\models\Product;
use backend\models\Category;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    // public function actionListproduct($slug)
    // {
    //     // $this->layout = "main2";
    //     // $product = new Product();
    //     // $category = new Category();
    //     $category = Category::findOne(['category_slug'=>$slug]);
    //     $productByIdCategory = Product::find()->where(['id_category'=>$category->category_id])->asArray()->all();

    //     // $productByIdCategory = $product->getProductByIdCategory($id);
    //     // $category_name = $category->getCategoryNameByCategoryID($id);
    //     return $this->render('listproduct',[
    //         'productByIdCategory' => $productByIdCategory,
    //         'category_name' => $category->category_name,
    //     ]);
    // }

    public function actionListproduct($slug)
    {

        $category = Category::findOne(['category_slug'=>$slug]);

        if ($category->parent_id == '0') {
            $category_child = Category::find()->where(['status'=>1,'parent_id'=>$category->category_id])->asArray()->all();
            $productByIdCategory = [];
            foreach ($category_child as $item) {
                $data = Product::find()->where(['id_category'=>$item['category_id'],'status'=>1])->asArray()->all();
                foreach ($data as $item2) {
                    array_push($productByIdCategory,$item2);
                }
            }
        }else {
            $productByIdCategory = Product::find()->where(['id_category'=>$category->category_id,'status'=>1])->asArray()->all();
        }

    	return $this->render('listproduct',[
    		'productByIdCategory' => $productByIdCategory,
            'category_name' => $category->category_name,
    	]);
    }

    public function actionDetail($slug)
    {
        $this->layout = 'main2';

        // lấy ra chi tiết sản phẩm đấy
        $productDetail = Product::find()->where(['product_slug'=>$slug,'status'=>1])->asArray()->all();
        // Lấy ra dc danh mục của sản phẩm đấy thuộc loại nào
        $category2 = Category::findOne(['category_id'=>$productDetail[0]['id_category']]);
        $random6ProductByCategory = Product::find()->asArray()->orderBy(['rand()' => SORT_DESC])->limit(6)->all();
        return $this->render('detail',[
            'productDetail' => $productDetail,
            'category_name1' => $category2->category_name,
            'random6ProductByCategory' => $random6ProductByCategory
        ]);
    }

}
