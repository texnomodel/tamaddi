<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Asos */

$this->title = 'Create Asos';
$this->params['breadcrumbs'][] = ['label' => 'Asos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
