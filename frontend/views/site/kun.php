<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\Asos;
use frontend\models\AsosSlave;

$this->title = "";?>
<div class="panel panel-default" style="padding: 10px">

<?php
	$kol=0;$summa_all=0;
	foreach ($s as $tem) {
		$kol=$kol+$tem['kol'];$summa_all=$summa_all+$tem['summa_all'];
	}
	$summa_all = $summa_all	+ $summa_all*$item['xizmat_foiz']/100;
  $summa_all = round($summa_all,-2);
	$summaJami = $summaJami + $summa_all;
  ?>

<h4 style="text-align: center; color: rgba(65,114,246,0.77)"><b>Чек № <?=Yii::$app->request->post('dilerid')?> , stol -  <?=Yii::$app->request->post('stol')?></b></h4>
<hr>
<?php $i=0;?>
<table class="table table-bordered">
	<tr><td>Nomi</td><td>Soni</td><td>Narxi</td><td>Summasi</td><tr>
<?php foreach ($s as $so){
?>
	<tr>
	<td><?= $so['tovar_nom']?></td>
	<td><?= $so['kol']?></td>
	<td><?= $so['sotish']?></td>
	<td><?= $so['summa_all']?></td>
	</tr>

<?php }?>
</table>
<hr>
    <?php
    if($s) {
        echo "<p style='color: whitesmoke;padding: 5px;width: 200px; background-color: red'>Jami sum: " .Yii::$app->request->post('summa_ch') . "</p>";
    }?>
</div>
<div class="panel panel-default" style="padding: 10px">
    <?php ActiveForm::begin(['action'=>['site/kun']])?>

<table class="mb-0 table table-hover">
	<tr>
        <td>Naqd</td><td><?=$a['sum_naqd_ch']?></td>
        <td><input  type="text" name="hn" value="<?=$a['sum_naqd_ch']?>"></td>      
    </tr>
    <tr>
        <td>Plastik</td><td><?=$a['sum_plast_ch']?></td>
        <td><input type="text" name="hp" value="<?=$a['sum_plast_ch']?>"></td>
    </tr>
    <tr>
        <td>Bank</td><td><?=$a['sum_epos_ch']?></td>
        <td><input type="text" name="he" value="<?=$a['sum_epos_ch']?>"></td>
    </tr>
    <tr>
        <td>
            <button class="btn btn-success">Saqlash</button>
            <input type="text" hidden name="asosid" value="<?=$a['id']?>">
        </td>
    </tr>
    <?php ActiveForm::end()?>
</table>


</div>	
