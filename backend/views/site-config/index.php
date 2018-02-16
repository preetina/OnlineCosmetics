<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SiteConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Site Configs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-config-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Site Config', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'name',
            'image',
            'phone',
            'email:email',
            'googlemap',
            'facebook:ntext',
            'delivery_charge',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
