<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Wishlist;
use frontend\models\search\WishlistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WishlistController implements the CRUD actions for Wishlist model.
 */
class WishlistController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Wishlist models.
     * @return mixed
     */
    // public function actionIndex()
    // {
    //     $searchModel = new WishlistSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    /**
     * Displays a single Wishlist model.
     * @param integer $id_customer
     * @param integer $id_product
     * @return mixed
     */
    // public function actionView($id_customer, $id_product)
    // {
    //     return $this->render('view', [
    //         'model' => $this->findModel($id_customer, $id_product),
    //     ]);
    // }

    /**
     * Creates a new Wishlist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionAdd($id)
    {
        $model = new Wishlist();
        $data = $model->find()->where([
            'id_customer'=>Yii::$app->user->identity->customer_id,
            'id_product' => $id
        ])->one();
        if ($data) {
             echo 'tontai';
        } else {
            $time = time();
            $model->created_at = $time;
            $model->updated_at = $time;
            $model->status = 1;
            $model->id_customer = Yii::$app->user->identity->customer_id;   
            $model->id_product = $id;

            if ($model->save()) {
                echo 'ok';
            }
        }
        
    }

    // public function actionCreate()
    // {
    //     $model = new Wishlist();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id_customer' => $model->id_customer, 'id_product' => $model->id_product]);
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    /**
     * Updates an existing Wishlist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_customer
     * @param integer $id_product
     * @return mixed
     */
    // public function actionUpdate($id_customer, $id_product)
    // {
    //     $model = $this->findModel($id_customer, $id_product);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id_customer' => $model->id_customer, 'id_product' => $model->id_product]);
    //     } else {
    //         return $this->render('update', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    /**
     * Deletes an existing Wishlist model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_customer
     * @param integer $id_product
     * @return mixed
     */
    public function actionDelete($id_customer, $id_product)
    {
        $this->findModel($id_customer, $id_product)->delete();

        return $this->redirect(['/client/wishlist']);
    }

    /**
     * Finds the Wishlist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_customer
     * @param integer $id_product
     * @return Wishlist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_customer, $id_product)
    {
        if (($model = Wishlist::findOne(['id_customer' => $id_customer, 'id_product' => $id_product])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
