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
        Mijozning ismi: <input type="text" name="assosiy" value=""><br>
        <?php } ?> 
     Telefon raqami: <input type="text" name="ichki" value=""><br>
 <?php } ?>
  <br>
<button >Yangilash</button>

  <?php ActiveForm::end()?>
</div>