<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\STovarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tovar baza';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stovar-index">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Yangi tovar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="table-responsive" style="max-height: 520px;overflow: auto;border: 1px solid #dedede;box-shadow: inset 1px 0px 4px 0px rgba(0,0,0,0.1);">
        <table class="table table-bordered table-hover table-condensed">
            <thead style="background-color: #a7d1e9;">
            <tr>
                <th rowspan="2" style="min-width: 200px;">Tovar nomi</th>
                <th rowspan="2" style="min-width: 140px;">Ishlab chiqaruvchi (zavod)</th>
                <th rowspan="2" style="min-width: 80px;">O`lchov birligi</th>
                <th colspan="2">Ichki o`lchov</th>
                <th rowspan="2" style="min-width: 120px">Shtrix kod</th>
                <th rowspan="2" style="min-width: 120px">Shtrix ichki</th>
                <th rowspan="2" style="min-width: 60px">kg</th>
                <th rowspan="2" style="min-width: 120px">shtrix_full</th>
                <th rowspan="2" style="min-width: 90px">Tavsiya qilingan narx</th>
                <th colspan="3">Tahrirlash</th>
            </tr>
            <tr>
                <th style="min-width: 50px;">dona</th>
                <th style="min-width: 50px;">birligi</th>
                <th style="min-width: 100px;">Admin</th>
                <th style="min-width: 100px;">Ma`sul</th>
                <th style="min-width: 145px;">sana</th>
            </tr>
            </thead>
            <tbody style="background-color: #deeffa;">
            <?php
            for($i=0; $i<count($models); $i++) {
                ?>
                <tr>
                    <td><?= $models[$i]['nom']?></td>
                    <td><?= $models[$i]['zavod']?></td>
                    <td><?= $models[$i]['izm']?></td>
                    <td><?= $models[$i]['kol_in']?></td>
                    <td><?= $models[$i]['izm2']?></td>
                    <td><?= $models[$i]['shtrixkod']?></td>
                    <td><?= $models[$i]['shtrix_in']?></td>
                    <td><?= $models[$i]['kg']?></td>
                    <td><?= $models[$i]['shtrix_full']?></td>
                    <td><?= $models[$i]['sotish']?></td>
                    <td><?= $models[$i]['nom_ru']?></td>
                    <td><?= $models[$i]['user_id']?></td>
                    <td><?= $models[$i]['changedate']?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    thead th{
        text-align: center;
        vertical-align: middle!important;
    }
</style>
