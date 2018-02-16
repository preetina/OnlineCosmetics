<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
 -->
 <div class="men">
     <div class="container">
      <div class="grid_1">
          <h1>Contact Info</h1>
          <p>Our Customer Care Team are available Sunday - Friday: 8am - 8pm. Please note that we are closed on New Years Day.Please feel free to contact us using your preferred method of communication where our team will be happy to help.</p>
      </div>
      <div class="grid_4">
      <div class="grid_2 preffix_1">
          <ul class="iphone">
            <i class="phone"> </i>
            <li class="phone_desc">Phone : +977 5555555 </li>
            <div class="clearfix"> </div>
          </ul>
          <ul class="iphone">
            <i class="flag"> </i>
            <li class="phone_desc">Website : <a href="mailto:mail@demolink.org">www.demolink.com</a></li>
            <div class="clearfix"> </div>
          </ul>
      </div>
      <div class="grid_3">
          <ul class="iphone">
            <i class="msg"> </i>
            <li class="phone_desc">Email : <a href="mailto:mail@demolink.org">mycosmetics@gmail.com</a> </li>
            <div class="clearfix"> </div>
          </ul>
          <ul class="iphone">
            <i class="home"> </i>
            <li class="phone_desc">Address :Sanepa, Lalitpur, Nepal </li>
            <div class="clearfix"> </div>
          </ul>
      </div>
      <div class="clearfix"> </div>
     </div>
     <div class="contact_form">
        
        <div class="row">
        <div class="col-lg-5">
            
             <div class="contact_form">
            <h2>Feedback</h2>

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
            </div>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
     </div>
    </div>
   </div>
   <div class="map">
       <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
   </div>