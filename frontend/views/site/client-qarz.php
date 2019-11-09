<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

$this->title = 'Haridorlar qarzdorligi';
?>

<div class="client-qarz">

    <div class="row">
        <?php ActiveForm::begin()?>
        <div class="col-md-3 client-qarz__date">
            <?php
            echo DatePicker::widget([
                'name' => 'date1',
                'value' => Yii::$app->request->post('date1')?Yii::$app->request->post('date1'):date('Y-m-01'),
                'options' => ['placeholder' => 'Sanani tanlang...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>
        <div class="col-md-3 client-qarz__date">
            <?php
            echo DatePicker::widget([
                'name' => 'date2',
                'value' => Yii::$app->request->post('date2')?Yii::$app->request->post('date2'):date('Y-m-d'),
                'options' => ['placeholder' => 'Sanani tanlang...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>
        <div class="col-md-4 client-qarz__select2">
            <?php
            echo \kartik\select2\Select2::widget([
                'name' => 'haridor',
                'data' => $haridorlar,
                'value'=>Yii::$app->request->post('haridor'),
                'options' => ['placeholder' => 'Haridor nomi...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])
            ?>
        </div>
        <div class="col-md-1 client-qarz__button">
            <button type="submit" class="btn btn-primary">Qidirish</button>
        </div>
        <?php ActiveForm::end()?>
    </div>
    <hr>
    <div class="info-qarz">
        <div class="info-qarz__item"><label for="">Boshlang'ich qarz:</label><span><?= $danq?></span></div>
        <div class="info-qarz__item"><label for="">Chiqim:</label><span><?= $chiqim?></span></div>
        <div class="info-qarz__item"><label for="">Kirim:</label><span><?= $kirim?></span></div>
        <div class="info-qarz__item"><label for="">Oxirgi qarz:</label><span><?= $gachaq?></span></div>
    </div>
    <hr>

    <?php
    echo \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
            ],

            'sana',
            'nomer',
            'summa',
            'qarz_summa',
            'qarz_izoh',
        ],

        'summary' => 'Topilgan ma`lumotlar: <b>{totalCount}</b>',
//        'summary' => '{begin} - {end} {count} {totalCount} {page} {pageCount}',
        'emptyText'=>'Ma`lumot topilmadi',
        'layout'=> "{summary}\n{items}\n{pager}"
    ]);
    ?>

    <?php
    echo \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider2,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
            ],

            'd_pl',
            'sena_pl',
            'id',
        ],

        'summary' => 'Topilgan ma`lumotlar: <b>{totalCount}</b>',
//        'summary' => '{begin} - {end} {count} {totalCount} {page} {pageCount}',
        'emptyText'=>'Ma`lumot topilmadi',
        'layout'=> "{summary}\n{items}\n{pager}"
    ]);
    ?>
</div>

<style>
    .info-qarz{
        margin: 20px 0;
    }
    .info-qarz__item{
        display: inline-block;
    }
    .info-qarz__item label {
        text-align: right;
        width: 130px;
        margin-right: 12px;
    }
    .info-qarz__item span {
        display: inline-block;
        width: 120px;
        border: 1px solid #ccc;
        padding: 1px 4px;
        border-radius: 4px;
    }
    @media only screen and (max-width: 1280px) {
        .info-qarz__item{
            width: 49%;
        }
    }
    @media only screen and (max-width: 1086px) {
        .client-qarz__date, .client-qarz__select2, .client-qarz__button{
            padding-top: 2px;
            padding-bottom:2px;
        }
        .client-qarz__button{
            text-align: right;
        }
    }
    @media only screen and (max-width: 564px) {
        .info-qarz__item label {
            text-align: left;
            margin-right: 0;
            width: 49%;
        }
    }
</style>