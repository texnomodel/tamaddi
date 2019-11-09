<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PlSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bank_id') ?>

    <?= $form->field($model, 'kod') ?>

    <?= $form->field($model, 'n_pl') ?>

    <?= $form->field($model, 'n_dok') ?>

    <?php // echo $form->field($model, 'd_pl') ?>

    <?php // echo $form->field($model, 'rssvoy') ?>

    <?php // echo $form->field($model, 'rs') ?>

    <?php // echo $form->field($model, 'vo') ?>

    <?php // echo $form->field($model, 'nn') ?>

    <?php // echo $form->field($model, 'client') ?>

    <?php // echo $form->field($model, 'client_id') ?>

    <?php // echo $form->field($model, 'sena_pl') ?>

    <?php // echo $form->field($model, 'saldo') ?>

    <?php // echo $form->field($model, 'ost_pl') ?>

    <?php // echo $form->field($model, 'vid') ?>

    <?php // echo $form->field($model, 's1') ?>

    <?php // echo $form->field($model, 'ter') ?>

    <?php // echo $form->field($model, 'pot1') ?>

    <?php // echo $form->field($model, 'pot2') ?>

    <?php // echo $form->field($model, 'sf') ?>

    <?php // echo $form->field($model, 'sf_pot') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'changedate') ?>

    <?php // echo $form->field($model, 'stos') ?>

    <?php // echo $form->field($model, 'del_flag') ?>

    <?php // echo $form->field($model, 'prim') ?>

    <?php // echo $form->field($model, 'statrashod') ?>

    <?php // echo $form->field($model, 'diler_id') ?>

    <?php // echo $form->field($model, 'h_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
