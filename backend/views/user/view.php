<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\component\Helper;

use common\models\UserOrderSearch;


/* @var $this yii\web\View */
/* @var $model common\models\user */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">



<div class="box-header with-border">
   <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
   </div>
<section class="content">
    <!-- <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            //'auth_key',
            // 'password_hash',
            //'password_reset_token',
            'email:email',
             [
             'attribute'=>'status',
             'value'=>function($model){
             return Helper::$status[$model->status];
             }
             ],
            //'created_at',
         //     ['attribute'=>'created_at',
         //     'value'=>function($model){
         //     return Helper::getDate($model->created_at);
         // }
         // ],
            //'updated_at',
            ['attribute'=>'updated_at',
            'value'=>function($model){
                return Helper::getDate($model->updated_at);
            }
            ],
            [
                'attribute'=>'image',
                'format'=>'html',
                'value'=>function($data){
                    return Html::img('uploads/user/' . $data['image'],
                        ['width'=>'60px']);
                    },
                ],
            // 'firstname',
            // 'lastname',
                'fullName',
            'address',
            // 'phone',
            // 'mobile',
            'contact',
             [
             'attribute'=>'type',
             'value'=>function($model){
             return Helper::$type[$model->type];
             }
             ],
        ],
    ]) ?>
</section>
</div>
  <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li><a href="#canceled-order" data-toggle="tab">Cancelled</a></li>
              <li><a href="#pending-order" data-toggle="tab">Pending</a></li>
              <li  class="active"><a href="#completed-order" data-toggle="tab">Completed</a></li>
              <li class="pull-left header"><i class="fa fa-shopping-bag"></i> Product Lists</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
             
              <div class="chart tab-pane active"  id="completed-order" >
                <?php 
                    $searchModel = new UserOrderSearch();
                    $searchModel->user_id=$model->id;
                    $searchModel->status = 1;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    echo $this->render('grid',['dataProvider'=>$dataProvider]);
                 ?>

                  
              </div>
              <div class="chart tab-pane" id="pending-order" >
                  <?php 
                    $searchModel = new UserOrderSearch();
                    $searchModel->user_id=$model->id;
                    $searchModel->status = 0;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    echo $this->render('grid',['dataProvider'=>$dataProvider]);
                 ?>

                  
              </div>
              <div class="chart tab-pane" id="canceled-order" >
                <?php 
                    $searchModel = new UserOrderSearch();
                    $searchModel->user_id=$model->id;
                    $searchModel->status = 2;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    echo $this->render('grid',['dataProvider'=>$dataProvider]);
                 ?>

              </div>
            </div>
          </div>