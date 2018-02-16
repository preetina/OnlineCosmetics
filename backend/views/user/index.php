<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\component\Helper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
<!-- <div class="box-header with-border"><h3 class="box-title"><?= Html::encode($this->title) ?></h3></div> -->
 <section class="content">


    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
   
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-primary']) ?>
        
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             //'id',
            'username',
            'first_name',
            'last_name',
            //'address',
            // 'phone',
            //'mobile',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            //'email:email',
             //'status',

             [
                'attribute'=>'image',
                'format'=>'html',
                'value'=>function($data){
                    return Html::img('uploads/user/' . $data['image'],
                        ['width'=>'60px']);
                    },
                ],
            [
            'attribute'=>'status',
            'value'=>function($model){
            return Helper::$status[$model->status];
                }
            ],
            // 'created_at',
            // 'updated_at',
            [
            'attribute'=>'type',
            'value'=>function($model){
            return Helper::$type[$model->type];
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</section>

</div>
