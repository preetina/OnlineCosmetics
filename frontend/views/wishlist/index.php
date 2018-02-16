<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WishlistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->context->layout='/account-layout';
$this->title = 'Wishlist';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wishlist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            //'product_id',
            [
            'attribute'=>'product',
            'value'=>function($model){
            //return $model->product?$model->product->name:'';
            return $model->product? Html::a($model->product->name,['product/view','id'=>$model->product->id]):'';
                },
                'format'=>'html'
            ],
            [
            'attribute'=>'price',
            'value'=>function($model){
            return $model->product?$model->product->price:'';
                }
            ],
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(Yii::$app->urlManagerBackend->baseUrl.'/product/' . $data->product->image,
                        ['width' => '60px']);
                },
            ],
           


           ['class' => 'yii\grid\ActionColumn',
             'template'=>"{delete}",
         ],

        ],

    ]); ?>
    
</div>
