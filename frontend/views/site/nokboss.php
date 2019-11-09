<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\Asos;
use frontend\models\AsosSlave;
use frontend\models\User;
use kartik\date\DatePicker;
$this->title="3";
$date = date('Y-m-d');
?>
<div class="client-qarz">
    <div class="row">
        <?php ActiveForm::begin()?>
        <div class="col-md-3 client-qarz__date">
            <?php
            echo DatePicker::widget([
                'name' => 'date1',
                'value' => Yii::$app->request->post('date1')?Yii::$app->request->post('date1'):date('Y-m-d'),
                'options' => ['placeholder' => 'Sanani tanlang...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>

        <div class="col-md-1 client-qarz__button">
            <button type="submit" class="btn btn-primary">Qidirish</button>
        </div>
        <?php ActiveForm::end()?>
    </div>


</div>

<div  style="text-align: center;margin: 2px; background-color: rgba(43,106,246,0.77);">
<table class="table table-bordered" id="users">
<tr><th>Стол</th><th>Чек №</th><th>Сана</th><th>Қат-ор</th><th>Жами</th><th>%</th></tr>
<?php
$i = 0;$summa = 0;$summaJami = 0;
foreach ($s as $item):
?>
<tr style="background-color:#B6E8F8;" id="<?=$item['id'];?>" class="chekqator-<?=$item['id'];?>">
  <td>
    <?php \yii\widgets\ActiveForm::begin(['action'=>['/site/kun']])?>
        <input type="text" value="<?=$item->id?>" name="asosid" hidden>
        <input type="text" value="<?=$item->diler_id?>" name="dilerid" hidden>
        <button class="btn btn-info form-control"  style="color: white">
           <?php
           $i++;$summa = $summa + $item['summa'];
           //$summaJami = $summaJami + $item['summa_ch'];
           $nom = \frontend\models\SMobil::find()->where(['id'=>$item->mobil])->one();

           $user = user::find()->where(['id'=>$item->user_id])->one();?>

           <?=$nom['nom']?></button><?=$user['username']?>
           <?php
           echo "<img id = 'img".$item['id']."' src=\"/images/down.png\" border=\"0\" style=\"cursor:pointer\" onclick=\"do_ajax_fnc(this,$item[id],$item[id],'divlk$item[id]')\"/>";
           ?>
  </td>
  <td>
    <input type="text" value="<?=$nom->nom?>" name="stol" hidden>
     <input type="text" value="<?=$item->summa_ch?>" name="summa_ch" hidden>
    <?php \yii\widgets\ActiveForm::end()?>
    <?=$item['diler_id']?>
  </td>
  <td>
    <?=$item['changedate']?>
  </td>
	<?php
  	$ss = AsosSlave::find()->where(['del_flag'=>1])->where('asos_id='.$item['id'])->all();
	$kol=0;$summa_all=0;
	foreach ($ss as $tem) {
		$kol=$kol+$tem['kol'];$summa_all=$summa_all+$tem['summa_all'];
	}
	$summa_all = $summa_all	+ $summa_all*$item['xizmat_foiz']/100;
    $summa_all = round($summa_all,-2);
	$summaJami = $summaJami + $summa_all;
  ?>
  <td><?=$kol?></td>
  <td class="sum<?=$item[id]?>"><?=$summa_all?></td>
  <td><?=$item['xizmat_foiz']?></td>
</tr>
<tr><td colspan=11>
<div id="divlk<?=$item[id]?>" style="visibility:hidden;display:none;background-color:#B6E8F8 ;">
<table class="mb-0 table table-hover">
	<tr id="<?=$item[id]?>">
        <td><a class="npb" href="#">Naqd</a></td><td><span class="ntxt<?=$item[id]?>"><?=$item['sum_naqd_ch']?></span></td>
        <td><input type="number" name="np" value="" class="nkirit<?=$item[id]?>"></td>
    </tr>
    <tr id="<?=$item[id]?>" >
        <td><a class="npb" href="#">Plastik</a></td><td><span class="ptxt<?=$item[id]?>"><?=$item['sum_plast_ch']?></span></td>
        <td><input type="number" name="hp" value="" class="pkirit<?=$item[id]?>"></td>
    </tr>
    <tr id="<?=$item[id]?>">
        <td><a class="npb" href="#">Bank</a></td><td><span class="btxt<?=$item[id]?>"><?=$item['sum_epos_ch']?></span></td>
        <td><input type="number" name="he" value="" class="bkirit<?=$item[id]?>"></td>
    </tr>
    <tr id="<?=$item[id]?>">
        <td>
            <button class="btn btn-success">Saqlash</button>
        </td>
        <td></td>

        <td>
        <i class="fa fa-refresh"  style="font-size:32px;color:red">yangilash</i>
        </td>
    </tr>
</table>
<table class="table table-bordered">
	<tr><td>Nomi</td><td>Soni</td><td>Narxi</td><td>Summasi</td><tr>
<?php foreach ($ss as $so){
?>
	<tr>
	<td><?= $so['tovar_nom']?></td>
	<td><?= $so['kol']?></td>
	<td><?= $so['sotish']?></td>
	<td><?= $so['summa_all']?></td>
	</tr>

<?php }?>
</table>
</div>
</td></tr>

<?php //echo "<tr><td colspan=\"11\"><div id=\"divlk$item[id]\" style=\"visibility:hidden;display:none;background-color:#B6E8F8 ;\"></div></td></tr>";
?>

<?php endforeach;?>
<th>Жами</th><th><?=$i?></th><th></th><th></th><th><?=$summaJami?></th>
</table>
</div>
<script type="text/javascript">
$('.fa-refresh').on('click', function(e){
        e.preventDefault();
        jid=$(this).parent().parent().attr('id');$summa=$(".sum"+jid).html();
        $nkirit=$(".nkirit"+jid).val();$pkirit=$(".pkirit"+jid).val();$bkirit=$(".bkirit"+jid).val();
        if($nkirit+$pkirit+$bkirit==''){alert('Summa kiritilmagan');}
        var summan = $(".sum"+jid).html();summan=0+summan;
        var nkiritn = $(".nkirit"+jid).val();nkiritn=0+nkiritn;
        if(nkiritn>summan){alert('Summa no`to`gri');}
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/site/nokboss' ?>',
            type: 'POST',
            data: {oper:"taqsimlash",jid:jid,summa:$(".sum"+jid).html(),nkirit:$nkirit,pkirit:$pkirit,bkirit:$bkirit},
            success: function(data){
                if($bu==="Naqd"){
                    $('.ntxt'+jid).text($(".sum"+jid).html());$('.ptxt'+jid).text('');$('.btxt'+jid).text('');
                }
                if($bu==="Plastik"){
                    $('.ptxt'+jid).text($(".sum"+jid).html());$('.ntxt'+jid).text('');$('.btxt'+jid).text('');
                }
                if($bu==="Bank"){
                    $('.btxt'+jid).text($(".sum"+jid).html());$('.ntxt'+jid).text('');$('.ptxt'+jid).text('');
                }
                //alert($bu);
            }
            ,error: function(){
                alert("xatolik yuz berdi !!!");
            }
        });
    });
    $('.npb').on('click', function(e){
        e.preventDefault();
        jid=$(this).parent().parent().attr('id');
        $bu=($(this).html());
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/site/nokboss' ?>',
            type: 'POST',
            data: {oper:$bu,jid:jid,summa:$(".sum"+jid).html(),nkirit:$(".nkirit"+jid).val(),pkirit:$(".pkirit"+jid).val(),bkirit:$(".bkirit"+jid).val()},
            success: function(data){
                if($bu==="Naqd"){
                    $('.ntxt'+jid).text($(".sum"+jid).html());$('.ptxt'+jid).text('');$('.btxt'+jid).text('');
                }
                if($bu==="Plastik"){
                    $('.ptxt'+jid).text($(".sum"+jid).html());$('.ntxt'+jid).text('');$('.btxt'+jid).text('');
                }
                if($bu==="Bank"){
                    $('.btxt'+jid).text($(".sum"+jid).html());$('.ntxt'+jid).text('');$('.ptxt'+jid).text('');
                }
                //alert($bu);
            }
            ,error: function(){
                alert("xatolik yuz berdi !!!");
            }
        });
    });
	function do_ajax_fnc(img,mid,flag,divname,och){
	  	divel = document.getElementById(divname);
		//if (!divel){return;}
		if (divel.style.visibility == 'visible') {
		    divel.style.visibility = 'hidden';
		    divel.style.display = 'none';
		    img.src = '/images/down.png';
		} else {
		 	divel.style.visibility = 'visible';
			divel.style.display = 'block';
			img.src = '/images/up.png';
		}
		if (och == 'N') {
		    divel.style.visibility = 'hidden';
		    divel.style.display = 'none';
		    img.src = '/images/down.png';
		}
        if (och == 'Y') {
		 	divel.style.visibility = 'visible';
			divel.style.display = 'block';
			img.src = '/images/up.png';
		}
		//if (divel.innerHTML == '') {
			url = "/site/divlistlk";
            //doajaxpost(divname,'Iltimos, bir oz kuting ...',mid,flag,url);
		//}
    }
</script>