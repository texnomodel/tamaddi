<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\STovar */

$this->title = 'Update Stovar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Stovars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stovar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
