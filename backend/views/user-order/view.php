<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\component\Helper;
use common\models\OrderItemSearch;
use yii\grid\GridView;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model common\models\UserOrder */

$this->title = 'Order Id #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <section class="col-lg-6 connectedSortable">
        <div class="nav-tabs-custom">
            <ul class ="nav nav-tabs pull-right">
                <li class="pull-left header"><i class="fa fa-shopping-cart"></i>Order info</li>
            </ul>

            <div class ="tab-content no-padding">
              
                <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'product_id',
          //   ['attribute'=>'user_id',
          //   'value'=>function($model){
          //     return $model->user?Html::a($model->user->fullname,['user/view','id'=>$model->user->id]):'';
          //   }
          //   ,
          //   'format'=>'html'
          // ],
            'created_at:datetime',
            //'updated_at',
            // 'created_by',
            // 'updated_by',
             'total_amount',
             'total_quantity',
            // 'note:ntext',
            // 'subtotal',
            'discount_amount',
            // 'delivery',
            [
             'attribute'=>'status',
             'format'=>'html',
             'value'=>function($model){
             return Helper::getColouredStatus($model);
             }
             ],
             

            
        ],
    ]) ?>
     
        </div>

    </section>
    <section class="col-lg-6 connectedSortable">
        <div class="nav-tabs-custom">
            <ul class ="nav nav-tabs pull-right">
                <li class="pull-left header"><i class="fa fa-user"></i>Customer info</li>
            </ul>

            <div class ="tab-content no-padding">
                <?= DetailView::widget([
        'model' => $model->user,
        'attributes' => [
             //'id',
             ['attribute'=>'username',
            'value'=>function($model){
              return Html::a($model->username,['user/view','id'=>$model->id]);
            }
            ,
            'format'=>'html'
          ],
            'fullName',
            
            [
            'attribute'=>'gender',
            'value'=>function($model){
            return Helper::$gender[$model->gender];
                }
            ],
            //'dob',
            'address',
           'Contact',
            //'mobile',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
        ],
    ]) ?>

        </div>

    </section>
</div>
<div class="user-order-view">

    

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
    <?php 
     $searchModel = new OrderItemSearch();
     $searchModel->user_order_id=$model->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    ?>
     <div class="box box-primary">
        <section class="content">
        <h3>Product List</h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            //'id',
            //'user_order_id',
            ['attribute'=>'Product',
            'value'=>function($model){
                return $model->product->name;
            }],

             [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img('uploads/product/' . $data->product->image,
                        ['width' => '60px']);
                },
            ],
            //'user_id',
            'price',
            // 'discount',
             'quantity',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </section>
</div>
