<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pl', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'bank_id',
            'kod',
            'n_pl',
            'n_dok',
            //'d_pl',
            //'rssvoy',
            //'rs',
            //'vo',
            //'nn',
            //'client',
            //'client_id',
            //'sena_pl',
            //'saldo',
            //'ost_pl',
            //'vid',
            //'s1',
            //'ter',
            //'pot1',
            //'pot2',
            //'sf',
            //'sf_pot',
            //'username',
            //'changedate',
            //'stos',
            //'del_flag',
            //'prim',
            //'statrashod',
            //'diler_id',
            //'h_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
