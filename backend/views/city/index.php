<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cities';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
<!-- <div class="box-header with-border"><h3 class="box-title"><?= Html::encode($this->title) ?></h3></div> -->


    <section class="content">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create City', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
           // 'slug',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>"{update}{delete}"],
        ],
    ]); ?>
    </section>
</div>


