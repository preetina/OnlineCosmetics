<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>Dashboard</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

    <div class="social-auth-links text-center">
      
    </div>
    <!-- /.sosscial-auth-links -->

    <a href="<?=Yii::$app->urlManager->createUrl('user/reset-password');?>">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
</section>