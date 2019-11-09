<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '';
?>
<div class="site-about">
<?php
$i=0;
foreach ($model as $item){ $i++
?>
    <div class="row">
        <div class="col-md-12">

            <?php \yii\bootstrap\ActiveForm::begin(['action'=>['/site/karzina']])?>

                    <?php
                    $stat = \frontend\models\Asos::find()->where(['id'=>$item->asos_id])->one();

                    $nom = \frontend\models\SMobil::find()->where(['id'=>$stat['mobil']])->one();

                    ?>
                    <input type="text" value="<?=$stat['mobil']?>" hidden name="stolid">
                    <input type="text" value="<?=$stat['id']?>" hidden name="tayyor">
                    <button class="form-control btn btn-primary"><?=$nom['nom']?> <b style="color: rgba(187,246,153,0.77)">( <?=\frontend\models\AsosSlave::find()->where(['zakaz_see'=>1])->andWhere(['asos_id'=>$stat['id']])->count()?> ta )</b></button>
            <?php \yii\bootstrap\ActiveForm::end()?>
        </div>
    </div>
    <br>
    <?php }?>
</div>
