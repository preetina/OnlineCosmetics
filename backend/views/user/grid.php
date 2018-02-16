 <?php
 use yii\grid\GridView;
 use yii\Helpers\Html;
 use common\component\Helper;
 ?>
 <?=GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             'id',
            //'product_id',
           
            [
            'attribute'=>'Price',
            'value'=>function($model){
            return $model->total_amount;
                }
            ],

            'created_at:datetime',
            [
             'attribute'=>'status',
             'format'=>'html',
             'value'=>function($model){
             return Helper::getColouredStatus($model);
             }
             ],
           [
            'class' => 'yii\grid\ActionColumn',
            'template'=>'{view}',
            'buttons'=>[

                'view'=>function($url,$model,$key){
                    $url = Yii::$app->urlManager->createUrl(['user-order/view','id'=>$model->id]);
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url);
                }
            ]

            ],
            
        ],
    ]); 
     ?>