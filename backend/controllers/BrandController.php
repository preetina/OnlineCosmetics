<?php

namespace backend\controllers;

use Yii;
use common\models\brand;
use common\models\BrandSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BrandController implements the CRUD actions for brand model.
 */
class BrandController extends Controller
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
                        'actions' => ['update', 'index','create','delete','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all brand models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BrandSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single brand model.
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
     * Creates a new brand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new brand();
		
		/*
		if(isset($_POST) && !empty($_POST['submit'])){
			$firstName = $_POST['first_name'];
			
			
		}
		
		or 
		$model->load(Yii::$app->request->post())
		
		
		echo '<pre>';
		print_r(Yii::$app->request->post());
		print_r($_POST);
		echo '</pre>';
		echo 'I am here';
		
		$model->attributes = $_POST['Brand'];
		
		model->save() // validate + save = insert 
		exit;
		*/
        if ($model->load(Yii::$app->request->post()) && $model->saveImage()) {
             if($model->save())
            return $this->redirect(['index', 'id' => $model->id]);
        } 
            return $this->render('create', [
                'model' => $model,
            ]);
    
    }

    /**
     * Updates an existing brand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		/*echo '<pre>';
		
		
		print_r($model->attributes);
		echo '</pre>';
		*/

        if ($model->load(Yii::$app->request->post()) && $model->saveImage()) {
            if($model->save())

            return $this->redirect(['index', 'id' => $model->id]);
        } 
            return $this->render('update', [
                'model' => $model,
            ]);
        
    }

    /**
     * Deletes an existing brand model.
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
     * Finds the brand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return brand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = brand::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
