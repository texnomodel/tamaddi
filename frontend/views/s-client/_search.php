<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SClientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sclient-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'iduz') ?>

    <?= $form->field($model, 'kod') ?>

    <?= $form->field($model, 'nom') ?>

    <?= $form->field($model, 'userpass') ?>

    <?php // echo $form->field($model, 'komu') ?>

    <?php // echo $form->field($model, 'vazir') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'manzil') ?>

    <?php // echo $form->field($model, 'indeks') ?>

    <?php // echo $form->field($model, 'obl') ?>

    <?php // echo $form->field($model, 'tuman') ?>

    <?php // echo $form->field($model, 'boss') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'rs') ?>

    <?php // echo $form->field($model, 'mr') ?>

    <?php // echo $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'okonh') ?>

    <?php // echo $form->field($model, 'bank') ?>

    <?php // echo $form->field($model, 'kod_bank') ?>

    <?php // echo $form->field($model, 's1') ?>

    <?php // echo $form->field($model, 'flag') ?>

    <?php // echo $form->field($model, 'flag1') ?>

    <?php // echo $form->field($model, 'flag2') ?>

    <?php // echo $form->field($model, 'gorod') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'tugashsana') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'changedate') ?>

    <?php // echo $form->field($model, 'uyu_type') ?>

    <?php // echo $form->field($model, 'garaj') ?>

    <?php // echo $form->field($model, 'garaj_turi') ?>

    <?php // echo $form->field($model, 'glav_id') ?>

    <?php // echo $form->field($model, 'client_tur') ?>

    <?php // echo $form->field($model, 'arendachi_kodi') ?>

    <?php // echo $form->field($model, 'arendachi_nomi') ?>

    <?php // echo $form->field($model, 'jivoy') ?>

    <?php // echo $form->field($model, 'tja') ?>

    <?php // echo $form->field($model, 'avto') ?>

    <?php // echo $form->field($model, 'sana') ?>

    <?php // echo $form->field($model, 'srok') ?>

    <?php // echo $form->field($model, 'prim') ?>

    <?php // echo $form->field($model, 'tez') ?>

    <?php // echo $form->field($model, 'stos') ?>

    <?php // echo $form->field($model, 'tods_sana') ?>

    <?php // echo $form->field($model, 'tods') ?>

    <?php // echo $form->field($model, 'sayt') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'masul1') ?>

    <?php // echo $form->field($model, 'telsms1') ?>

    <?php // echo $form->field($model, 'masul2') ?>

    <?php // echo $form->field($model, 'telsms2') ?>

    <?php // echo $form->field($model, 'komputer') ?>

    <?php // echo $form->field($model, 'printer') ?>

    <?php // echo $form->field($model, 'skaner') ?>

    <?php // echo $form->field($model, 'esp') ?>

    <?php // echo $form->field($model, 'telinternet') ?>

    <?php // echo $form->field($model, 'primoferta') ?>

    <?php // echo $form->field($model, 'sanaforma1') ?>

    <?php // echo $form->field($model, 'sanaoplata') ?>

    <?php // echo $form->field($model, 'oferta') ?>

    <?php // echo $form->field($model, 'nik') ?>

    <?php // echo $form->field($model, 'summa') ?>

    <?php // echo $form->field($model, 'edit_it') ?>

    <?php // echo $form->field($model, 'ssana') ?>

    <?php // echo $form->field($model, 'snomer') ?>

    <?php // echo $form->field($model, 'ost_n_sbor') ?>

    <?php // echo $form->field($model, 'ost_n_posh') ?>

    <?php // echo $form->field($model, 'del_flag') ?>

    <?php // echo $form->field($model, 'kolin') ?>

    <?php // echo $form->field($model, 'iamhere') ?>

    <?php // echo $form->field($model, 'diamhere') ?>

    <?php // echo $form->field($model, 'prikname') ?>

    <?php // echo $form->field($model, 'prikdate') ?>

    <?php // echo $form->field($model, 'filenom') ?>

    <?php // echo $form->field($model, 'at91') ?>

    <?php // echo $form->field($model, 'tender_n') ?>

    <?php // echo $form->field($model, 'tender_d') ?>

    <?php // echo $form->field($model, 'xizmat_n') ?>

    <?php // echo $form->field($model, 'xizmat_d') ?>

    <?php // echo $form->field($model, 'disp_n') ?>

    <?php // echo $form->field($model, 'disp_d') ?>

    <?php // echo $form->field($model, 'vaqt_in') ?>

    <?php // echo $form->field($model, 'vaqtout') ?>

    <?php // echo $form->field($model, 'kim') ?>

    <?php // echo $form->field($model, 'tarmoq') ?>

    <?php // echo $form->field($model, 'yaxlitlash') ?>

    <?php // echo $form->field($model, 'yaxlitlash_in') ?>

    <?php // echo $form->field($model, 'foiz') ?>

    <?php // echo $form->field($model, 'foiz_in') ?>

    <?php // echo $form->field($model, 'chegirma') ?>

    <?php // echo $form->field($model, 'seriya') ?>

    <?php // echo $form->field($model, 'ichkitovar') ?>

    <?php // echo $form->field($model, 'lasttz_id') ?>

    <?php // echo $form->field($model, 'lastta_id') ?>

    <?php // echo $form->field($model, 'lis') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
