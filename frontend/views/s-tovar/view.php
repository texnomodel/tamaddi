<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\STovar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Stovars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="stovar-view">

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
            'nom',
            'nom_ru',
            'nom_sh',
            'shtrix',
            'shtrix_in',
            'tz_id',
            'kg',
            'shtrix_full',
            'shtrix1',
            'shtrix2',
            'kat',
            'brend',
            'qr',
            'shtrixkod',
            'qrkod',
            'izm_id',
            'kol_in',
            'izm1',
            'shakl',
            'internom',
            'turi',
            'resept',
            'aniq',
            'minimal',
            'maksimal',
            'sotish',
            'zavod_id',
            'del_flag',
            'upakavka',
            'user_id',
            'client_id',
            'changedate',
            'majbur_dori_id',
            'miqdor',
            'shart',
        ],
    ]) ?>

</div>
