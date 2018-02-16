<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Report;

/**
 * Site controller
 */
class SiteController extends Controller
{
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
                   // 'logout' => ['post'],
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model= new Report();
        //$result=$model->getTotalOrder();
        $arrayReport=[
        'totalOrder'=>$model->getTotalOrder(),
        'totalEarning'=>$model->getTotalEarning(),
        'totalProduct'=>$model->getTotalProduct(),
        'totalUser'=>$model->getTotalUser(),
        'maleUser'=>$model->getMaleUsers(),
        'femaleUser'=>$model->getFemaleUsers(),
        'canceledOrders'=>$model->getTotalCanceledOrders(),
        'confirmedOrders'=>$model->getTotalConfirmedOrders(),
        'latestUsers'=>$model->getLatestUsers(),
        'latestOrder'=>$model->getLatestOrder(),
        ];
        // echo "<pre>";
        // print_r($arrayReport);

        // exit;
        return $this->render('index',['arrayReport'=>$arrayReport]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()

    {
        $this->layout ='adminlogin';
        


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
}
