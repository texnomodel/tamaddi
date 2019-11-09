<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header fixed-top">


    <nav class="navbar navbar-static-top " role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->

                <!-- User Account: style can be found in dropdown.less -->

                <!--                <li class="dropdown-content">-->
                <!--                    <a class="btn btn-success" href="--><?//= \yii\helpers\Url::to('/site/write')?><!--">WRITE</a>-->
                <!--                </li>-->
                <li class="dropdown user user-menu" >

                    <a class="btn btn-primary" style="margin-top: 5px;font-size: 30px" href="<?=\yii\helpers\Url::to(['/site/kabina'])?>"><i class="fa fa-home"></i></a>
                </li>
                <li class="dropdown user user-menu" >
                    <?php
                    $asossleve = \frontend\models\AsosSlave::find()->where(['zakaz_see'=>1])->andWhere(['del_flag'=>1])->andWhere(['user_id'=>Yii::$app->getUser()->id])->count();
                    ?>
                      <a href="<?=\yii\helpers\Url::to(['/site/tayyor'])?>">
                    <img src="/frontend/web/images/bell.png" style="width: 35px" alt=""><b style="font-size: 20px"><?=$asossleve?>&nbsp;&nbsp;</b>
                    </a>
                </li>
                <li class="dropdown user user-menu">
                    <?php $date = date("Y-m-d");

                    $s = \frontend\models\Asos::find()->where(['sana'=>$date])->andWhere(['del_flag'=>1])->andWhere(['diler_id'=>0])->andWhere(['user_id'=>Yii::$app->getUser()->id])->one();
                     $ss = \frontend\models\AsosSlave::find()->where(['asos_id'=>$s['id']])->andWhere(['user_id'=>Yii::$app->getUser()->id])->count();
?>


                        </li>

                <li class="dropdown user user-menu">
                    <?php
                    if(Yii::$app->request->post('stolid')) {
                        $stol = \frontend\models\Asos::find()->where(['print_flag'=>0])->andWhere(['del_flag'=>1])->andWhere(['mobil'=>Yii::$app->request->post('stolid')])->orderBy(['id' => SORT_DESC])->one();

                        $asosc = \frontend\models\AsosSlave::find()->where(['asos_id' => $stol['id']])->andWhere(['del_flag'=>1])->count();
                        $kabia = \frontend\models\SMobil::find()->where(['id' => Yii::$app->request->post('stolid')])->one();
                        \yii\widgets\ActiveForm::begin(['action' => ['/site/karzina']]);
                        ?>
                        <input type="text" value="<?= $stol['mobil'] ?>" hidden name="stolid">
                        <button class="btn btn-primary" style="margin-top: 6px;font-size: 30px"><?= $kabia['nom'] ?></button><b
                                style="color: white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                        <?php

                        \yii\widgets\ActiveForm::end();
                    }
                    else{

                        $stol = \frontend\models\Asos::find()->andWhere(['print_flag'=>0])->andWhere(['del_flag'=>1])->orderBy(['id' => SORT_DESC])->one();
                        $asosc = \frontend\models\AsosSlave::find()->where(['asos_id' => $stol['id']])->andWhere(['del_flag'=>1])->count();
                        $kabia = \frontend\models\SMobil::find()->where(['id' => $stol['mobil']])->one();
                        \yii\widgets\ActiveForm::begin(['action' => ['/site/karzina']]);
                        ?>

                        <?php

                        \yii\widgets\ActiveForm::end();
                    }
                    ?>

                </li>
<!--                <li class="dropdown user user-menu">-->
<!--                    --><?//= Html::a(
//                        ' ( Выход )',
//                        ['/site/logout'],
//                        ['data-method' => 'post', 'class' => 'btn btn-danger ']
//                    ) ?>
<!---->
<!--                </li>-->
                <!-- User Account: style can be found in dropdown.less -->
            </ul>
        </div>
    </nav>
</header>

