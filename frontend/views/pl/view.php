<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pl */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pl-view">

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
            'bank_id',
            'kod',
            'n_pl',
            'n_dok',
            'd_pl',
            'rssvoy',
            'rs',
            'vo',
            'nn',
            'client',
            'client_id',
            'sena_pl',
            'saldo',
            'ost_pl',
            'vid',
            's1',
            'ter',
            'pot1',
            'pot2',
            'sf',
            'sf_pot',
            'username',
            'changedate',
            'stos',
            'del_flag',
            'prim',
            'statrashod',
            'diler_id',
            'h_id',
        ],
    ]) ?>

</div>
