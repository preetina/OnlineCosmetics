<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SubCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sub Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
<!-- <div class="box-header with-border"><h3 class="box-title"><?= Html::encode($this->title) ?></h3></div> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="content">

    <p>
        <?= Html::a('Create Sub Category', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
      
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
             'detail',
            [
            'attribute'=>'category_id',
            'value'=>function($model){
                if($model->category){
                   return $model->category->name; 
                }
            
                }
            ],
            //'slug',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>"{update}{delete}"],
        ],
    ]); ?>
</section>
</div>
