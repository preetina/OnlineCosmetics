<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'Change Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    
    <div class="row">
        <div class="col-lg-5">
             <div class="box-body change-password-ajax ">
            <?php $form = ActiveForm::begin(['id' => 'change-password']); ?>

                <?= $form->field($model, 'old_password')->passwordInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'new_password')->passwordInput() ?>

                <?= $form->field($model, 'confirm_password')->passwordInput() ?>

                <div class="form-group">
                      <?= Html::submitButton('Change Password', ['class' => 'btn btn-primary','id'=>'changepassword','data-aurl'=>Yii::$app->urlManager->createUrl('user/change-password'),'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        </div>
    </div>
</div>
