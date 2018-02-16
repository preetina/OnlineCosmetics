<?php

namespace frontend\controllers;

use Yii;
use common\models\user;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\ChangePass;
use common\models\ResetPasswordForm;


/*
 * UserController implements the CRUD actions for user model.
 */
class UserController extends Controller
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
                        'actions' => ['update', 'index','create','delete','view','change-password','reset-password','account'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['reset-password'],
                        'allow' => true,
                        //'roles' => ['@'],
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
     * Displays a single user model.
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
     * Creates a new user model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new user();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing user model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $id=Yii::$app->user->id;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

        /**
     * Finds the user model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return user the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = user::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAccount($id){

        $model = $this->findModel(Yii::$app->user->id);
        return $this->render('account',['model'=>$model]);

    }


    public function actionChangePassword(){
        $model = new ChangePass();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $userModel = $this->findModel(Yii::$app->user->id); // find by user login id, user id Yii::$app->user->id;
                $userModel->setPassword($model->confirm_password); // $userModel->password_hash = emcpted(new_password);
                $userModel->save(false); // update user model with out validation false = save without validation

                $this->refresh();
                Yii::$app->session->setFlash('warning', 'Your password has been changed successfully!');

          }    
          
        return $this->render('change-password',['model'=>$model]);
    }

    public function actionResetPassword()
    {

            $model = new ResetPasswordForm();


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           

             }

        return $this->render('reset-password', [
            'model' => $model,
        ]);
    }

}
