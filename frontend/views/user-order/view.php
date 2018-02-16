<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Product;
use common\models\OrderItemSearch;

/* @var $this yii\web\View */
/* @var $model common\models\OrderItem */
$this->context->layout='/account-layout';

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

            <section class="content">

   
<?php $searchModel = new OrderItemSearch();
        $searchModel->user_order_id=$model->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_order_id',
            [
            'attribute'=>'Product',
            'value'=>function($model){
            return $model->product->name;
                }
            ],

            //'user_id',
            'price',
            'quantity',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(Yii::$app->urlManagerBackend->baseUrl.'/product/' . $data->product->image,
                        ['width' => '60px']);
                },
            ],
            // 'discount',
             

     ]      
    ]); ?>
</section>
