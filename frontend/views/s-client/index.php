<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'S Clients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sclient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create S Client', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'nom',
            //'userpass',
            //'komu',
            //'vazir',
            'adress',
            //'manzil',
            //'indeks',
            //'obl',
            //'tuman',
            'boss',
            'tel',
            //'rs',
            //'mr',
            //'inn',
            //'okonh',
            'bank',
            //'kod_bank',
            //'s1',
            //'flag',
            //'flag1',
            //'flag2',
            //'gorod',
            //'active',
            //'tugashsana',
            //'user_id',
            //'changedate',
            //'uyu_type',
            //'garaj',
            //'garaj_turi',
            //'glav_id',
            //'client_tur',
            //'arendachi_kodi',
            //'arendachi_nomi',
            //'jivoy',
            //'tja',
            //'avto',
            //'sana',
            //'srok',
            //'prim',
            //'tez',
            //'stos',
            //'tods_sana',
            //'tods',
            //'sayt',
            //'email:email',
            //'masul1',
            //'telsms1',
            //'masul2',
            //'telsms2',
            //'komputer',
            //'printer',
            //'skaner',
            //'esp',
            //'telinternet',
            //'primoferta',
            //'sanaforma1',
            //'sanaoplata',
            //'oferta',
            //'nik',
            //'summa',
            //'edit_it',
            //'ssana',
            //'snomer',
            //'ost_n_sbor',
            //'ost_n_posh',
            //'del_flag',
            //'kolin',
            //'iamhere',
            //'diamhere',
            //'prikname',
            //'prikdate',
            //'filenom',
            //'at91',
            //'tender_n',
            //'tender_d',
            //'xizmat_n',
            //'xizmat_d',
            //'disp_n',
            //'disp_d',
            //'vaqt_in',
            //'vaqtout',
            //'kim',
            //'tarmoq',
            //'yaxlitlash',
            //'yaxlitlash_in',
            //'foiz',
            //'foiz_in',
            //'chegirma',
            //'seriya',
            //'ichkitovar',
            //'lasttz_id',
            //'lastta_id',
            //'lis',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
