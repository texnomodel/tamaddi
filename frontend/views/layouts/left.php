<?php
use yii\bootstrap\ActiveForm;
use frontend\models\Asos;
use frontend\models\User;
$this->title="";
?>
<aside class="main-sidebar" style="background-color: rgba(68,108,246,0.77)">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <hr>

        <!-- search form -->

        <?php
        if(Yii::$app->getUser()->id == 34 )
        {

           echo dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [

                    ['label' => "Bosh sahifa", 'icon' => 'home', 'url' => ['/site/index']],
                    ['label' => "Bugungi cheklar", 'icon' => 'clock-o', 'url' => ['/site/nokboss']],
                    ['label' => "Официант кеcимида", 'icon' => 'clock-o', 'url' => ['/site/ofisiant']],
                    ['label' => "Товарлар кеcимида", 'icon' => 'clock-o', 'url' => ['/site/tovarkun']],
                    ['label' => "Касса амалиёти", 'icon' => 'money', 'url' => ['/site/nokkassir']],

                    ['label' => "Рўйхатдан ўтиш", 'icon' => 'plus', 'url' => ['/site/signup']],


                ],
            ]
        ); 
        }  
        else
        {


        echo dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [

                    ['label' => "Bosh sahifa", 'icon' => 'home', 'url' => ['/site/index']],
                    ['label' => "Bugungi cheklar", 'icon' => 'clock-o', 'url' => ['/site/nokladnoy']],
                    
                    ['label' => "tovar kesimida", 'icon' => 'bookmark', 'url' => ['/site/tovarkunuser']],
                    
                    ['label' => "Qarzdorlik", 'icon' => 'money', 'url' => ['/site/client-qarz']],
//                    ['label' => "Ой давомида кечикганлар", 'icon' => 'bars', 'url' => ['/site/oy']],
//                    ['label' => "Йил давомида кечикганлар", 'icon' => 'calendar', 'url' => ['/site/yil']],
//                    ['label' => "Мижозлар рейтинги", 'icon' => 'users', 'url' => ['/site/klent']],
//                    ['label' => "Назорат рейтинги", 'icon' => 'bar-chart', 'url' => ['/site/reyting']],
//                    ['label' => "Статистика", 'icon' => 'th-list', 'url' => ['/site/statistic']],
//					 ['label' => "Ходимлар", 'icon' => 'user', 'url' => ['/s-user/index']],
                    ['label' => "Рўйхатдан ўтиш", 'icon' => 'plus', 'url' => ['/site/signup']],


                ],
            ]
        );
        }
        ?>


        <li class="dropdown user user-menu">
            <?= \yii\helpers\Html::a(
                ' ( Chiqish )',
                ['/site/logout'],
                ['data-method' => 'post', 'class' => 'btn btn-primary ']
            ) ?>

        </li>

    </section>

</aside>