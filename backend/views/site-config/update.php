<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SiteConfig */

$this->title = 'Update Site Config: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Site Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="site-config-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
