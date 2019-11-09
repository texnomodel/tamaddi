<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SClient */

$this->title = 'Create S Client';
$this->params['breadcrumbs'][] = ['label' => 'S Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sclient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
