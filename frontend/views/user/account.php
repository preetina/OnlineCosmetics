<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use common\component\Helper;
use common\models\UserSearch;

$this->context->layout = '/account-layout';
$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>


<?php $searchModel = new UserSearch();
        $searchModel->id=$model->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    ?>


<?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             //'id',
            'username',
            'first_name',
            'last_name',
            'address',
             'phone',
            'mobile',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
             //'status',
            [
            'attribute'=>'status',
            'value'=>function($model){
            return Helper::$status[$model->status];
                }
            ],
            [
                'attribute'=>'created_at',
                'value'=>function($model){
                    return Helper::getDate($model->created_at);
                }
            ],
            
            
            // 
            // [
            //     'attribute'=>'updated_at',
            //     'value'=>function($model){
            //         return Helper::getDate($model->updated_at);
            //     }
            // ],
           // [
           //  'attribute'=>'type',
           //  'value'=>function($model){
           //  return Helper::$type[$model->type];
           //      }
           //  ],
            
            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>