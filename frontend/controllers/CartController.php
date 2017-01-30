<?php

namespace frontend\controllers;

use Yii;
use frontend\components\Cart;
use backend\models\Product;

class CartController extends \yii\web\Controller
{

	public function beforeAction($action)
	{
	    $this->layout = 'main2';
	    return parent::beforeAction($action);
	}
    public function actionIndex()
    {
    	$session = Yii::$app->session;
		$cart = $session['cart'];
		$model = new Cart();
		$totalCost = $model->getSumCost();
        return $this->render('index',[
        	'cart' => $cart,
        	'totalCost' => $totalCost
        ]);
    }

    public function actionAddCart($id)
    {
    	$data = Product::find()->where(['product_id' => $id, 'status' => '1'])->one();
    	$cart = new Cart();
        if ($data->quantity > 0) {
            $cart->add($data);
            echo 'ok-'.$cart->getTotalItem();
        } else {
            echo 'not';
        }
    	
    	//return $this->redirect(['/cart']);
    }

    public function actionRemoveCart($id)
    {
    	$cart = new Cart();
    	$cart->remove($id);
    	return $this->redirect(['/cart']);
    }

    public function actionRemoveAll()
    {
    	$cart = new Cart();
    	$cart->removeAll();
    	return $this->redirect(['/cart']);
    }

    public function actionUpdateCart()
    {
    	$cart = new Cart();
    	isset($_POST['quantity_user']) ? $quantity_user = $_POST['quantity_user'] : $quantity_user = false;
    	isset($_POST['id']) ? $id = $_POST['id'] : $id = false;
        if (is_numeric($id)) {
            $data = Product::find()->where(['product_id' => $id, 'status' => '1'])->one();
            if (is_numeric($quantity_user)) {
                if ($quantity_user > $data->quantity) {
                    echo 2;
                } elseif($quantity_user <= 0) {
                    echo 0;
                } else {
                    $cart->update($id, $quantity_user);
                    echo 1;
                }
            } else{
                echo -1;
            }


           // if (is_numeric($quantity_user)) {
           //      if ($quantity_user > 0) {
           //          $cart->update($id, $quantity_user);
           //          return $this->redirect(['/cart']);
           //      } else {
           //          return $this->redirect(['/cart']);
           //      }
           //  } else{
           //      return $this->redirect(['/cart']);
           //  }
        }
    	
    	
    }

}
