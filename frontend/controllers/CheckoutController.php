<?php

namespace frontend\controllers;
use Yii;
use frontend\components\Cart;
use backend\models\Order;


class CheckoutController extends \yii\web\Controller
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
		$cart1 = new Cart();
		$totalCost = $cart1->getSumCost();
		$model = new Order();
        return $this->render('index',[
        	'cart' => $cart,
        	'model' => $model,
        	'totalCost' => $totalCost
        ]);
    }

    public function actionCreate()
    {
    	$model = new Order();
    	$model->status = '1';
        date_default_timezone_set('Asia/Vientiane');
        $model->created_at = time();
        $model->date_buy_created = date('Y-m-d');
        $model->date_buy_updated = date('Y-m-d');

    	if ($model->load(Yii::$app->request->post())) {
            $email = Yii::$app->request->post()['Order']['email'];

    		if ($model->save()) {
    			$lastInsertID = Yii::$app->db->getLastInsertID();

                if ($model->addOrderItem($lastInsertID)) {

                    $session = Yii::$app->session;
                    $giohang = $session['cart'];
                    $session['giohang'] = $giohang;
                    $session['lastInsertID'] = $lastInsertID;

                   // Yii::$app->mail->compose()
                   //  ->setFrom('ph1604l@gmail.com')
                   //  ->setTo($email)
                   //  ->setSubject('Thông tin đơn hàng' )
                   //  ->setHtmlBody($body)
                   //  ->send();

                    Yii::$app
                    ->mailer
                    ->compose(
                        ['html' => 'orders-email-tempate-html'],
                        ['giohang' => $giohang,'model'=>$model]
                    )
                    ->setFrom('ph1604l@gmail.com')
                    ->setTo($email)
                    ->setSubject('Thông tin đơn hàng')
                    ->send();

                    $cart1 = new Cart();
                    $cart1->removeAll();
                    return $this->redirect(['checkout/message']);
                }
    		}
    	}
    }

    public function actionMessage()
    {
        $session = Yii::$app->session;;
        if (isset($session['giohang'])) {
            $giohang = $session['giohang'];
        }
        if (isset($session['lastInsertID'])) {
            $lastInsertID = $session['lastInsertID'];
        }

         if (isset($lastInsertID)) {
            return $this->render('message',[
                 'giohang'=>$giohang,
                 'lastInsertID'=>$lastInsertID
        ]);
        }
        return $this->render('message');
    }

}
