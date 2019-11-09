<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Asos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->textInput() ?>

    <?= $form->field($model, 'kassa_id')->textInput() ?>

    <?= $form->field($model, 'xodim_id')->textInput() ?>

    <?= $form->field($model, 'seriya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sana')->textInput() ?>

    <?= $form->field($model, 'qabul_sana')->textInput() ?>

    <?= $form->field($model, 'summa')->textInput() ?>

    <?= $form->field($model, 'sum_naqd')->textInput() ?>

    <?= $form->field($model, 'sum_plastik')->textInput() ?>

    <?= $form->field($model, 'sum_epos')->textInput() ?>

    <?= $form->field($model, 'cheg_n')->textInput() ?>

    <?= $form->field($model, 'cheg_p')->textInput() ?>

    <?= $form->field($model, 'cheg_e')->textInput() ?>

    <?= $form->field($model, 'sum_naqd_ch')->textInput() ?>

    <?= $form->field($model, 'sum_plast_ch')->textInput() ?>

    <?= $form->field($model, 'sum_epos_ch')->textInput() ?>

    <?= $form->field($model, 'summa_ch')->textInput() ?>

    <?= $form->field($model, 'kol')->textInput() ?>

    <?= $form->field($model, 'changedate')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'del_flag')->textInput() ?>

    <?= $form->field($model, 'tur_oper')->textInput() ?>

    <?= $form->field($model, 'diler_id')->textInput() ?>

    <?= $form->field($model, 'print_flag')->textInput() ?>

    <?= $form->field($model, 'ombor_id')->textInput() ?>

    <?= $form->field($model, 'filial_id')->textInput() ?>

    <?= $form->field($model, 'shartnoma_id')->textInput() ?>

    <?= $form->field($model, 'woywo_bill_type')->textInput() ?>

    <?= $form->field($model, 'qarz_summa')->textInput() ?>

    <?= $form->field($model, 'qarz_kim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qarz_izoh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qarz_flag')->textInput() ?>

    <?= $form->field($model, 'h_id')->textInput() ?>

    <?= $form->field($model, 'pl_id')->textInput() ?>

    <?= $form->field($model, 'kurs')->textInput() ?>

    <?= $form->field($model, 'dollar')->textInput() ?>

    <?= $form->field($model, 'sum_d')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
