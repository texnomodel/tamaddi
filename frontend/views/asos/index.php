<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AsosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Asos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'client_id',
            'kassa_id',
            'xodim_id',
            'seriya',
            //'nomer',
            //'sana',
            //'qabul_sana',
            //'summa',
            //'sum_naqd',
            //'sum_plastik',
            //'sum_epos',
            //'cheg_n',
            //'cheg_p',
            //'cheg_e',
            //'sum_naqd_ch',
            //'sum_plast_ch',
            //'sum_epos_ch',
            //'summa_ch',
            //'kol',
            //'changedate',
            //'user_id',
            //'del_flag',
            //'tur_oper',
            //'diler_id',
            //'print_flag',
            //'ombor_id',
            //'filial_id',
            //'shartnoma_id',
            //'woywo_bill_type',
            //'qarz_summa',
            //'qarz_kim',
            //'qarz_izoh',
            //'qarz_flag',
            //'h_id',
            //'pl_id',
            //'kurs',
            //'dollar',
            //'sum_d',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
