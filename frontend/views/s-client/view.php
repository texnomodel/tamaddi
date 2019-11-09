<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SClient */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'S Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sclient-view">

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
            'iduz',
            'kod',
            'nom',
            'userpass',
            'komu',
            'vazir',
            'adress',
            'manzil',
            'indeks',
            'obl',
            'tuman',
            'boss',
            'tel',
            'rs',
            'mr',
            'inn',
            'okonh',
            'bank',
            'kod_bank',
            's1',
            'flag',
            'flag1',
            'flag2',
            'gorod',
            'active',
            'tugashsana',
            'user_id',
            'changedate',
            'uyu_type',
            'garaj',
            'garaj_turi',
            'glav_id',
            'client_tur',
            'arendachi_kodi',
            'arendachi_nomi',
            'jivoy',
            'tja',
            'avto',
            'sana',
            'srok',
            'prim',
            'tez',
            'stos',
            'tods_sana',
            'tods',
            'sayt',
            'email:email',
            'masul1',
            'telsms1',
            'masul2',
            'telsms2',
            'komputer',
            'printer',
            'skaner',
            'esp',
            'telinternet',
            'primoferta',
            'sanaforma1',
            'sanaoplata',
            'oferta',
            'nik',
            'summa',
            'edit_it',
            'ssana',
            'snomer',
            'ost_n_sbor',
            'ost_n_posh',
            'del_flag',
            'kolin',
            'iamhere',
            'diamhere',
            'prikname',
            'prikdate',
            'filenom',
            'at91',
            'tender_n',
            'tender_d',
            'xizmat_n',
            'xizmat_d',
            'disp_n',
            'disp_d',
            'vaqt_in',
            'vaqtout',
            'kim',
            'tarmoq',
            'yaxlitlash',
            'yaxlitlash_in',
            'foiz',
            'foiz_in',
            'chegirma',
            'seriya',
            'ichkitovar',
            'lasttz_id',
            'lastta_id',
            'lis',
        ],
    ]) ?>

</div>
