<?php

$this->title = "";?>

<?php

$date = date("Y-m-d");

$s = \frontend\models\Asos::find()->where(['sana'=>$date])->andWhere(['diler_id'=>0])->one();
if($s){
    ?>
    <div class="table-responsive" style="overflow-y: scroll;">
        <table class="table table-bordered">
            <thead class="thead-dark" style="background-color: #5585ff">
            <tr>
                <th style="color: white" scope="col"  >№</th>
                <th style="color: white" scope="col"  >Tavar nomi</th>
                <th style="color: white" scope="col" >Soni </th>
                <th style="color: white" scope="col" >Ichki soni</th>

            </tr>

            </thead>
            <?php $i=0;
            foreach ($carts as $sot){ $i++?>
                <tbody style="background-color: #d2d2ff">
                <tr>
                    <th style="color: blue" scope="row"><?=$i?></th>
                    <th style="color: blue" scope="row"><?=$sot->tovar_nom?></th>
                </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
<?php }
else{
    echo "Not praduct";
}
?>
