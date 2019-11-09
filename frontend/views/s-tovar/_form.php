<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\STovar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stovar-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="main-info info-bordered">
        <h3>Asosiy ma`lumotlar</h3>
        <?= $form->field($model, 'nom')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'nom_ru')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'zavod_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\frontend\models\SZavod::find()->all(), 'id', 'nom'),
            ['prompt' => 'Zavodni tanlang...'],
            ['class' => 'your class']
        ) ?>

        <div class="form-group" style="border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; padding-top: 20px; margin-bottom: 20px;">
            <label for="" class="control-label">Yangi zavod</label>
            <input type="text">
            <button class="btn">+</button>
        </div>

        <?= $form->field($model, 'izm_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\frontend\models\SIzm::find()->all(), 'id', 'nom'),
            ['prompt' => 'O`lchov birligini tanlang...'],
            ['class' => 'your class']
        ) ?>
        <?= $form->field($model, 'izm1')->dropDownList(
            \yii\helpers\ArrayHelper::map(\frontend\models\SIzm1::find()->all(), 'id', 'nom'),
            ['prompt' => 'Ichki o`lchov birligini tanlang...'],
            ['class' => 'your class']
        ) ?>
        <?= $form->field($model, 'kol_in')->textInput() ?>
    </div>

    <div class="additional-info info-bordered">
        <h3>Qo`shimcha ma`lumotlar</h3>
        <?= $form->field($model, 'kat')->dropDownList(
            \yii\helpers\ArrayHelper::map(\frontend\models\SKat::find()->all(), 'id', 'nom'),
            ['prompt' => 'Turni tanlang...'],
            ['class' => 'your class']
        ) ?>
        <?= $form->field($model, 'brend')->dropDownList(
            \yii\helpers\ArrayHelper::map(\frontend\models\SBrend::find()->all(), 'id', 'nom'),
            ['prompt' => 'Brendni tanlang...'],
            ['class' => 'your class']
        ) ?>
        <?= $form->field($model, 'shtrix')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'shtrix1')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'shtrix2')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'qr')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'internom')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'shakl')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'aniq')->textInput() ?>
        <?= $form->field($model, 'miqdor')->textInput() ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
    .info-bordered{
        padding: 10px;
        border: 1px solid #3fff0057;
        border-radius: 4px;
        margin-bottom: 20px;
    }
    .info-bordered h3{
        position: relative;
        font-size: 22px;
        color: #099000;
        margin: 4px 0 20px;
    }
    .info-bordered h3:after{
        position: absolute;
        display: block;
        content: '';

        bottom: -4px;

        width: 190px;
        height: 3px;

        background-color: #65ff5b;
    }
    label.control-label{
        color: #00a65a;
    }
    .control-label{
        width: 100px;
    }
    .form-control{
        display: inline-block;
        width: calc(100% - 130px);
        color: #537d33;
        border-color: #adfda8;
    }
    .form-control:focus{
        border-color: #1cff97;
    }
    .stovar-form .content-header h1 {
        color: #1e5f38;
    }
    @media only screen and (max-width: 340px){
        .form-control{
            width: 100%;
        }
    }
</style>