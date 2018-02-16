<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\UserOrder;
use common\component\Helper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->context->layout='/account-layout';

$this->title = 'User Orders';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1>My Order</h1>
       
   <section class="content">

  
    

     <?=GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'product_id',
            //'user_id',
            
            //'updated_at',
            // 'created_by',
            // 'updated_by',
             'total_amount',
             'note:ntext',

            // 'subtotal',
            // 'discount_amount',
            // 'delivery',
           [
             'attribute'=>'status',
             'value'=>function($model){
             return Helper::$order[$model->status];
             }
             ],
            'created_at:datetime',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>"{view}"],
        ],
    ]); 
     ?>
 </section>
