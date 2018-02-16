<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\component\Helper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <section class="content"> -->
<div class="box box-primary">
<!-- <div class="box-header with-border"><h3 class="box-title"><?= Html::encode($this->title) ?></h3></div>
 --><!-- <div class="product-index">
 -->

   <section class="content">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'name',
            'alt_name',
            'stock_count',
            'price',
            //'short_detail',
            // 'detail:ntext',
            // 'image',
            // 'discount',
            // 'discount_type',
            // 'brand_id',
            // 'city_id',
             //'category.name',
             [
            'attribute'=>'category_id',
            'value'=>function($model){
            return $model->category->name;
                }
            ],
            [
            'attribute'=>'subcategory_id',
            'value'=>function($model){
            return $model->subCategory->name;
                }
            ],
            // 'created_at',
            // 'update_at',
            // 'created_by',
            // 'updated_by',
             [
            'attribute'=>'status',
            'value'=>function($model){
            return Helper::$status[$model->status];
                }
            ],
            // 'slug',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </section>
</div>

