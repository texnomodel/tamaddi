<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pl */

$this->title = 'Create Pl';
$this->params['breadcrumbs'][] = ['label' => 'Pls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
