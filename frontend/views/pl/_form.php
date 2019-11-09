<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bank_id')->textInput() ?>

    <?= $form->field($model, 'kod')->textInput() ?>

    <?= $form->field($model, 'n_pl')->textInput() ?>

    <?= $form->field($model, 'n_dok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_pl')->textInput() ?>

    <?= $form->field($model, 'rssvoy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vo')->textInput() ?>

    <?= $form->field($model, 'nn')->textInput() ?>

    <?= $form->field($model, 'client')->textInput() ?>

    <?= $form->field($model, 'client_id')->textInput() ?>

    <?= $form->field($model, 'sena_pl')->textInput() ?>

    <?= $form->field($model, 'saldo')->textInput() ?>

    <?= $form->field($model, 'ost_pl')->textInput() ?>

    <?= $form->field($model, 'vid')->textInput() ?>

    <?= $form->field($model, 's1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ter')->textInput() ?>

    <?= $form->field($model, 'pot1')->textInput() ?>

    <?= $form->field($model, 'pot2')->textInput() ?>

    <?= $form->field($model, 'sf')->textInput() ?>

    <?= $form->field($model, 'sf_pot')->textInput() ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'changedate')->textInput() ?>

    <?= $form->field($model, 'stos')->textInput() ?>

    <?= $form->field($model, 'del_flag')->textInput() ?>

    <?= $form->field($model, 'prim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'statrashod')->textInput() ?>

    <?= $form->field($model, 'diler_id')->textInput() ?>

    <?= $form->field($model, 'h_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
