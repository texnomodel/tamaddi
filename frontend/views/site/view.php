<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = "";

$query1 = \frontend\models\AsosSlave::find()
    ->select('asos_slave.id as ids,asos_slave.sotish as sot,asos_slave.sotish_in as sotin,asos_slave.kol_ost as kns,asos_slave.kol_in_ost as kolin,s_tovar.nom as nom ,s_tovar.kol_in as tkol_in, s_tovar.id as idt')
    ->from('asos_slave,asos,s_tovar')
    ->where('asos.id = asos_slave.asos_id and asos_slave.del_flag = 1 and (asos_slave.kol_ost > 0) and (asos.tur_oper = 1 or asos.tur_oper=4 or asos.tur_oper = 5) and s_tovar.id = asos_slave.tovar_id and asos.client_id = ' .Yii::$app->getUser()->identity->client_id)
    ->all();

$data = \yii\helpers\ArrayHelper::map($query1,'idt','nom');

?>

<!--<div class="shopping-cart">-->
<!--    <!-- Title -->
<!---->
<!---->
<!--    <!-- Product #1 -->
<!--    <div class="item">-->
<!--        <div class="buttons">-->
<!--            <span class="delete-btn"></span>-->
<!--            <span class="like-btn"></span>-->
<!--        </div>-->
<!---->
<!--        <div class="quantity">-->
<!--            <button class="plus-btn" type="button" name="button">-->
<!--                +-->
<!--            </button>-->
<!--            <input style="width: 50px" type="text" name="name" value="1">-->
<!--            <button class="minus-btn" type="button" name="button">-->
<!--                --->
<!--            </button>-->
<!--        </div>-->
<!---->
<!--        <div class="total-price">$549</div>-->
<!--    </div>-->
<!---->
<!--</div>-->




<div class="row"  style="padding: 5px 5px 10px 17px; margin-top: -10px; background-color: rgba(7,125,246,0.77)">
    <input type="text" name="stolid" value="<?=Yii::$app->request->post('stolid')?>" hidden>
    <?php $stol = \frontend\models\SMobil::find()->where(['id'=>Yii::$app->request->post('stolid')])->one();?>
   <h4 style="color:white; text-align: center">Siz <?= $stol['nom']?>  ga taom biriktiryapsiz</h4>

</div>
<div  style="background-color: white; padding: 3px">

        <table border="1" style="padding: 5px">


            <?php $i=0; foreach ($query as $ite){ $i++?>
                <?php ActiveForm::begin(['action'=>['/site/karzina']])?>
                <input type="text" hidden value="<?=$ite->kolin?>" name="tkolin">
                <input type="text" hidden value="<?=$ite->kns?>" name="tkol">

                <tr>
                    <?php
                    $date = date("Y-m-d");
                    $s1 = \frontend\models\Asos::find()->where(['sana'=>$date])->andWhere(['print_flag'=>0])->andWhere(['del_flag'=>1])->andWhere(['mobil'=>Yii::$app->request->post('stolid')])->andWhere(['>','diler_id',0])->one();
                    ?>
                    <input type="text" value="<?=$ite->idt?>" name="tavarid" hidden>
                    <input type="text" value="<?=$s1['id']?>" name="asosid" hidden>
                    <input type="text" value="<?=$ite['ids']?>" name="idsup" hidden>
                    <input type="text" value="<?=$ite['kolin']?>" name="kolinjoriy" hidden>
                    <input type="text" value="<?=$ite['kns']?>" name="koljoriy" hidden>
                    <tr><td>
                        </td></tr>
                    <td style="font-size: 14px; padding: 5px; color: white; background-color: rgba(65,114,246,0.77)"><b><?=$ite->nom?></b></td>
                <td style="padding: 12px 25px 8px 20px; text-align: center"><button  class="btn btn-primary" >Saqlash</button> </td>
                    <input type="text" name="tavarnomi" value="<?=$ite->nom?>" hidden>
                <input type="text" name="stolid" value="<?=Yii::$app->request->post('stolid')?>" hidden>
                </tr>
                <tr style="padding: 2px">
                    <td style="font-size: 13px;padding: 3px; color: ">
                        Asosiy:<b style="color: red"> <?=$ite->kns?></b> ta | <b style="color: red"> <?=$ite->sot?></b><input type="text" value="<?=$ite->sot?>" name="sot" hidden> sum

                    </td>
                    <td nowrap style="padding: 10px"> <div class="quantity">

                            <button class="plus-btn" type="button" name="button">
                                +
                            </button>
                            <input style="width: 50px; margin:  0px 15px 0px 15px; text-align: center" max="<?=$ite->kns?>" type="number" name="asosiyson" value="0">
                            <button class="minus-btn" type="button" name="button">
                                -
                            </button>
                        </div></td>


                        <input type="text" hidden value="<?=$ite->kns?>" name="kololdin">
                        <input type="text" hidden value="<?=$ite->kolin?>" name="kolinoldin">
                </tr>

                    <?php
                      if($ite['tkol_in'] > 1){

                    ?>
                    <tr>
                          <td style="font-size: 13px;padding: 3px;color: ">Ichki: <b style="color: red"><?=$ite->kolin?></b> ta | <b style="color: red"><?=$ite->sotin?></b><input type="text" value="<?=$ite->sotin?>" hidden name="sotin"> sum</td>
                          <td nowrap style="padding: 10px"> <div class="quantity">

                                  <button class="plus-btn" type="button" name="button">
                                      +
                                  </button>
                                  <input style="width: 50px; margin:  0px 15px 0px 15px; text-align: center" max="1000" type="number" name="ichkison" value="0">
                                  <button class="minus-btn" type="button" name="button">
                                      -
                                  </button>
                                  <input type="text" value="<?= $ite['tkol_in']?>" hidden name="tkolin">
                                  <input type="text" value="<?= $ite['ids']?>" hidden name="tkolinost">
                              </div></td>
                    </tr><?php } ?>


                    <?php
                      if($ite['tkol_in']>1){

                    ?>



<?php } ?>
                <?php ActiveForm::end()?>
            <?php }?>


        </table>

</div>




<script type="text/javascript">
    $('.minus-btn').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest('div').find('input');
        var value = parseInt($input.val());

        if (value > 1) {
            value = value - 1;
        } else {
            value = 0;
        }

        $input.val(value);

    });

    $('.plus-btn').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest('div').find('input');
        var value = parseInt($input.val());

        if (value < 1000) {
            value = value + 1;
        } else {
            value =1000;
        }

        $input.val(value);
    });

    $('.like-btn').on('click', function() {
        $(this).toggleClass('is-active');
    });
</script>

<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
