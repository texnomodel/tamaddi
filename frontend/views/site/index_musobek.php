<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = '';
$model = \frontend\models\STovar::find()->all();
$data = \yii\helpers\ArrayHelper::map($model,'id','nom');
$this->registerAssetBundle(yii\web\JqueryAsset::className(), \yii\web\View::POS_HEAD);
?>
<?php
$date = date("Y-m-d");

?>

    <br>
    <br>
<?php

$date = date("Y-m-d");

$s = \frontend\models\Asos::find()->where(['sana'=>$date])->andWhere(['print_flag'=>0])->andWhere(['>','diler_id',0])->andWhere(['mobil'=>Yii::$app->request->post('stolid')])->andWhere(['user_id'=>Yii::$app->getUser()->id])->one();

$ss = \frontend\models\AsosSlave::find()->where(['asos_id'=>$s['id']])->andWhere(['user_id'=>Yii::$app->getUser()->id])->one();
if($ss['id'] == null){ ?>



<?php }
else{
    ?>


    <div class="panel panel-default" style="padding: 5px; margin-top: -70px">
        <table  >

            <?php $i=0;
            foreach ($sotil as $sot){ $i++?>

                <tbody style="">

                <tr id="tr">
                    <th id="" style="margin-top: 17px; padding: 5px 5px 5px 0px"  scope="row">


                        <?php if($sot->zakaz == NUll) {?>

                        <p id="sizep" style="background-color: yellow"><?= mb_substr($sot->tovar_nom,0,40)?> (<?=$sot->kol?> x <?=$sot->sotish?>)</p>

                        <?php }?>

                           <?php if($sot->zakaz ==!null and $sot->zakaz_see==0) {?>

                        <p id="sizep" style="background-color: green;color: white"><?= mb_substr($sot->tovar_nom,0,40)?> ( <?=$sot->kol?> x <?=$sot->sotish?>)</p>

                        <?php }?>
                        <?php if($sot->zakaz_see==1 || $sot->zakaz_see==2) {?>

                        <p id="sizep" style="background-color: blue;color: white"><?= mb_substr($sot->tovar_nom,0,40)?> (<?=$sot->kol?> x <?=$sot->sotish?>)</p>

                        <?php }?>
                       </p>
                    </th>

                    <th id="del" >

                        <?php ActiveForm::begin()?>

                    <button  onclick="return  confirm('Ochirilsinmi?')"><i class="fa fa-trash"></i></button>
                        <input type="text" value="<?=$sot->id?>" name="iddel" hidden>
                        <input type="text" value="<?=$sot->kol_ost?>" name="idav" hidden>
                        <input type="text" value="<?=$sot->kol?>" name="koldel" hidden >
                        <input type="text" value="<?=$sot->kol_in?>" name="kolindel" hidden>
                        <input type="text" name="stolid" value="<?=Yii::$app->request->post('stolid')?>" hidden>
                        
                        <?php ActiveForm::end()?>

                    </th>
               </tr>
             <!--    <?php ActiveForm::begin(['action'=>['/site/karzina']])?>
                <?php if($sot->kol==0){

                }
                else{
                    ?>
                <tr>
                    <th style="color: blue" scope="row">

                        <div class="quantity">
                            
                            <button class="plus-btn" type="button" name="button">
                                +
                            </button>
                            <input style="width: 50px; text-align: center" max="" type="number" name="kol" value="<?=$sot->kol?>">
                            <button class="minus-btn" type="button" name="button">
                                -
                            </button> x  <b style="color: red"><?=$sot->sotish?></b> = <b style="color: red"><?=$sot->kol * $sot->sotish?></b>

                        </div>
                    </th>

                    <th style="color: blue" >

                        <input type="text" hidden  value="<?=$sot->kol_ost?>" name="ides">
                        <input type="text" hidden value="<?=$sot->kol?>" name="koles">
                        <input type="text" hidden value="<?=$sot->kol_in?>" name="kolines">
                        <input type="text" hidden value="<?=$sot->id?>" name="idjo">
                        <input type="text" name="stolid" value="<?=Yii::$app->request->post('stolid')?>" hidden>


                        <button onclick="return confirm('Yangilansinmi?')"><i class="fa fa-pencil"></i></button>

                    </th>
                </tr> -->

                        <?php
                        $a= $sot->kol * $sot->sotish;
                        $c+= $a;

                        $e= $sot->kol;
                        $f= $sot->kol_in;
                        $h+=$e;
                        $l+=$f;
                        ?>

                        </th></tr>
                <?php }?>
                <?php if($sot->kol_in==0){}
                else{
                ?>
                <tr>
                    <th style="color: blue" scope="row">

                        <div class="quantity">
                            Ichki:&nbsp;&nbsp;&nbsp;
                            <button class="plus-btn" type="button" name="button">
                                +
                            </button>
                            <input style="width: 50px; text-align: center" max="" type="number" name="kolin" value="<?=$sot->kol_in?>">
                            <button class="minus-btn" type="button" name="button">
                                -
                            </button> x <b style="color: red"> <?=$sot->sotish_in?></b> = <b style="color: red"><?=$sot->kol_in * $sot->sotish_in ?></b>

                        </div>
                        <?php
                        $la=$sot->kol_in*$sot->sotish_in;
                        $lal+=$la;

                        ?>
                    </th>
                    <th style="color: blue" >

                        <input type="text" hidden  value="<?=$sot->kol_ost?>" name="ides">
                        <input type="text" hidden value="<?=$sot->kol?>" name="koles">
                        <input type="text" hidden value="<?=$sot->kol_in?>" name="kolines">
                        <input type="text" hidden value="<?=$sot->id?>" name="idjo">



<!--                        <button onclick="return confirm('Yangilansinmi?')"><i class="fa fa-pencil"></i></button>-->

                    </th>
                </tr>


                <?php }?>
                <?php ActiveForm::end()?>

                </tbody>


            <?php } ?>
        </table>

        <table>

            <tr >
                <td style="padding: 1px">

                    <?php ActiveForm::begin(['action'=>['/site/karzina']])?>

                    <?php
                    $date = date("Y-m-d");
                    $s = \frontend\models\Asos::find()->where(['sana'=>$date])->andWhere(['print_flag'=>0])->andWhere(['mobil'=>Yii::$app->request->post('stolid')])->andWhere(['>','diler_id',0])->andWhere(['user_id'=>Yii::$app->getUser()->id])->one();
                    $klient = \frontend\models\SClient::find()->where(['id'=>Yii::$app->getUser()->identity->client_id])->one();
                    $garpil= $klient['garaj']+1;
                    ?>
                    <input type="text" hidden value="<?=$garpil?>" name="garaj">

                    <input type="text" hidden value="<?=$s['id']?>" name="andnac">
                    <input type="text" value="<?= $sum+$sumin ?>" hidden name="summa">
                    <input type="text" value="<?= Yii::$app->request->post('stolid')?>" hidden name="stolid">

                    <input type="text" value="<?= $sum1['kol']+$sum1['kol_in'] ?>" hidden name="kols">
                    <button class=" btn-info" onclick="return confirm('Saqlansinmi?')" style="margin-top: 10px; font-size: 22px;width: 50px"><i class="fa fa-check-square-o"></i></button>

                    <?php ActiveForm::end()?>

                </td>
                <!-- <td style="padding: 1px">

                    <?php ActiveForm::begin(['action'=>['/site/karzina']])?>

                    <?php
                    $date = date("Y-m-d");
                    $s = \frontend\models\Asos::find()->where(['sana'=>$date])->andWhere(['print_flag'=>0])->andWhere(['>','diler_id',0])->andWhere(['user_id'=>Yii::$app->getUser()->id])->one();
                    ?>
                    <input type="text" hidden value="<?=$s['id']?>" name="andnacdel">
                    <input type="text" name="stolid" value="<?=Yii::$app->request->post('stolid')?>" hidden>
                    <button class=" btn-danger" onclick="return confirm('Tozalansinmi?')" style="margin-top: 10px; font-size: 22px;width: 55px"> <i class="fa fa-close"></i></button>
                    <?php ActiveForm::end()?>
                </td> -->

                <td style="padding: 1px">

                    <?php ActiveForm::begin(['action'=>['/site/karzina']])?>

                    <?php
                    $date = date("Y-m-d");
                    $s = \frontend\models\Asos::find()->where(['sana'=>$date])->andWhere(['print_flag'=>0])->andWhere(['mobil'=>Yii::$app->request->post('stolid')])->andWhere(['>','diler_id',0])->andWhere(['user_id'=>Yii::$app->getUser()->id])->one();
                    $klient = \frontend\models\SClient::find()->where(['id'=>Yii::$app->getUser()->identity->client_id])->one();
                    $garpil= $klient['garaj']+1;
                    ?>
                    <input type="text" hidden value="<?=$garpil?>" name="garaj">
                    <input type="text" hidden value="<?=$s['id']?>" name="andchek">
                    <input type="text" value="<?= $sum+$sumin ?>" hidden name="summa">
                    <input type="text" value="<?= $sum1['kol']+$sum1['kol_in'] ?>" hidden name="kols">
                    <button class="btn-primary" onclick="return confirm('Chek chiqarilsinmi?')" style="margin-top: 10px; font-size: 22px;width: 55px"><i class="fa fa-flag"></i></button>
                    <?php ActiveForm::end()?>

                </td>
                <td style="padding: 1px">
                      <button class="btn-success" onclick='window.location.reload();' style="font-size: 22px;width: 50px;margin-top: 10px"><i class="fa fa-refresh"></i></button>
                  </td>
                <td style="padding: 1px;"><p style="padding: 1px;background-color: red;color: white;height:37px;margin-top: 20px;font-size: 20px"><b><?= $c+$lal ?></b></p></td>


            </tr>
        </table>

    </div>

<?php }?>
<table style="padding: 1px;margin-top: -18px">
    <tr>
        <td class="tab_kat7" style="padding: 2px">
        <input type="text" value="7" hidden name="kat">
        <input type="text" value="<?=Yii::$app->request->post('stolid')?>" hidden name="stolid">                   
        <button  class="btn-primary" style="font-size: 23px;width: 40px"><i class="fa fa-cutlery" aria-hidden="true"></i></button></td>
        
        <td class="tab_kat11" style="padding: 2px"><input type="text" value="11" hidden name="kat">
        <input type="text" value="<?=Yii::$app->request->post('stolid')?>" hidden name="stolid">
        <button class="btn-primary" style="font-size: 23px;width: 40px"><i class=" fa fa-leaf" aria-hidden="true"></i></button></td>

        <td class="tab_kat9" style="padding: 2px"><input type="text" value="9" hidden name="kat">
        <input type="text" value="<?=Yii::$app->request->post('stolid')?>" hidden name="stolid">
        <button class="btn-primary" style="font-size: 23px;width: 40px"><i class="fa fa-birthday-cake" aria-hidden="true"></i></button></td>
        
        <td class="tab_kat8" style="padding: 2px"><input type="text" value="8" hidden name="kat">
        <input type="text" value="<?=Yii::$app->request->post('stolid')?>" hidden name="stolid">
        <button class="btn-primary" style="font-size: 23px;width: 40px"><i class="fa fa-glass" aria-hidden="true"></i></button></td>
        
        <td class="tab_kat12" style="padding: 2px">
        <input type="text" value="12" hidden name="kat">
        <input type="text" value="<?=Yii::$app->request->post('stolid')?>" hidden name="stolid">
        <button class="btn-primary" style="font-size: 23px;width: 40px"><i class="fa fa-magic"></i></button></td>

        <td class="tab_kat10" style="padding: 2px">
        <input type="text" value="10" hidden name="kat">
        <input type="text" value="<?=Yii::$app->request->post('stolid')?>" hidden name="stolid">
        <button class="btn-primary" style="font-size: 23px;width: 40px"><i class="fa fa-coffee"></i></button></td>

        <td style="padding: 2px"><button class="btn-primary" style="font-size: 23px;width: 40px"><i class="fa fa-ellipsis-h"></i></button></td>
    </tr>
</table>

<div  style="background-color: white; padding: 3px">

        
        <?php
        $date = date("Y-m-d");
        $katg = 7;
        $s1 = \frontend\models\Asos::find()->where(['sana'=>$date])->andWhere(['print_flag'=>0])->andWhere(['mobil'=>Yii::$app->request->post('stolid')])->andWhere(['>','diler_id',0])->one();
       ?>
        <table id="kategoriya7" style="padding: 1px;display:block">
 
            <?php $i=0; foreach ($query as $ite ){ $i++?>
                
                <tr id="<?=$ite['ids']?>" class='qator-<?=$ite['ids']?>'>                
                    <td>              
                    <input type="text" hidden value="<?=$ite->kolin?>" name="tkolin">
                    <input type="text" hidden value="<?=$ite->kns?>" name="tkol">
                    <input type="text" hidden value="<?=$ite->idt?>" name="tavarid" >
                    <input type="text" hidden value="<?=$s1['id']?>" name="asosid" >
                    <input type="text" hidden value="<?=$ite['ids']?>" name="idsup" >
                    <input type="text" hidden value="<?=$ite['kolin']?>" name="kolinjoriy" >
                    <input type="text" hidden value="<?=$ite['kns']?>" name="koljoriy" >
                </td>    
                <td class="tovar_for_plus"><button class="btn btn-default form-control" style="height: 42px"><b id="sizep"><?=$ite->nom?></b></button>
                </td>
                <td style="padding: 3px; text-align: center"  nowrap>
                    <div class="quantity">
                        <button id="sizep" class="plus-btn" type="button" name="button">+</button>
                        <input id="sizep" style="width: 50px; margin:  0px 5px 0px 5px; text-align: center" max="<?=$ite->kns?>" type="number" name="asosiyson" value="1">
                        <button class="minus-btn" id="sizep" type="button" name="button">-</button>
                    </div> 
                    <?php if($ite['kolin'] > 1000){?>
                        <div class="quantity" style="margin-top: 3px">

                              <button id="sizep" class="plus-btn" type="button" name="button">
                                  +
                              </button>
                              <input id="sizep" style="width: 50px; margin:  0px 5px 0px 5px; text-align: center" max="1000" type="number" name="ichkison" value="0">
                              <button id="sizep" class="minus-btn" type="button" name="button">
                                  -
                              </button>
                              <input type="text" value="<?= $ite['tkol_in']?>" hidden name="tkolin">
                              <input type="text" value="<?= $ite['ids']?>" hidden name="tkolinost">
                        </div>
                    <?php }?>
                </td>
                <td>   
                    <input type="text" name="tavarnomi" value="<?=$ite->nom?>" hidden>
                    <input type="text" name="stolid" value="<?=Yii::$app->request->post('stolid')?>" hidden>
                    <input type="text" value="<?=$ite->sot?>" name="sot" hidden> 
                    <input type="text" hidden value="<?=$ite->kns?>" name="kololdin">
                    <input type="text" hidden value="<?=$ite->kolin?>" name="kolinoldin">
                </td>               
                <?php if($ite['tkol_in'] > 1100000){?>
                </tr><tr>
                    <td style="font-size: 13px;padding: 3px;color: ">Ichki: <b style="color: red"><?=$ite->kolin?></b> ta | <b style="color: red"><?=$ite->sotin?></b><input type="text" value="<?=$ite->sotin?>" hidden name="sotin"> sum</td> 
                </tr><tr>
                <?php }?>
                
                </tr>
                
                <?php if($ite['kat'] != $katg){?>
                    </table>
                    <?php echo '<table id="kategoriya'.$ite['kat'].'" style="padding: 1px;display:none">';?>
                <?php }?>
                <?php $katg=$ite['kat'];?>
               
            <?php }?>
        </table>

</div>
<div id="tovaradd-form" title="Ovqat tanlash">
    <form>
        <div style="padding: 10px;">
        <label id="tidedit">tyvar nomi <b><span style='padding-left: 10px;'></span></b></label>
        <label id="aid">Chek № <b><span style='padding-left: 10px;'></span></b></label>
        <label>Stol <b><span id="mnom" style='padding-left: 10px;'></span></b></label>
    </form>
</div>


<script type="text/javascript">
    $('.tab_kat7').bind('click', function(e){
        e.preventDefault();
       var data = $(this).serialize();
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/site/page' ?>' ,
            type: 'POST',
            data: {searchname: $("#kat").val() , searchby:$("#stolid").val()},
            success: function(data){
                //console.log(data);
                //alert(data);
                document.getElementById("kategoriya7").style.display='block';
                document.getElementById("kategoriya8").style.display='none';
                document.getElementById("kategoriya9").style.display='none';
                document.getElementById("kategoriya10").style.display='none';
                document.getElementById("kategoriya11").style.display='none';
                document.getElementById("kategoriya12").style.display='none';
            },
            error: function(){
                alert('Xatolik yuz berdi. qaytadan urunub ku`ring!');
            }
        });
        return false;
    });
    $('.tab_kat8').bind('click', function(e){
        e.preventDefault();
       var data = $(this).serialize();
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/site/page' ?>' ,
            type: 'POST',
            data: {searchname: $("#kat").val() , searchby:$("#stolid").val()},
            success: function(data){
                //console.log(data);
                //alert(data);
                document.getElementById("kategoriya7").style.display='none';
                document.getElementById("kategoriya8").style.display='block';
                document.getElementById("kategoriya9").style.display='none';
                document.getElementById("kategoriya10").style.display='none';
                document.getElementById("kategoriya11").style.display='none';
                document.getElementById("kategoriya12").style.display='none';
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    });
    $('.tab_kat9').bind('click', function(e){
        e.preventDefault();
       var data = $(this).serialize();
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/site/page' ?>' ,
            type: 'POST',
            data: {searchname: $("#kat").val() , searchby:$("#stolid").val()},
            success: function(data){
                //console.log(data);
                //alert(data);
                document.getElementById("kategoriya7").style.display='none';
                document.getElementById("kategoriya8").style.display='none';
                document.getElementById("kategoriya9").style.display='block';
                document.getElementById("kategoriya10").style.display='none';
                document.getElementById("kategoriya11").style.display='none';
                document.getElementById("kategoriya12").style.display='none';
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    });
    $('.tab_kat10').bind('click', function(e){
        e.preventDefault();
       var data = $(this).serialize();
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/site/page' ?>' ,
            type: 'POST',
            data: {searchname: $("#kat").val() , searchby:$("#stolid").val()},
            success: function(data){
                //console.log(data);
                //alert(data);
                document.getElementById("kategoriya7").style.display='none';
                document.getElementById("kategoriya8").style.display='none';
                document.getElementById("kategoriya9").style.display='none';
                document.getElementById("kategoriya10").style.display='block';
                document.getElementById("kategoriya11").style.display='none';
                document.getElementById("kategoriya12").style.display='none';
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    });
    $('.tab_kat11').bind('click', function(e){
        e.preventDefault();
       var data = $(this).serialize();
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/site/page' ?>' ,
            type: 'POST',
            data: {searchname: $("#kat").val() , searchby:$("#stolid").val()},
            success: function(data){
                //console.log(data);
                //alert(data);
                document.getElementById("kategoriya7").style.display='none';
                document.getElementById("kategoriya8").style.display='none';
                document.getElementById("kategoriya9").style.display='none';
                document.getElementById("kategoriya10").style.display='none';
                document.getElementById("kategoriya11").style.display='block';
                document.getElementById("kategoriya12").style.display='none';
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    });
    $('.tab_kat12').bind('click', function(e){
        e.preventDefault();
       var data = $(this).serialize();
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/site/page' ?>' ,
            type: 'POST',
            data: {searchname: $("#kat").val() , searchby:$("#stolid").val()},
            success: function(data){
                //console.log(data);
                //alert(data);
                document.getElementById("kategoriya7").style.display='none';
                document.getElementById("kategoriya8").style.display='none';
                document.getElementById("kategoriya9").style.display='none';
                document.getElementById("kategoriya10").style.display='none';
                document.getElementById("kategoriya11").style.display='none';
                document.getElementById("kategoriya12").style.display='block';
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    });
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

    $('.12fa fa-cutlery').on('click', function(e) {
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
<script>
$(function() {
    $("#tovaradd:ui-dialog").dialog("destroy");
    $("#tovaradd-form").dialog({
        autoOpen: false,height: 250,width: 350,modal: true,buttons:{
            "Ha, aniq qaytarib olaman": function() {
            var natija = $("#natija");id_ = $("#idvernut").val();
                                         
            $( this ).dialog( "close" );natija.hide(3000);  
            },"Bekor qilish": function() {$( this ).dialog( "close" );}
        },
        close: function() {}
    });    
    $(".tovar_for_plus").bind('click',function (e) {
        e.preventDefault();
        
        var sid = $(this).attr("id");
        var aid = $(this).parent().attr("id");

        $("#tidedit").val("id");
        alert('sd');
        $("#tovaradd-form").dialog("open");
    });

});
</script>

<?php if(Yii::$app->getUser()->identity->dyum==11){?>
<style>
    #tr{

        width: 400px;
    }
   #sizep{

       font-size: 30px;
       margin: 4px;
   }
</style>
<?php }?>
<?php if(Yii::$app->getUser()->identity->dyum==5){?>
    <style>
        #tr{

            width: 200px;
        }
        #but{

            font-size: 18px;
        }
        #sizep{

            font-size: 10px;

        }
    </style>
<?php }?>
<?php if(Yii::$app->getUser()->identity->dyum==7){?>
    <style>
        #tr{

            width: 400px;
        }
        #del{

            font-size:16px 
        }
        #sizep{

            font-size: 20px;
            
        }
    </style>

<?php }?>
