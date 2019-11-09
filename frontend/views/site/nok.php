<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\Asos;
use frontend\models\AsosSlave;
use frontend\models\User;
use kartik\date\DatePicker;
$this->title="";
$date = date('Y-m-d');
?>

<div class="client-qarz">
  <?php ActiveForm::begin()?>
  <table>
  <tr>
    <td>
            <?php
            echo DatePicker::widget([
                'name' => 'date1',
                'id' => 'dates1',

                'value' => Yii::$app->request->post('date1')?Yii::$app->request->post('date1'):date('Y-m-d'),
                'options' => ['placeholder' => 'Sanani tanlang...'],
                'pluginOptions' => [
                  'keyboardNavigation' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]);
            ?>

    </td>
    <td>
      <button type="submit" class="btn btn-primary">Qidirish</button>
    </td>
  </tr>  

  </table>
  <?php ActiveForm::end()?>    
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
             width: 49%;
        }
    }
</style>
<div  style="text-align: center;margin: 2px; background-color: rgba(43,106,246,0.77);">
<table class="table table-bordered">
  
<tr>
<th>Стол</th>
<th>Чек №</th>
<th>Сана</th>
<th>Қат-ор</th>
<th>Жами</th>
<th>%</th>
</tr>




<?php
$n = 0;$summa = 0;$summaJami = 0;
foreach ($s as $item):
?>
<tr>
  <td>
    <?php \yii\widgets\ActiveForm::begin(['action'=>['/site/kun']])?>
        <input type="text" value="<?=$item->id?>" name="asosid" hidden>
        <button class="btn btn-info form-control"  style="color: white">
           <?php
           $i++;$summa = $summa + $item['summa'];$summaJami = $summaJami + $item['summa_ch'];
           $nom = \frontend\models\SMobil::find()->where(['id'=>$item->mobil])->one();
           ?>
           <?=$nom['nom']?></button>
           
    
    <?php \yii\widgets\ActiveForm::end()?>
  <td>
    <?=$item['diler_id']?>
  </td>
  <td>
    <?=$item['changedate']?>
  </td>
  <td>
    <?=$item['kol']?>
  </td>
  <td>
    <?=$item['summa_ch']?>
  </td>
  <td>
    <?=$item['xizmat_foiz']?>
  </td>


</tr>    
<?php endforeach;?>
<th>Жами</th>
<th></th>
<th></th>
<th></th>
<th><?=$summaJami?></th>
<th></th>
</table>
</div>

<script type="text/javascript">
$('.minus-btn').on('click', function(e) {
    e.preventDefault(); 
    jid=$('#dates1').val();
    var parts ='2019-02-09'.split('-');

    var mydate = new Date(parts[0], parts[1], parts[2]); 
    mydate.setDate(mydate.getDate() - 1); 
    //var D = new Date(jid);

    //D.setDate(D.getDate() - 1); 
    $('#dates1').val(mydate);
});
$('.plus-btn').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('div').find('input');
    var value = parseInt($input.val());
        alert(value);
        value = value + 1;
        value =1000;

    $input.val(value);
});
</script>