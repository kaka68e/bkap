<?php

namespace frontend\controllers;
use Yii;
use backend\models\Wishlist;
use backend\models\Order;
use backend\models\Orderitem;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

use yii\data\Pagination;
use yii\widgets\LinkPager;

class ClientController extends \yii\web\Controller
{

     public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index','wishlist','order','info','detail'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

	public function beforeAction($action)
	{
	    $this->layout = 'main-client';
	    return parent::beforeAction($action);
	}

    public function actionIndex()
    {
        $order = Order::find()->where(['id_customer'=>Yii::$app->user->identity->customer_id])->limit(2)->asArray()->orderBy(['order_id'=>SORT_DESC])->all();
        return $this->render('index',[
            'order' => $order
        ]);
    }

    public function actionWishlist()
    {

        $data = Wishlist::find()->where(['id_customer'=>Yii::$app->user->identity->customer_id])->asArray()->all();
    	return $this->render('wishlist',[
            'data' => $data
        ]);
    }

    public function actionOrder()
    {
        $page = $this->getPager();
        $order = Order::find()
        ->where(['id_customer'=>Yii::$app->user->identity->customer_id])
        ->asArray()->orderBy(['order_id'=>SORT_DESC])
        ->offset($page->offset)
        ->limit($page->limit)
        ->all();
        

        return $this->render('order',[
            'order' => $order,
            'page' => $page
        ]);
    }

    public function actionDetail($order_id)
    {   
        $order = Order::find()->where(['order_id'=>$order_id])->asArray()->one();
        // echo '<pre>';
        // var_dump($order['request']);die();

         $data = Orderitem::find()
         ->where(['id_order'=>$order_id])
         ->asArray()->all();
         return $this->render('detail',[
            'data' => $data,
            'id_order'=>$order_id,
            'request' => $order['request']
        ]);
    }

    function getPager()
    {
        $order = Order::find()->where(['id_customer'=>Yii::$app->user->identity->customer_id])->asArray()->orderBy(['order_id'=>SORT_DESC])->all();
        $page = new Pagination(['totalCount' => count($order), 'pageSize'=>10]);
        return $page;
    }

    public function actionInfo()
    {
        return $this->render('info');
    }

}
