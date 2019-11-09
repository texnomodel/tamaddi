<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\STovarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stovar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nom') ?>

    <?= $form->field($model, 'nom_ru') ?>

    <?= $form->field($model, 'nom_sh') ?>

    <?= $form->field($model, 'shtrix') ?>

    <?php // echo $form->field($model, 'shtrix_in') ?>

    <?php // echo $form->field($model, 'tz_id') ?>

    <?php // echo $form->field($model, 'kg') ?>

    <?php // echo $form->field($model, 'shtrix_full') ?>

    <?php // echo $form->field($model, 'shtrix1') ?>

    <?php // echo $form->field($model, 'shtrix2') ?>

    <?php // echo $form->field($model, 'kat') ?>

    <?php // echo $form->field($model, 'brend') ?>

    <?php // echo $form->field($model, 'qr') ?>

    <?php // echo $form->field($model, 'shtrixkod') ?>

    <?php // echo $form->field($model, 'qrkod') ?>

    <?php // echo $form->field($model, 'izm_id') ?>

    <?php // echo $form->field($model, 'kol_in') ?>

    <?php // echo $form->field($model, 'izm1') ?>

    <?php // echo $form->field($model, 'shakl') ?>

    <?php // echo $form->field($model, 'internom') ?>

    <?php // echo $form->field($model, 'turi') ?>

    <?php // echo $form->field($model, 'resept') ?>

    <?php // echo $form->field($model, 'aniq') ?>

    <?php // echo $form->field($model, 'minimal') ?>

    <?php // echo $form->field($model, 'maksimal') ?>

    <?php // echo $form->field($model, 'sotish') ?>

    <?php // echo $form->field($model, 'zavod_id') ?>

    <?php // echo $form->field($model, 'del_flag') ?>

    <?php // echo $form->field($model, 'upakavka') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'client_id') ?>

    <?php // echo $form->field($model, 'changedate') ?>

    <?php // echo $form->field($model, 'majbur_dori_id') ?>

    <?php // echo $form->field($model, 'miqdor') ?>

    <?php // echo $form->field($model, 'shart') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
