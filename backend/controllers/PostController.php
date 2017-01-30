<?php

namespace backend\controllers;

use Yii;
use backend\models\Post;
use backend\models\search\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
                        // 'actions' => ['index','wishlist','order','info','detail'],
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
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();
        $model->date_created_at = date('Y-m-d');
        $model->date_updated_at = date('Y-m-d');

        if ($model->load(Yii::$app->request->post())) {

            $urlDelete = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
            $urlDelete = str_replace('backend/web/index.php', '', $urlDelete);
            $urlImg = Yii::$app->request->post();
            $link = $urlImg['Post']['image'];
            $link = str_replace($urlDelete.'/', '', $link);
            $model->image = $link;

            if ($model->save()) {
                Yii::$app->session->addFlash('success','Thêm thành công');
                return $this->redirect(['view', 'id' => $model->post_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->date_updated_at = date('Y-m-d');

        if ($model->load(Yii::$app->request->post())) {

            $urlDelete = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
            $urlDelete = str_replace('backend/web/index.php', '', $urlDelete);
            $urlImg = Yii::$app->request->post();
            $link = $urlImg['Post']['image'];
            $link = str_replace($urlDelete.'/', '', $link);
            $model->image = $link;

            if ($model->save()) {
                Yii::$app->session->addFlash('success','Cập nhật thành công');
                return $this->redirect(['view', 'id' => $model->post_id]);
            } else {
                 return $this->render('update', [
                    'model' => $model,
                ]);
            }
            
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
