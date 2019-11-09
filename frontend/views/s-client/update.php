<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SClient */

$this->title = 'Update S Client: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'S Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sclient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
