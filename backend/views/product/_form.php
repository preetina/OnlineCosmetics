<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Brand;
use common\models\City;
use common\models\Category;
use common\models\SubCategory;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-body">

    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->errorSummary($model);?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'id'=>'my id','required'=>true]) ?>

    <?= $form->field($model, 'stock_count')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_detail')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?> -->
    <?= $form->field($model, 'detail')->widget(TinyMce::className(), [
    'options' => ['rows' => 6],
    'language' => 'en',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
]);?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'discount_type')-> dropDownList(['Percentage','Amount'],['prompt'=>'Select Discount Type'])?>

    <?= $form->field($model, 'brand_id')->dropDownList(ArrayHelper::map(Brand::find()->all(),'id','name'),['prompt'=>'Select Brand']) ?>

    <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->all(),'id','name'),['prompt'=>'Select City']) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(),'id','name'),['prompt'=>'Select Category']) ?>
    
    <?= $form->field($model, 'subcategory_id')->dropDownList(ArrayHelper::map(SubCategory::find()->all(),'id','name'),['prompt'=>'Select SubCategory']) ?>


    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php //$form->field($model, 'update_at')->textInput() ?>

    <?php // $form->field($model, 'created_by')->textInput() ?>

    <?php // $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([0=>'Inactive',1=>'active']) ?>

    <?php // $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alt_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
