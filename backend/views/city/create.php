<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\city */

$this->title = 'Create City';
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
<div class="box box-primary">
<!-- <div class="box-header with-border">
              <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div> -->
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</section>