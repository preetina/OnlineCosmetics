<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'stock_count',
            'price',
            'short_detail',
            // 'detail:ntext',
            // 'image',
            // 'discount',
            // 'discount_type',
            // 'brand_id',
            // 'city_id',
            // 'category_id',
            // 'created_at',
            // 'update_at',
            // 'created_by',
            // 'updated_by',
            // 'status',
            // 'slug',
            // 'alt_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
