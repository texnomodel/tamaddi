<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

$this->title = 'Haridorlar';
?>
    <?php
    echo \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
            ],
            [
                'attribute' => 'nom',
                'format' => 'text',
            ],
            'telsms1',   
        ],

        'summary' => 'Topilgan ma`lumotlar: <b>{totalCount}</b>',
//        'summary' => '{begin} - {end} {count} {totalCount} {page} {pageCount}',
        'emptyText'=>'Ma`lumot topilmadi',
        'layout'=> "{summary}\n{items}\n{pager}"
    ]);
    ?>
