<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AsosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'client_id') ?>

    <?= $form->field($model, 'kassa_id') ?>

    <?= $form->field($model, 'xodim_id') ?>

    <?= $form->field($model, 'seriya') ?>

    <?php // echo $form->field($model, 'nomer') ?>

    <?php // echo $form->field($model, 'sana') ?>

    <?php // echo $form->field($model, 'qabul_sana') ?>

    <?php // echo $form->field($model, 'summa') ?>

    <?php // echo $form->field($model, 'sum_naqd') ?>

    <?php // echo $form->field($model, 'sum_plastik') ?>

    <?php // echo $form->field($model, 'sum_epos') ?>

    <?php // echo $form->field($model, 'cheg_n') ?>

    <?php // echo $form->field($model, 'cheg_p') ?>

    <?php // echo $form->field($model, 'cheg_e') ?>

    <?php // echo $form->field($model, 'sum_naqd_ch') ?>

    <?php // echo $form->field($model, 'sum_plast_ch') ?>

    <?php // echo $form->field($model, 'sum_epos_ch') ?>

    <?php // echo $form->field($model, 'summa_ch') ?>

    <?php // echo $form->field($model, 'kol') ?>

    <?php // echo $form->field($model, 'changedate') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'del_flag') ?>

    <?php // echo $form->field($model, 'tur_oper') ?>

    <?php // echo $form->field($model, 'diler_id') ?>

    <?php // echo $form->field($model, 'print_flag') ?>

    <?php // echo $form->field($model, 'ombor_id') ?>

    <?php // echo $form->field($model, 'filial_id') ?>

    <?php // echo $form->field($model, 'shartnoma_id') ?>

    <?php // echo $form->field($model, 'woywo_bill_type') ?>

    <?php // echo $form->field($model, 'qarz_summa') ?>

    <?php // echo $form->field($model, 'qarz_kim') ?>

    <?php // echo $form->field($model, 'qarz_izoh') ?>

    <?php // echo $form->field($model, 'qarz_flag') ?>

    <?php // echo $form->field($model, 'h_id') ?>

    <?php // echo $form->field($model, 'pl_id') ?>

    <?php // echo $form->field($model, 'kurs') ?>

    <?php // echo $form->field($model, 'dollar') ?>

    <?php // echo $form->field($model, 'sum_d') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
