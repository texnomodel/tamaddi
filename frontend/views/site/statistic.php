<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
$this->title = " ";
?>
<?php
$rand = array();
for ($i=1; $i<=5; $i++)
{
    array_push($rand,rand(1,1000));
}
?>
<div class="" style="padding: 0px 0px 10px 10px">
    <div class="row" style="margin-top: -20px">
        <div class="panel ">
<h1 style="padding: 10px 0px 20px 14px; font-family: fantasy; color: #4f6bff">Статистика</h1></div>
            <div class="col-md-6">
                <a href="">  <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-clock-o"></i></span>
                    <div class="info-box-content">
                        <span style="font-size: 22px; font-family: fantasy" class="info-box-text">ISHGA KECHIKKANLAR</span>
                            <span style="margin-top: 7px" class="info-box-number">ISHCHILAR SONI: <small style="font-size: 20px; color: white;padding: 5px 8px 5px 5px; background-color: red"> <?=$model?></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div></a>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <a href="">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-check"></i></span>

                    <div class="info-box-content">
                        <span style="font-size: 22px; font-family: fantasy" class="info-box-text">ISHGA VAQTIDA KELGANLAR</span>
                        <span style="margin-top: 7px" class="info-box-number">ISHCHILAR SONI: <small style="font-size: 20px; color: white; background-color: blue; padding: 5px 8px 5px 5px"> <?=$model1?></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div></a>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->


            <!-- /.col -->
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= \dosamigos\chartjs\ChartJs::widget([
                'type' => 'line',
                'clientOptions' => [
                    'height' => 50,
                    'width' => 100,
                ],
                'data' => [
                    'labels' => ["Yanvar", "Fevral", "Mart", "Aprel", "May"],
                    'datasets' => [
                        [
                            'label' => "Kechikishlar bo'yicha",
                            'backgroundColor' => "",
                            'borderColor' => "rgba(162,124,92,1)",
                            'pointBackgroundColor' => "#1033ff",
                            'pointBorderColor' => "#1033ff",
                            'pointHoverBackgroundColor' => "#1033ff",
                            'pointHoverBorderColor' => "#1033ff",
                            'data' => $rand,
                        ],
                    ]
                ]
            ]);
            ?>
        </div>


        <div class="col-md-6">
            <?= \dosamigos\chartjs\ChartJs::widget([
                'type' => 'bar',
                'clientOptions' => [
                    'height' => 50,
                    'width' => 100,
                ],
                'data' => [
                    'labels' => ["Yanvar", "Fevral", "Mart", "Aprel", "May"],
                    'datasets' => [
                        [
                            'label' => "Kechikishlar bo'yicha",
                            'backgroundColor' => "",
                            'borderColor' => "rgba(162,124,92,1)",
                            'pointBackgroundColor' => "#1033ff",
                            'pointBorderColor' => "#1033ff",
                            'pointHoverBackgroundColor' => "#1033ff",
                            'pointHoverBorderColor' => "#1033ff",
                            'data' => $rand,
                        ],
                    ]
                ]
            ]);
            ?>
        </div>
    </div>

