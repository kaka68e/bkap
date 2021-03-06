<?php

namespace backend\controllers;

use Yii;
use backend\models\Orderitem;
use backend\models\search\OrderitemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderitemController implements the CRUD actions for Orderitem model.
 */
class OrderitemController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Orderitem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderitemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orderitem model.
     * @param integer $id_order
     * @param integer $id_product
     * @return mixed
     */
    public function actionView($id_order, $id_product)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_order, $id_product),
        ]);
    }

    /**
     * Creates a new Orderitem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orderitem();
        $time = time();
        $model->created_at = $time;
        $model->updated_at = $time;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_order' => $model->id_order, 'id_product' => $model->id_product]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Orderitem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_order
     * @param integer $id_product
     * @return mixed
     */
    public function actionUpdate($id_order, $id_product)
    {
        $model = $this->findModel($id_order, $id_product);
        $time = time();
        $model->updated_at = $time;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_order' => $model->id_order, 'id_product' => $model->id_product]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Orderitem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_order
     * @param integer $id_product
     * @return mixed
     */
    public function actionDelete($id_order, $id_product)
    {
        $this->findModel($id_order, $id_product)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orderitem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_order
     * @param integer $id_product
     * @return Orderitem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_order, $id_product)
    {
        if (($model = Orderitem::findOne(['id_order' => $id_order, 'id_product' => $id_product])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
