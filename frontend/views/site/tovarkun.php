<?php
use yii\bootstrap\ActiveForm;
use frontend\models\Asos;
use frontend\models\User;
use kartik\date\DatePicker;
$this->title="";
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

<style>
    .info-qarz{
        margin: 20px 0;
    }
    .info-qarz__item{
        display: inline-block;
    }
    .info-qarz__item label {
        text-align: right;
        width: 130px;
        margin-right: 12px;
    }
    .info-qarz__item span {
        display: inline-block;
        width: 120px;
        border: 1px solid #ccc;
        padding: 1px 4px;
        border-radius: 4px;
    }
    @media only screen and (max-width: 1280px) {
        .info-qarz__item{
            width: 49%;
        }
    }
    @media only screen and (max-width: 1086px) {
        .client-qarz__date, .client-qarz__select2, .client-qarz__button{
            padding-top: 2px;
            padding-bottom:2px;
        }
        .client-qarz__button{
            text-align: right;
        }
    }
    @media only screen and (max-width: 564px) {
        .info-qarz__item label {
            text-align: left;
            margin-right: 0;
        }
    }
</style>

<div  style="text-align: center;margin: 2px; background-color: rgba(43,106,246,0.77);">
<table class="table table-bordered">
  
<tr>
<th>Товар номи</th>
<th>Сони</th>
<th>Суммаси</th>
</tr>
<?php
$n = 0;$kol = 0;$summaJami = 0;
foreach ($s as $item):
  ?>
  <tr>
    <td>
     <input type="text" value="<?=$item->id?>" name="asosid" hidden>
          
     <?php
     $i++;$kol = $kol + $item['kol'];$summaJami = $summaJami + $item['summa_all'];
     ?>
     <?=$item['tovar_nom']?>
    <td>
      <?=$item['kol']?>
    </td>
    <td>
      <?=$item['summa_all']?>
    </td>
  </tr>    
<?php endforeach;?>
<th>Жами</th>
<th><?=$kol?></th>
<th><?=$summaJami?></th>
<th></th>
</table>
</div>