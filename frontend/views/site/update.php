<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\AsosSlave;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = ""
?>

<div class="row panel panel-defoult">
  <br>
  <?php ActiveForm::begin()?>
  <div class="col-md-4">
        <?php
     if($sotil->kol>0){
        ?>
        Assosiy: <input type="text" name="assosiy" value="<?= $sotil->kol?>"><br>
        <?php } ?> 
               <?php
     if($sotil->kol_in>0){
        ?>
        Ichki: <input type="text" name="ichki" value="<?= $sotil->kol_in?>"><br>
 <?php } ?>
  <br>
<button>Update</button>

<?php

        $asos =Yii::$app->request->post('assosiy');
        $ichki =Yii::$app->request->post('ichki');
        $sotil = AsosSlave::find()->where(['id'=>Yii::$app->request->post('idup')])->one();
         
         $ap= AsosSlave::find()->where(['id'=>$sotil['kol_ost']])->one();

         if($asos){

AsosSlave::updateAll('kol_ost' => $ap['kol_ost'] - $sotil['kol'] + $asos],['id'=>$sotil['kol_ost']);

         }

                 if($ichki){
 AsosSlave::updateAll('kol_in_ost'=>$ap['kol_in_ost']-$sotil['kol_in']+$ichki],['id'=>$sotil['kol_ost']);
          
         } 

                 if($ichki and $asos){


         } 

        

?>
  </div>

  <br>
  <?php ActiveForm::end()?>
</div>
