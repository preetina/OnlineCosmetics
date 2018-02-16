<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\component\Helper;


/* @var $this yii\web\View */
/* @var $model common\models\product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">

    <!-- <div class="box-header with-border">
              <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div> -->
            <section class="content">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'stock_count',
            'price',
            'short_detail',
            [
            'attribute'=>'detail',
            'format'=>'raw',
            
                
            ],
          
            //'image',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img('uploads/product/' . $data['image'],
                        ['width' => '60px']);
                },
            ],
            'discount',
             [
            'attribute'=>'discount_type',
            'value'=>function($model){
            return Helper::$discount_type[$model->discount_type];
                }
            ],
            [
            'attribute'=>'brand_id',
            'value'=>function($model){
                return $model->brand->name;
            }
            ],
            
            [
            'attribute'=>'city_id',
            'value'=>function($model){
                return $model->city->name;
            }
            ],
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
            [
                'attribute'=>'created_at',
                'value'=>function($model){
                    return Helper::getDate($model->created_at);
                }
            ],
            
            [
                'attribute'=>'update_at',
                'value'=>function($model){
                    return Helper::getDate($model->update_at);
                }
            ],
            'created_by',
            'updated_by',
            [
            'attribute'=>'status',
            'value'=>function($model){
            return Helper::$status[$model->status];
                }
            ],

            'slug',
            
            'alt_name',
        ],
    ]) ?>
    </section>

</div>
