<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\STovar */

$this->title = 'Yangi tovar';
//$this->params['breadcrumbs'][] = ['label' => 'Stovars', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stovar-create">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
