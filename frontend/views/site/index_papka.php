<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\Asos;
$this->title = '';
$model = \frontend\models\STovar::find()->andWhere(['del_flag'=>1])->all();
$data = \yii\helpers\ArrayHelper::map($model,'id','nom');
$this->registerAssetBundle(yii\web\JqueryAsset::className(), \yii\web\View::POS_HEAD);
$s = \frontend\models\Asos::find()->Where(['print_flag'=>0])->andWhere(['del_flag'=>1])->andWhere(['>','diler_id',0])->andWhere(['mobil'=>Yii::$app->request->post('stolid')])->andWhere(['user_id'=>Yii::$app->getUser()->id])->one();
$ss = \frontend\models\AsosSlave::find()->where(['asos_id'=>$s['id']])->andWhere(['del_flag'=>1])->one();

if($ss['id'] == null){ ?>
<?php ActiveForm::begin(['action'=>['site/kabina']])?>
     <input type="text" hidden name="delqil" value="<?=$s['id']?>">
     <button class="btn btn-danger">Xonani bo`shatish</button>
     <br><br>

<?php ActiveForm::end()?>
<?php }
else{
    ?>
    <div class="panel panel-default" style="padding: 5px; margin-top: -20px">
        <table>
            <?php $i=0;
            foreach ($sotil as $sot){ $i++?>
                <?php if($sot->zakaz == NUll) {?>
                    <?php $t= '<p id="del" style="color: #cecc05">' .mb_substr($sot->tovar_nom,0,40).' ( '.$sot->kol.' x '.$sot->sotish.' )</p>';?>
                <?php }?>
                <?php if($sot->zakaz ==!null and $sot->zakaz_see==0) {?>
                    <?php $t='<p id="del" style="color: green">'     .mb_substr($sot->tovar_nom,0,40).' ( '.$sot->kol.' x '.$sot->sotish.' )</p>';?>
                <?php }?>
                <?php if($sot->zakaz_see==1) {?>
                    <?php $t= '<p id="del" style="color: #17d8ff">' .mb_substr($sot->tovar_nom,0,40).' ( '.$sot->kol.' x '.$sot->sotish.' )</p>';?>
                <?php }?>
                <?php if($sot->zakaz_see==2) {?>
                    <?php $t='<p id="del" style="color: blue">'   .mb_substr($sot->tovar_nom,0,40).' ( '.$sot->kol.' x '.$sot->sotish.' )</p>';?>
                <?php }?>
                <tbody style="">
                <tr id="tr">
                    <th style=" margin-top: 17px; padding: 5px 5px 5px 0px  scope='row'">
                        <?php \yii\bootstrap\Modal::begin([
                            'header' => '<h2>'.$sot->tovar_nom.'</h2><h4 >Narhi <b style="color:red">'.(int)$sot->sotish.'</b> so`m</h4><button type="button" id="'.$sot['id'].'" style="font-size: 30px"  class="Saqlash_qr">Buyurtma</button>',
                            'id' => $sot->id,'class' => 'okno_k','size' => 'modal-lg',
                            'toggleButton' => ['label' => $t,'id' => 'sizeqr','tag'=>'button','class' => 'k_t_nom'.$sot['id'],
                            ],
                            'footer' => '',
                        ]);
                        ?>
                        <input type="text"   hidden name="k_tovar" value="<?=$sot['tovar_nom']?>" class="k_tovar<?=$sot['id']?>">
                        <input type="number" hidden name="k_sotish" value="<?=$sot['sotish']?>" class="k_sotish<?=$sot['id']?>">
                        <input type="number" hidden name="kol_old" value="<?=$sot['kol']?>" class="kol_old<?=$sot['id']?>">
                        <input type="number" hidden name="s_id_new" value="<?=$sot['id']?>" class="s_id_new<?=$sot['id']?>">
                        <input type="number" hidden name="s_id_old" value="<?=$sot['kol_ost']?>" class="s_id_old<?=$sot['id']?>">
                        <div class="quantity">
                            <button id="sizep" class="plus-btn" type="button" name="button">+</button>
                            <input id="sizep" style="width: 150px; margin:  0px 5px 0px 5px; text-align: center" type="number" name="asosiyson" value="<?=$sot['kol']?>" class="kol_new<?=$sot['id']?>">
                            <button class="minus-btn" id="sizep" type="button" name="button">-</button>
                        </div><BR>
                        Izoh <input type="text" value="<?=$sot->polka?>" name="polka" class="izoh<?=$sot['id']?>">
                        <?php \yii\bootstrap\Modal::end(); ?>
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
                <?php ActiveForm::begin(['action'=>['/site/karzina']])?>
                <?php if($sot->kol==0){
                }
                else{
                ?>
                    <?php $a= $sot->kol * $sot->sotish;$c+= $a;$e= $sot->kol;$f= $sot->kol_in;$h+=$e;$l+=$f;?>
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
                    $s = \frontend\models\Asos::find()->where(['sana'=>$date])->andWhere(['del_flag'=>1])->andWhere(['print_flag'=>0])->andWhere(['mobil'=>Yii::$app->request->post('stolid')])->andWhere(['>','diler_id',0])->andWhere(['user_id'=>Yii::$app->getUser()->id])->one();
                    $klient = \frontend\models\SClient::find()->where(['id'=>Yii::$app->getUser()->identity->client_id])->one();
                    $garpil= $klient['garaj']+1;
                    ?>
                    <input type="text" hidden value="<?=$garpil?>" name="garaj">
                    <input type="text" hidden value="<?=$s['id']?>" name="andnac">
                    <input type="text" hidden value="<?= Yii::$app->request->post('stolid')?>"  name="stolid">
                    <button class=" btn-info" onclick="return confirm('Saqlansinmi?')" style="margin-top: 10px; font-size: 22px;width: 50px"><i class="fa fa-check-square-o"></i></button>
                    <?php ActiveForm::end()?>
                </td>

                <td style="padding: 1px">
                    <?php ActiveForm::begin(['action'=>['/site/karzina']])?>
                    <?php
                    $date = date("Y-m-d");
                    $s = \frontend\models\Asos::find()->where(['sana'=>$date])->andWhere(['del_flag'=>1])->andWhere(['print_flag'=>0])->andWhere(['mobil'=>Yii::$app->request->post('stolid')])->andWhere(['>','diler_id',0])->andWhere(['user_id'=>Yii::$app->getUser()->id])->one();
                    ?>
                    <input type="text" hidden value="<?=$s['id']?>" name="andchek">
                    <button class="btn-primary" onclick="return confirm('Chek chiqarilsinmi?')" style="margin-top: 10px; font-size: 22px;width: 55px"><i class="fa fa-flag"></i></button>
                    <?php ActiveForm::end()?>
                </td>
                <td style="padding: 1px">
                    <?php ActiveForm::begin(['action'=>['/site/karzina']])?>
                    <?php
                    $date = date("Y-m-d");
                    $s = \frontend\models\Asos::find()->where(['sana'=>$date])->andWhere(['del_flag'=>1])->andWhere(['print_flag'=>0])->andWhere(['>','diler_id',0])->andWhere(['user_id'=>Yii::$app->getUser()->id])->one();
                    ?>
                    <input type="text" hidden value="<?=$s['id']?>" name="andnacdel">
                    <input type="text" name="stolid" value="<?=Yii::$app->request->post('stolid')?>" hidden>
                    <button hidden class=" btn-danger"  onclick="return confirm('Tozalansinmi yoki?')" style="margin-top: 10px; font-size: 22px;width: 55px"> <i class="fa fa-close"></i></button>
                    <?php ActiveForm::end()?>
                </td>
                <td style="padding: 1px;"><p style="padding: 1px;background-color: red;color: white;height:37px;margin-top: 20px;font-size: 20px"><b><?= round($c+$c*$s['xizmat_foiz']/100,-2)?></b></p></td>
                <td><a style="margin-top: 9px;height: 37px" href="#15" class="btn btn-default"><img src="/frontend/web/images/iconup.png" style="width: 28px"></a></td>
            </tr>
    </table>
    
    </div>

<?php }?>
<input hidden type="text"  value="" class="lastpapka">
<table style="padding: 1px;margin-top: -18px" id="15">
    <tr>
        <td class="tab_kat7" style="padding: 2px">
        <input type="text" value="7" hidden name="kat">
        <input type="text" value="<?=Yii::$app->request->post('stolid')?>" hidden name="stolidqr">
        <button class="btn-primary" style="font-size: 23px;width: 40px"><i class="fa fa-cutlery" aria-hidden="true"></i></button></td>

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

<div style="background-color: white; padding: 1px" id='divtovar'>
    <?php  $date = date("Y-m-d");$ustun=1;$katg = 7;$papka_one = 0;$papkanom = '';$firstpapkanom='';
    $s1 = \frontend\models\Asos::find()->where(['sana'=>$date])->andWhere(['del_flag'=>1])->andWhere(['print_flag'=>0])->andWhere(['mobil'=>Yii::$app->request->post('stolid')])->andWhere(['>','diler_id',0])->one();
   ?>
    <table id="kategoriya7" style="display:block">
    <tr>
    <?php $i=0; foreach ($query as $ite ){ $i++?>
        <?php


        if($firstpapkanom == ''){$firstpapkanom = $ite['papkanom'];$firstpapka = $ite['papka'];}     
        if(($papkanom == $ite['papkanom'] and $ite['papkanom']!='Tovar') and $papka_one != 0){$papka_one = 0;}
        if(($papkanom <> $ite['papkanom'] and $ite['papkanom']!='Tovar') ){$papka_one = 1;}
        if($ite['papkanom']=='Tovar' ){$papka_one = 2;}
        $papkanom = $ite['papkanom'];
        //echo $papka_one; 
        if($papka_one == 1  || $papka_one == 2){?>
            
             
            <?php if($ite['kat'] != $katg){?>
                </table> <?php $ustun=1;?>
                <?php echo '<table id="kategoriya'.$ite['kat'].'" style="padding: 1px;display:none">';?>
            <?php }?>
            <?php $katg=$ite['kat'];?>
            <?php if($ustun==0) {?> <tr> <?php }?>
            <td>
            <?php if($ite['papkanom']=='Tovar') {//Qoldiq = <b style= "color:red">'.$ite['kns'].'</b> dona,
             \yii\bootstrap\Modal::begin([
                'header' => '<h2>'.$ite['nom'].'</h2><h4 >Narhi <b style="color:red">'.(int)$ite['sot'].'</b> so`m</h4> <button type="button" id="'.$ite['ids'].'" style="font-size: 30px"  class="Saqlash">Buyurtma</button>',
                'id' => $ite['ids'],'class' => 'okno','size' => 'modal-lg',
                'toggleButton' => ['label' => $ite->nom_sh,'id' => 'sizetd','tag'=>'button',
                'class' => 'tovar_nom'.$ite['ids'],],
                'footer' => '',]); ?>
                <input type="text" hidden class="tkolinid" value="<?=$ite->kolin?>" name="tkolin">
                <input type="text" hidden value="<?=$ite->idt?>" id="tovarid" class="tovarid<?=$ite['ids']?>" name="tovarid">
                <input type="text" hidden value="<?=$ite->sot?>" id="sot" class="sot<?=$ite['ids']?>" name="sot">
                <input type="text" hidden value="<?=$ite->nom_sh?>" id="nom" class="nom<?=$ite['ids']?>" name="nom">
                <input type="text" hidden value="<?=$s1['id']?>" class="asosid<?=$ite['ids']?>" name="asosid">
                <input type="text" hidden value="<?=$ite['ids']?>" class="idsup<?=$ite['ids']?>" name="idsup">
                <input type="text" hidden value="<?=$ite['kolin']?>" name="kolinjoriy">
                <input type="text" hidden value="<?=$ite['kns']?>" class="kns<?=$ite['ids']?>" name="koljoriy">
                <input type="text" hidden value="<?=Yii::$app->request->post('stolid')?>" class="stolid<?=$ite['ids']?>" name="stolid">
                <div class="quantity">
                    <button id="sizep" class="plus-btn" type="button" name="button">+</button>
                    <input id="sizep" style="width: 150px; margin:  0px 5px 0px 5px; text-align: center" max="<?=$ite->kns?>" type="number" name="asosiyson" value="1" class="kol<?=$ite['ids']?>">
                    <button class="minus-btn" id="sizep" type="button" name="button" class="izoh<?=$ite['ids']?>">-</button>
                </div><BR>
                Izoh <input type="text" value="<?=$ite->polka?>" name="polka">
                <?php \yii\bootstrap\Modal::end(); ?>
            <?php }
            else
            {
                if($papka_one == 1){     
                    echo '<button type="button" id="'.$ite['papka'].'"  class="papka">'.$ite['papkanom'].'</button></td>';
                }
            }
            ?>
            <td>
            <?php if($ustun==2) {?><?php $ustun=0;?></tr><?php }?>
            <?php $ustun=$ustun+1;?>
        <?php }?> 
    <?php }?>
        
    </table>
</div>
<div style="background-color: white; padding: 1px " class='divpapka'>
<table  style = "border: 1px solid black;display:none" id="katalog<?=$firstpapka?>" >

<?php $papkanom=$firstpapkanom;$ustun=1; $papka_one = 1;$i=0; foreach ($query as $ite ){ $i++?>

<?php  //  papka ichkarisi
    if($ite['papkanom'] != "Tovar"){
        if($ite['papkanom'] != $papkanom){?>    </tr></table>
            <?php $ustun=1;
            echo '<table style = "border: 1px solid black;padding: 1px;display:none" id="katalog'.$ite['papka'].'"><tr>';}?>
        <?php $papkanom=$ite['papkanom'];?>
        <?php if($ustun==0) {?> <tr> <?php }?>
        <td>
        <?php \yii\bootstrap\Modal::begin([
            'header' => '<h2>'.$ite['nom'].'</h2><h4 >Narhi <b style="color:red">'.(int)$ite['sot'].'</b> so`m</h4><button type="button" id="'.$ite['ids'].'" style="font-size: 30px"  class="Saqlash">Buyurtma</button>',
            'id' => 'papka'.$ite['ids'],'class' => 'okno','size' => 'modal-lg',
            'toggleButton' => ['label' => $ite->nom_sh,'id' => 'sizetd','tag'=>'button',
            'class' => 'tovar_nom'.$ite['ids'],],
            'footer' => '',]); ?>
        <input type="text" hidden class="tkolinid" value="<?=$ite->kolin?>" name="tkolin">
        <input type="text" hidden value="<?=$ite->idt?>" id="tovarid" class="tovarid<?=$ite['ids']?>" name="tovarid">
        <input type="text" hidden value="<?=$ite->sot?>" id="sot" class="sot<?=$ite['ids']?>" name="sot">
        <input type="text" hidden value="<?=$ite->nom_sh?>" id="nom" class="nom<?=$ite['ids']?>" name="nom">
        <input type="text" hidden value="<?=$s1['id']?>" class="asosid<?=$ite['ids']?>" name="asosid">
        <input type="text" hidden value="<?=$ite['ids']?>" class="idsup<?=$ite['ids']?>" name="idsup">
        <input type="text" hidden value="<?=$ite['kolin']?>" name="kolinjoriy">
        <input type="text" hidden value="<?=$ite['kns']?>" class="kns<?=$ite['ids']?>" name="koljoriy">
        <input type="text" hidden value="<?=Yii::$app->request->post('stolid')?>" class="stolid<?=$ite['ids']?>" name="stolid">
        
        
        <div class="quantity">
            <button id="sizep" class="plus-btn" type="button" name="button">+</button>
            <input id="sizep" style="width: 150px; margin:  0px 5px 0px 5px; text-align: center" max="<?=$ite->kns?>" type="number" name="asosiyson" value="1" class="kol<?=$ite['ids']?>">
            <button class="minus-btn" id="sizep" type="button" name="button" class="izoh<?=$ite['ids']?>">-</button>
        </div><BR>
        Izoh <input type="text" value="<?=$ite->polka?>" name="polka">
        <?php \yii\bootstrap\Modal::end(); ?>
        
        </td>
        <?php if($ustun==2) {?><?php $ustun=0;?></tr><?php }?>
        <?php $ustun=$ustun+1;?>

        
    <?php }?>


<?php }?>
</table>
</div>
<script type="text/javascript">
$('.papka').bind('click', function(e){
    e.preventDefault();
    var data = $(this).serialize();jid=$(this).attr('id');

    document.getElementById("divtovar").style.display='none';
    document.getElementById("katalog" + jid).style.display='block';
    $('.lastpapka').val(jid);
});    
$('.Saqlash').on('click', function(e){
    e.preventDefault();
    var data = $(this).serialize();
    var jid=$(this).attr('id');
    $.ajax({url: '<?php echo Yii::$app->request->baseUrl. '/site/tovaradd' ?>' ,
        type: 'POST',
        data: {k_izoh:$(".k_izoh"+jid).val(),sot:$(".sot"+jid).val(),nom:$(".nom"+jid).val(),kns:$(".kns"+jid).val(),kol:$(".kol"+jid).val(),stolid:$(".stolid"+jid).val(),asosid:$(".asosid"+jid).val(),idsup:$(".idsup"+jid).val(),tid:$(".tovarid"+jid).val()},
        success: function(data){
            if(data==0)
            {
                alert('Tovar soni kam');
            }
            else
            {
                $(".tovar_nom"+jid).css("color",'blue');$('.modal').modal('hide');}
            }
        ,error: function(){
            $(".tovar_nom"+jid).css("color",'red');
            $('.modal').modal('hide');
        }
    });
    return false;
});
$('.Saqlash_qr').on('click', function(e){
    e.preventDefault();
    var data = $(this).serialize();
    var jid=$(this).attr('id');
    kol_newv=$(".kol_new"+jid).val();
    $.ajax({
        url: '<?php echo Yii::$app->request->baseUrl. '/site/tovaredit' ?>',
        type: 'POST',
        data: {kol_new:kol_newv,kol_old:$(".kol_old"+jid).val(),s_id_new:$(".s_id_new"+jid).val(),s_id_old:$(".s_id_old"+jid).val()},
        success: function(data){
            if (data >= 0) {
                $t = '<p id="del" >'+$(".k_tovar" + jid).val()+' ( '+kol_newv+' x '+$(".k_sotish" + jid).val()+' )</p>';
                //$(".k_t_nom" + jid).css("color", 'blue');
                $(".k_t_nom"+jid).html($t);
                $('.modal').modal('hide');
            }
            else {
                alert('Tovar soni kam = ' + data);
            }
        }
       ,error: function(){
            $(".k_t_nom"+jid).css("color",'red');
        }
    });
    return false;
});
$('.tab_kat7').bind('click', function(e){
    e.preventDefault();

   if($('.lastpapka').val()!=''){
    var lastpapka=$('.lastpapka').val();
     document.getElementById("katalog" + lastpapka).style.display='none';
    }

    document.getElementById("divtovar").style.display='block';
    document.getElementById("kategoriya7").style.display='block';
    document.getElementById("kategoriya8").style.display='none';
    document.getElementById("kategoriya9").style.display='none';
    document.getElementById("kategoriya10").style.display='none';
    document.getElementById("kategoriya11").style.display='none';
    document.getElementById("kategoriya12").style.display='none';
});
$('.tab_kat8').bind('click', function(e){
    e.preventDefault();
    
    if($('.lastpapka').val()!=''){
    var lastpapka=$('.lastpapka').val();
     document.getElementById("katalog" + lastpapka).style.display='none';
    }
    
    document.getElementById("divtovar").style.display='block';
    document.getElementById("kategoriya7").style.display='none';
    document.getElementById("kategoriya8").style.display='block';
    document.getElementById("kategoriya9").style.display='none';
    document.getElementById("kategoriya10").style.display='none';
    document.getElementById("kategoriya11").style.display='none';
    document.getElementById("kategoriya12").style.display='none';
});
$('.tab_kat9').bind('click', function(e){
    e.preventDefault();
    
    if($('.lastpapka').val()!=''){
    var lastpapka=$('.lastpapka').val();
     document.getElementById("katalog" + lastpapka).style.display='none';
    }
    
    document.getElementById("divtovar").style.display='block';
    document.getElementById("kategoriya7").style.display='none';
    document.getElementById("kategoriya8").style.display='none';
    document.getElementById("kategoriya9").style.display='block';
    document.getElementById("kategoriya10").style.display='none';
    document.getElementById("kategoriya11").style.display='none';
    document.getElementById("kategoriya12").style.display='none';
});
$('.tab_kat10').bind('click', function(e){
    e.preventDefault();
    if($('.lastpapka').val()!=''){
    var lastpapka=$('.lastpapka').val();
     document.getElementById("katalog" + lastpapka).style.display='none';
    }
    document.getElementById("divtovar").style.display='block';
    document.getElementById("kategoriya7").style.display='none';
    document.getElementById("kategoriya8").style.display='none';
    document.getElementById("kategoriya9").style.display='none';
    document.getElementById("kategoriya10").style.display='block';
    document.getElementById("kategoriya11").style.display='none';
    document.getElementById("kategoriya12").style.display='none';
});
$('.tab_kat11').bind('click', function(e){
    e.preventDefault();
    if($('.lastpapka').val()!=''){
    var lastpapka=$('.lastpapka').val();
     document.getElementById("katalog" + lastpapka).style.display='none';
    }
    
    document.getElementById("divtovar").style.display='block';
    document.getElementById("kategoriya7").style.display='none';
    document.getElementById("kategoriya8").style.display='none';
    document.getElementById("kategoriya9").style.display='none';
    document.getElementById("kategoriya10").style.display='none';
    document.getElementById("kategoriya11").style.display='block';
    document.getElementById("kategoriya12").style.display='none';
    return false;
});
$('.tab_kat12').bind('click', function(e){
    e.preventDefault();
    
   if($('.lastpapka').val()!=''){
    var lastpapka=$('.lastpapka').val();
     document.getElementById("katalog" + lastpapka).style.display='none';
    }
    
    document.getElementById("divtovar").style.display='block';
    document.getElementById("kategoriya7").style.display='none';
    document.getElementById("kategoriya8").style.display='none';
    document.getElementById("kategoriya9").style.display='none';
    document.getElementById("kategoriya10").style.display='none';
    document.getElementById("kategoriya11").style.display='none';
    document.getElementById("kategoriya12").style.display='block';
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

<?php if(Yii::$app->getUser()->identity->dyum==11){?>
    <style>
        #tr{

            width: 150px;
        }
        #del{

            font-size:35px
        }
        #sizep{
            margin: 2px;
            font-size: 500px;

        }
        #sizetd{
            margin: 3px;
            font-size: 25px;
            font-weight:bold;
            width:270px;
        }
        #sizeqr{
            margin: 3px;
            font-size: 25px;
            font-weight:bold;
            width:480px;
            text-align: left;
        }
        .papka{
            margin: 3px;
            font-size: 25px;
            font-weight:bold;
            width:270px;
            color:green;
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
        #del{

            font-size:21px
        }
        #sizep{
            margin: 4px;
            font-size: 50px; 

        }
        #sizetd{
            margin: 5px;
            font-size: 18px;
            font-weight:bold;
            width:145px;
        }
        #sizeqr{
            margin: 5px;
            font-size: 18px;
            font-weight:bold;
            text-align: left;
            width:270px;
        }
        .papka{
            margin: 5px;
            font-size: 18px;
            font-weight:bold;
            text-align: left;
            width:145px;
            color:green;
        }
    </style>
<?php }?>
<?php if(Yii::$app->getUser()->identity->dyum==7){?>
    <style>
        #tr{

            width: 150px;
        }
        #del{

            font-size:18px
        }
        #sizep{
            margin: 2px;
            font-size: 22px;

        }
        #sizetd{
            margin: 3px;
            font-size: 18px;
            font-weight:bold;
            width:150px;
        }
         #sizeqr{
            margin: 5px;
            font-size: 18px;
            font-weight:bold;
            text-align: left;
            width:270px;
        }
        .papka{
            margin: 3px;
            font-size: 18px;
            font-weight:bold;
            color:green;

            width:150px;
        }
    </style>
<?php }?>
