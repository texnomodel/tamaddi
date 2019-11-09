<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = '';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="panel panel-footer" >
        <h2 style="text-align: center"><b>TIZIMGA KIRISH</b></h2>
    </div>

    <div class="login-box-body" style="margin-top: -22px">
        <p class="login-box-msg"></p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form ->field($model, 'username', $fieldOptions1)->label(false)->textInput() ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput() ?>

        <div class="row">
            <div class="col-xs-8">
            </div>
            <div class="col-xs-4">
                <?= Html::submitButton('КИРИШ', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>

        </div>


        <?php ActiveForm::end(); ?>



    </div>

</div>
