<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">


    <nav class="navbar navbar-static-top" role="navigation">

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

                <li class="dropdown user user-menu">
                    <?= Html::a(
                        ' Карзина',
                        ['/site/karzina'],
                        ['data-method' => 'post', 'class' => 'btn btn-danger ']
                    ) ?>

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
