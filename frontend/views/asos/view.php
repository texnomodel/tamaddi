<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Asos */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Asos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'client_id',
            'kassa_id',
            'xodim_id',
            'seriya',
            'nomer',
            'sana',
            'qabul_sana',
            'summa',
            'sum_naqd',
            'sum_plastik',
            'sum_epos',
            'cheg_n',
            'cheg_p',
            'cheg_e',
            'sum_naqd_ch',
            'sum_plast_ch',
            'sum_epos_ch',
            'summa_ch',
            'kol',
            'changedate',
            'user_id',
            'del_flag',
            'tur_oper',
            'diler_id',
            'print_flag',
            'ombor_id',
            'filial_id',
            'shartnoma_id',
            'woywo_bill_type',
            'qarz_summa',
            'qarz_kim',
            'qarz_izoh',
            'qarz_flag',
            'h_id',
            'pl_id',
            'kurs',
            'dollar',
            'sum_d',
        ],
    ]) ?>

</div>
