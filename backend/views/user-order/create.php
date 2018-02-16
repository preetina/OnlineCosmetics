<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserOrder */

$this->title = 'Create User Order';
$this->params['breadcrumbs'][] = ['label' => 'User Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
	
<div class="box box-primary">
    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</section>
