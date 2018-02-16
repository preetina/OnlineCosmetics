<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\user */
$this->context->layout='/account-layout';
$this->title = 'Update User: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="box box-primary">
<div class="user-update">
	<!-- <div class="box-header with-border">
              <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
           -->

   <!-- <h1>?= Html::encode($this->title) ?></h1> -->
 
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
