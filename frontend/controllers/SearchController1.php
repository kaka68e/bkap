<?php


namespace frontend\controllers;
use backend\models\Product;

class SearchController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(\Yii::$app->request->get('string')){
			$string = \Yii::$app->request->get('string');

			$products = Product::find()->where(['like','product_name',$string])->all();

			return $this->render('index',['products'=>$products]);
		}
    }

}
