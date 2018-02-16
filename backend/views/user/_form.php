<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\component\Helper;

/* @var $this yii\web\View */
/* @var $model common\models\user */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>
<div class="box-body">
<?php echo $form->errorSummary($model);?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
     <?= $form->field($model, 'dob')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gender')->dropDownList(Helper::$gender,['prompt'=>'Select Gender']) ?>
    




    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput() ?>

    

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'status')->dropDownList(Helper::$status,['prompt'=>'Select Status Type']) ?>

    

    <?= $form->field($model, 'type')->dropDownList([0=>'User',1=>'Admin']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>


