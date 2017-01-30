<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Order;

/**
 * Site controller
 */
class SiteController extends Controller
{

    // public function beforeAction($action)
    // {
    //     $this->layout = 'login';
    //     return parent::beforeAction($action);
    // }
    /**
     * @inheritdoc
     */
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
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
        if ($action->id == 'error')
            $this->layout = 'error1.php';

        return parent::beforeAction($action);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $now = date('Y');



        $count1 = Order::find()
        ->where(['status' => 3])
        ->andWhere(['>=','date_buy_updated',''.$now.'-01-1'])
        ->andWhere(['<=','date_buy_updated',''.$now.'-01-31'])
        ->count();

        $count3 = Order::find()
        ->where(['status' => 3])
        ->andWhere(['>=','date_buy_updated',''.$now.'-03-1'])
        ->andWhere(['<=','date_buy_updated',''.$now.'-03-31'])
        ->count();

        $count5 = Order::find()
        ->where(['status' => 3])
        ->andWhere(['>=','date_buy_updated',''.$now.'-05-1'])
        ->andWhere(['<=','date_buy_updated',''.$now.'-05-31'])
        ->count();

        $count7 = Order::find()
        ->where(['status' => 3])
        ->andWhere(['>=','date_buy_updated',''.$now.'-07-1'])
        ->andWhere(['<=','date_buy_updated',''.$now.'-07-31'])
        ->count();

        $count8 = Order::find()
        ->where(['status' => 3])
        ->andWhere(['>=','date_buy_updated',''.$now.'-08-1'])
        ->andWhere(['<=','date_buy_updated',''.$now.'-08-31'])
        ->count();

         $count10 = Order::find()
        ->where(['status' => 3])
        ->andWhere(['>=','date_buy_updated',''.$now.'-10-1'])
        ->andWhere(['<=','date_buy_updated',''.$now.'-10-31'])
        ->count();

        $count12 = Order::find()
        ->where(['status' => 3])
        ->andWhere(['>=','date_buy_updated',''.$now.'-12-1'])
        ->andWhere(['<=','date_buy_updated',''.$now.'-12-31'])
        ->count();

        $count4 = Order::find()
        ->where(['status' => 3])
        ->andWhere(['>=','date_buy_updated',''.$now.'-04-1'])
        ->andWhere(['<=','date_buy_updated',''.$now.'-04-30'])
        ->count();

        $count6 = Order::find()
        ->where(['status' => 3])
        ->andWhere(['>=','date_buy_updated',''.$now.'-06-1'])
        ->andWhere(['<=','date_buy_updated',''.$now.'-06-30'])
        ->count();

        $count9 = Order::find()
        ->where(['status' => 3])
        ->andWhere(['>=','date_buy_updated',''.$now.'-09-1'])
        ->andWhere(['<=','date_buy_updated',''.$now.'-09-30'])
        ->count();


        $count11 = Order::find()
        ->where(['status' => 3])
        ->andWhere(['>=','date_buy_updated',''.$now.'-11-1'])
        ->andWhere(['<=','date_buy_updated',''.$now.'-11-30'])
        ->count();

        $count2 = Order::find()
        ->where(['status' => 3])
        ->andWhere(['>=','date_buy_updated',''.$now.'-02-1'])
        ->andWhere(['<=','date_buy_updated',''.$now.'-02-29'])
        ->count();







        return $this->render('index',[
            'count1' => $count1,
            'count2' => $count2,
            'count3' => $count3,
            'count4' => $count4,
            'count5' => $count5,
            'count6' => $count6,
            'count7' => $count7,
            'count8' => $count8,
            'count9' => $count9,
            'count10' => $count10,
            'count11' => $count11,
            'count12' => $count12,
            'now' => $now
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
