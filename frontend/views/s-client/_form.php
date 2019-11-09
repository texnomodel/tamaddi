<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SClient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sclient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iduz')->textInput() ?>

    <?= $form->field($model, 'kod')->textInput() ?>

    <?= $form->field($model, 'nom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userpass')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'komu')->textInput() ?>

    <?= $form->field($model, 'vazir')->textInput() ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manzil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indeks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'obl')->textInput() ?>

    <?= $form->field($model, 'tuman')->textInput() ?>

    <?= $form->field($model, 'boss')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'okonh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kod_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flag')->textInput() ?>

    <?= $form->field($model, 'flag1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flag2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gorod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'tugashsana')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'changedate')->textInput() ?>

    <?= $form->field($model, 'uyu_type')->textInput() ?>

    <?= $form->field($model, 'garaj')->textInput() ?>

    <?= $form->field($model, 'garaj_turi')->textInput() ?>

    <?= $form->field($model, 'glav_id')->textInput() ?>

    <?= $form->field($model, 'client_tur')->textInput() ?>

    <?= $form->field($model, 'arendachi_kodi')->textInput() ?>

    <?= $form->field($model, 'arendachi_nomi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jivoy')->textInput() ?>

    <?= $form->field($model, 'tja')->textInput() ?>

    <?= $form->field($model, 'avto')->textInput() ?>

    <?= $form->field($model, 'sana')->textInput() ?>

    <?= $form->field($model, 'srok')->textInput() ?>

    <?= $form->field($model, 'prim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tez')->textInput() ?>

    <?= $form->field($model, 'stos')->textInput() ?>

    <?= $form->field($model, 'tods_sana')->textInput() ?>

    <?= $form->field($model, 'tods')->textInput() ?>

    <?= $form->field($model, 'sayt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masul1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telsms1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masul2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telsms2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'komputer')->textInput() ?>

    <?= $form->field($model, 'printer')->textInput() ?>

    <?= $form->field($model, 'skaner')->textInput() ?>

    <?= $form->field($model, 'esp')->textInput() ?>

    <?= $form->field($model, 'telinternet')->textInput() ?>

    <?= $form->field($model, 'primoferta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sanaforma1')->textInput() ?>

    <?= $form->field($model, 'sanaoplata')->textInput() ?>

    <?= $form->field($model, 'oferta')->textInput() ?>

    <?= $form->field($model, 'nik')->textInput() ?>

    <?= $form->field($model, 'summa')->textInput() ?>

    <?= $form->field($model, 'edit_it')->textInput() ?>

    <?= $form->field($model, 'ssana')->textInput() ?>

    <?= $form->field($model, 'snomer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ost_n_sbor')->textInput() ?>

    <?= $form->field($model, 'ost_n_posh')->textInput() ?>

    <?= $form->field($model, 'del_flag')->textInput() ?>

    <?= $form->field($model, 'kolin')->textInput() ?>

    <?= $form->field($model, 'iamhere')->textInput() ?>

    <?= $form->field($model, 'diamhere')->textInput() ?>

    <?= $form->field($model, 'prikname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prikdate')->textInput() ?>

    <?= $form->field($model, 'filenom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'at91')->textInput() ?>

    <?= $form->field($model, 'tender_n')->textInput() ?>

    <?= $form->field($model, 'tender_d')->textInput() ?>

    <?= $form->field($model, 'xizmat_n')->textInput() ?>

    <?= $form->field($model, 'xizmat_d')->textInput() ?>

    <?= $form->field($model, 'disp_n')->textInput() ?>

    <?= $form->field($model, 'disp_d')->textInput() ?>

    <?= $form->field($model, 'vaqt_in')->textInput() ?>

    <?= $form->field($model, 'vaqtout')->textInput() ?>

    <?= $form->field($model, 'kim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tarmoq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'yaxlitlash')->textInput() ?>

    <?= $form->field($model, 'yaxlitlash_in')->textInput() ?>

    <?= $form->field($model, 'foiz')->textInput() ?>

    <?= $form->field($model, 'foiz_in')->textInput() ?>

    <?= $form->field($model, 'chegirma')->textInput() ?>

    <?= $form->field($model, 'seriya')->textInput() ?>

    <?= $form->field($model, 'ichkitovar')->textInput() ?>

    <?= $form->field($model, 'lasttz_id')->textInput() ?>

    <?= $form->field($model, 'lastta_id')->textInput() ?>

    <?= $form->field($model, 'lis')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
