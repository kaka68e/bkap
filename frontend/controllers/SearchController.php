<?php

namespace frontend\controllers;

use Yii;
use backend\models\Product;

class SearchController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$string = Yii::$app->request->get('string');
    	if ($string) {
    		$products = Product::find()->where(['like','product_name',$string])->all();
    	}
        return $this->render('index',['products'=>$products]);

    }

}
