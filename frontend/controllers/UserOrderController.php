<?php

namespace frontend\controllers;

use Yii;
use common\models\UserOrder;
use common\models\UserOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserOrderController implements the CRUD actions for UserOrder model.
 */
class UserOrderController extends Controller
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
     * Lists all UserOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserOrderSearch();
        if(isset($_GET['status']) && $_GET['status']=='completed')
            $searchModel->status=1;
        $searchModel->user_id=Yii::$app->user->id;
         if(isset($_GET['status']) && $_GET['status']=='pending')
            $searchModel->status=0;
         if(isset($_GET['status']) && $_GET['status']=='cancel')
            $searchModel->status=2;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserOrder model.
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
     * Creates a new UserOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    
    protected function findModel($id)
    {
        if (($model = UserOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
