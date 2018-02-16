<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\component\Helper;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">


   <section class="content">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Order', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?php Pjax::begin(['id' => 'order-grid']) ?>
    <?= GridView::widget([
      
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'product_id',
            ['attribute'=>'user_id',
            'value'=>function($model){
              return $model->user?Html::a($model->user->fullname,['user/view','id'=>$model->user->id]):'';
            }
            ,
            'format'=>'html'
          ],
            'created_at:datetime',
            //'updated_at',
            // 'created_by',
            // 'updated_by',
             'total_amount',
             'total_quantity',
            // 'note:ntext',
            // 'subtotal',
            // 'discount_amount',
            // 'delivery',
            [
             'attribute'=>'status',
             'format'=>'html',
             'value'=>function($model){
             return Helper::getColouredStatus($model);
             }
             ],
            ['class' => 'yii\grid\ActionColumn',
            'template'=>"{view}{confirmBtn}",
            'buttons' => [
            'confirmBtn' => function ($url, $model, $key) {
                $url=Yii::$app->urlManager->createUrl(['user-order/confirm-order','id'=>$model->id]);
                // $confirmBtn = 'confirm btn';
                // $cancelBtn = 'cancel btn';
                // $pendingBtn = 'pending button';
                if($model->status==0){
                    return Html::a('<span class="glyphicon glyphicon-saved"></span>', '#',['class'=>'confirm_order','data-statusurl'=>$url,'data-status'=>1]).Html::a('<span class="glyphicon glyphicon-remove"></span>', '#',['class'=>'confirm_order','data-statusurl'=>$url,'data-status'=>2]);

                }else if($model->status==1){
                    return Html::a('<span class="glyphicon glyphicon-question-sign"></span>', '#',['class'=>'confirm_order','data-statusurl'=>$url,'data-status'=>0]).Html::a('<span class="glyphicon glyphicon-remove"></span>', '#',['class'=>'confirm_order','data-statusurl'=>$url,'data-status'=>2]);
                }else{
                   return Html::a('<span class="glyphicon glyphicon-question-sign"></span>', '#',['class'=>'confirm_order','data-statusurl'=>$url,'data-status'=>0]).Html::a('<span class="glyphicon glyphicon-saved"></span>', '#',['class'=>'confirm_order','data-statusurl'=>$url,'data-status'=>1]);
                }
            //     return $model->status==0?$confirmBtn.$cancelBtn:'';
            // return $model->status==0?Html::a('Confirm Order', '#',['class'=>'confirm_order','data-statusurl'=>$url]):'';
            },
]],
        ],
    ]); ?>
    <?php Pjax::end() ?>
    </section>
</div>

<?php 
$js =<<<JS
 
              $("body").on("click",'.confirm_order',function(ev){
                ev.preventDefault();
                var obj = $(this);
                 $.ajax({
                    method:"POST",

                    url: obj.data("statusurl"),
                    data:{status:obj.data("status")},
                    dataType:'json',
                    success:function(res){
                      if(res.success==1){
                         $.pjax.reload({container:"#order-grid"}); 
                        
                      
                      }else{
                        alert(" Error on confirming order. Please try again later");
                      }

                    }

                    
                })


              })

             
JS;
$this->registerJS($js);
?>

