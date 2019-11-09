<?php
/**
 * Created by PhpStorm.
 * User: MRK
 * Date: 16.04.2019
 * Time: 9:16
 */
use yii\bootstrap\ActiveForm;
use frontend\models\Asos;
use frontend\models\User;
$this->title="";

$tekshir=Asos::find()->where(['sana'=>$date])->andWhere(['del_flag'=>1])->andWhere(['print_flag'=>0])->andWhere(['>','diler_id',0])->one();
?>
<div style="display:blok;">
<button class="b_q1" style="margin:10px;color: blue">1-Qavat</button> <input type="text" value="1" hidden name="kat">
<button class="b_q2" style="margin:10px;color: black">2-Qavat</button> <input type="text" value="2" hidden name="kat">
<button class="b_q3" style="margin:10px;color: black">3-Qavat</button> <input type="text" value="3" hidden name="kat">
</div>  

<div class="row" style="background-color: rgba(68,108,246,0.77);">
<div class="col-md-12">

<table id="qavat1" style="display:blok;"><tr>	

	<?php $qavat='1';$j=0;$i=0;
  foreach ($model as $item){ $i++?>
	  
	  <?php
      $j=$j+1;
       
        $tekshir=Asos::find()->where(['print_flag'=>0])->andWhere(['del_flag'=>1])->andWhere(['tur_oper'=>2])->andWhere(['mobil'=>$item['id']])->one();
        $user = User::find()->where(['id'=>$tekshir['user_id']])->one();

      ?>

      <?php if($item['qavat'] != $qavat){?>
                </table>
                <?php 

                if($item['qavat'] == '1'){
                  echo '<table id="qavat'.$item['qavat'].'" style="padding: 1px;display:blok"><tr>';  
                }
                else  
                {
                  echo '<table id="qavat'.$item['qavat'].'" style="padding: 1px;display:none"><tr>';
                }?>


      <?php }?>
      <?php $qavat=$item['qavat'];?>
      
      <?php if( $j==6) {?>
	       <tr>
	    <?php }?>

	    <td >            
         
       <?php if($tekshir==null) {?>  <?php ActiveForm::begin(['action'=>['site/karzina']])?><?php }?>
       <?php if($tekshir['user_id']==Yii::$app->getUser()->id) {?>  <?php ActiveForm::begin(['action'=>['site/karzina']])?>
       <?php
       
       ?>
        <?php }?>
             <input type="text" name="stolid" hidden value="<?= $item->id ?>" >
        	<?php if(Yii::$app->getUser()->identity->dyum==5){?>	
             <button style="width:61px;height:80px;margin:1px;"
             <?php if($tekshir['mobil']==$item['id']){ ?>
                <?php if($tekshir['user_id']==Yii::$app->getUser()->id){ ?> 
                class="btn btn-info" <?php }
             else{
                  ?>
                  class="btn btn-danger" 
                  <?php } }?>>
                  <h1  style="font-size: 20px"><b><?= $item->nom ?></b></h1>
                  <b style="font-size: 12px;margin: 0px 0px 0px -8px"><?= $user['username']?></b></button>
         	  <?php }?>
            <?php 

            if(Yii::$app->getUser()->identity->dyum==11){?>	
            <button style="width:109px;height: 145px;margin:1px;"
            <?php if($tekshir['mobil']==$item['id']){ ?> 

            <?php if($tekshir['user_id']==Yii::$app->getUser()->id){ ?> 
                class="btn btn-info" <?php }
            else{
                ?>
                class="btn btn-danger" 
                  <?php } 
            }?>
            ><h1 style="font-size: 75px"><b><?= $item->nom ?></b></h1><?= $user['username']?></button>
         	<?php }?>
         	<?php if(Yii::$app->getUser()->identity->dyum==7){?>	
             <button style="width:62px;height: 100px;margin:1px;"
             <?php if($tekshir['mobil']==$item['id']){ ?> 

                <?php if($tekshir['user_id']==Yii::$app->getUser()->id){ ?> 
                class="btn btn-info" <?php }
                else{
                ?>
                class="btn btn-danger" 

                  <?php } }?>
             ><h1  style="font-size: 32px"><b><?= $item->nom ?></b></h1><b style="font-size: 15px;margin: 0px 0px 0px -8px"><?= $user['username']?></b></button></button>
         	 <?php }?>
         <?php if($tekshir==null) {?>  <?php ActiveForm::end()?><?php }?>
       <?php if($tekshir['user_id']==Yii::$app->getUser()->id) {?> <?php ActiveForm::end()?><?php }?>
        
      
  </td>
       	  <?php if($j==5) {
            $j=0;
            ?>
	           </tr>
          <?php }?>
  <?php };?>
</tr>       
</table>
</div></div>
<script type="text/javascript">
$('.b_q1').bind('click', function(e){

    e.preventDefault();
    document.getElementById("qavat1").style.display='block';
    document.getElementById("qavat2").style.display='none';
    document.getElementById("qavat3").style.display='none';
    $('.b_q1').css('color','blue');$('.b_q2').css('color','black');$('.b_q3').css('color','black');
});
$('.b_q2').bind('click', function(e){
    e.preventDefault();
    document.getElementById("qavat1").style.display='none';
    document.getElementById("qavat2").style.display='block';
    document.getElementById("qavat3").style.display='none';
    $('.b_q2').css('color','blue');$('.b_q1').css('color','black');$('.b_q3').css('color','black');
});
$('.b_q3').bind('click', function(e){
    e.preventDefault();
    document.getElementById("qavat2").style.display='none';
    document.getElementById("qavat3").style.display='block';
    document.getElementById("qavat1").style.display='none';
$('.b_q3').css('color','blue');$('.b_q1').css('color','black');$('.b_q2').css('color','black');
});
</script>