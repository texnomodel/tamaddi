<?php

use yii\helpers\Html;

$this->title = 'Ombordagi mahsulotlar';
?>

<div class="site-ombor">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?php
    \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'kol_ost',
            'znom',
            'dnom',
            'q',
            'q_in',
            'q_all',
            'sotiladi',
            's_tovar',
            's_zavod',
            's_diler',
            'seriya'
        ],
    ]);
    ?>

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tovar nomi...">

    <select name="select1" id="select1" class="select1" onchange="myFunction()">
        <option value="" selected="selected">Hamma diller</option>
        <?php foreach ($models2 as $item){ ?>
            <option value='<?=$item['nom']?>'><?=$item['nom']?></option>
        <?php } ?>
    </select>

    <div class="sum-table">
        <div>
            <label for="qator">Qator:&nbsp;&nbsp;</label><span id="qator"></span>
        </div>
        <div>
            <label for="tovar">Tovar:&nbsp;&nbsp;</label><span id="tovar"></span>
        </div>
        <div>
            <label for="kirim">Kirim:&nbsp;&nbsp;</label><span id="kirim"></span>
        </div>
        <div>
            <label for="qoldiq">Sotish:&nbsp;&nbsp;</label><span id="qoldiq"></span>
        </div>
    </div>

    <div class="table-responsive" style="max-height: 520px;overflow: auto;border: 1px solid #dedede;box-shadow: inset 1px 0px 4px 0px rgba(0,0,0,0.1);">
        <table class="table table-bordered table-hover table-condensed" id="myTable">
            <thead style="background-color: #a7d1e9;">
            <tr>
                <th rowspan="3" style="min-width: 200px; vertical-align: middle">Tovar nomi</th>
                <th rowspan="3" style="min-width: 200px; vertical-align: middle">Diler</th>
                <th colspan="5" style="text-align: center">Kirim</th>
                <th colspan="5" style="100px; text-align: center">Qoldiq</th>
                <th rowspan="2" colspan="3" style="vertical-align: middle; text-align: center">Sotish</th>
            </tr>
            <tr>
                <th colspan="2">Asosiy tovar</th>
                <th colspan="2">Ichki tovar</th>
                <th rowspan="2" style="min-width: 120px; vertical-align: middle">Jami</th>
                <th colspan="2">Asosiy tovar</th>
                <th colspan="2">Ichki tovar</th>
                <th rowspan="2" style="min-width: 120px; vertical-align: middle">Jami</th>
            </tr>
            <tr>
                <th style="min-width: 60px;">Soni</th>
                <th style="min-width: 120px; ">Narxi</th>
                <th style="min-width: 60px;">Soni</th>
                <th style="min-width: 120px;">Narxi</th>
                <th style="min-width: 60px;">Soni</th>
                <th style="min-width: 120px;">Summasi</th>
                <th style="min-width: 60px;">Soni</th>
                <th style="min-width: 120px;">Summasi</th>
                <th style="min-width: 100px;">Asosiy</th>
                <th style="min-width: 100px;">Ichki</th>
                <th style="min-width: 60px;">Foiz</th>
            </tr>
            </thead>
            <tbody style="background-color: #deeffa;">
            <?php
            foreach ($models as $item) { ?>
                <tr>
                    <td><?= $item['s_tovar'] ?></td>
                    <td><?= $item['s_diler'] ?></td>
                    <td><?= $item['kol'] ?></td>
                    <td><?= $item['sena'] ?></td>
                    <td><?= $item['kol_in'] ?></td>
                    <td><?= $item['sena_in'] ?></td>
                    <td><?= $item['summa_all'] ?></td>
                    <td><?= $item['kol_ost'] ?></td>
                    <td><?= $item['q'] ?></td>
                    <td><?= $item['kol_in_ost'] ?></td>
                    <td><?= $item['q_in'] ?></td>
                    <td><?= $item['q_all'] ?></td>
                    <td><?= $item['sotish'] ?></td>
                    <td><?= $item['sotish_in'] ?></td>
                    <td><?= $item['foiz'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <style>
        table tr th {
            vertical-align: middle;
            text-align: center;
        }

        #myInput {
            /*background-image: url('/css/searchicon.png'); !* Add a search icon to input *!*/
            /*background-position: 10px 12px; !* Position the search icon *!*/
            /*background-repeat: no-repeat; !* Do not repeat the icon image *!*/
            width: 50%; /* Full-width */
            font-size: 14px; /* Increase font-size */
            /*padding: 6px 20px 6px 40px; !* Add some padding *!*/
            padding: 6px 10px;
            border: 1px solid #ddd; /* Add a grey border */
            margin-bottom: 12px; /* Add some space below the input */
            border-radius: 4px;
        }

        #myTable {
            border-collapse: collapse; /* Collapse borders */
            width: 100%; /* Full-width */
            border: 1px solid #ddd; /* Add a grey border */
            /*font-size: 18px; !* Increase font-size *!*/
        }
        .select1 {
            width: 49%;
            margin: 5px 0;
            padding: 6px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .sum-table{
            display: inline-block;
            font-size: 16px;
            border: 1px solid #cfcfcf;
            padding: 5px 10px;
            margin-bottom: 10px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
        }
        .sum-table div{
            display: inline-block;
        }
        .sum-table label{
            margin: 0;
            font-weight: 500;
        }
        .sum-table span{
            display: inline-block;
            margin-right: 40px;
            font-weight: 700;
        }
        @media only screen and (max-width: 856px) {
            .sum-table div{
                width: 49%;
            }
            .sum-table span {
                margin-right: 0;
            }
        }
        @media only screen and (max-width: 767px) {
            .table-responsive > .table > thead > tr > th,
            .table-responsive > .table > tbody > tr > th,
            .table-responsive > .table > tfoot > tr > th,
            .table-responsive > .table > thead > tr > td,
            .table-responsive > .table > tbody > tr > td,
            .table-responsive > .table > tfoot > tr > td {
                white-space: normal;
            }
        }
        @media only screen and (max-width: 452px) {
            #myInput{
                width:100%;
            }
            .select1{
                width:100%;
            }
            .sum-table{
                display: block;
            }
        }
    </style>

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            var select1, filter2, txtValue2, td2;
            select1 = document.getElementsByClassName("select1")[0];
            filter2 = select1.options[select1.selectedIndex].value;
//            alert(filter2);

            var qator_sum=0, tovar_sum=0, kirim_sum=0, qoldiq_sum=0;
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                td2 = tr[i].getElementsByTagName("td")[1];
                if (td && td2) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1 && txtValue2.indexOf(filter2) > -1) {
                        tr[i].style.display = "";
                        kirim_sum = kirim_sum + (parseFloat(tr[i].getElementsByTagName("td")[3].innerHTML) * parseFloat(tr[i].getElementsByTagName("td")[7].innerHTML));
                        qoldiq_sum = qoldiq_sum + parseFloat(tr[i].getElementsByTagName("td")[11].innerHTML) + (parseFloat(tr[i].getElementsByTagName("td")[11].innerHTML) * parseFloat(tr[i].getElementsByTagName("td")[14].innerHTML))/100;
                        qator_sum++;
                        tovar_sum = tovar_sum + parseInt(tr[i].getElementsByTagName("td")[7].innerHTML);
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
            document.getElementById("qator").innerHTML = qator_sum;
            document.getElementById("tovar").innerHTML = abc2(tovar_sum.toString());
            document.getElementById("kirim").innerHTML = abc2(kirim_sum.toString());
            document.getElementById("qoldiq").innerHTML = abc2(qoldiq_sum.toString());
//            kirim_sum = kirim_sum.toString();
//            alert(typeof kirim_sum);
//            alert(kirim_sum.toString().replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, ' '));
        }
        function abc2(n) {
            n += "";
            n = new Array(4 - n.length % 3).join("U") + n;
            return n.replace(/([0-9U]{3})/g, "$1 ").replace(/U/g, "");
        }

        jQuery(document).ready(function ($) {
            var tovar_sum=0, kirim_sum=0, qoldiq_sum=0;
            $("#myTable tbody tr").each(function () {
                var item = parseFloat($(this).find('td:nth-child(4)').html())*parseFloat($(this).find('td:nth-child(8)').html());
                kirim_sum += item?item:0;
            });
            $("#myTable tbody tr").each(function () {
                var item = parseFloat($(this).find('td:nth-child(12)').html()) + (parseFloat($(this).find('td:nth-child(12)').html())*parseFloat($(this).find('td:nth-child(15)').html()))/100;
                qoldiq_sum += item?item:0;
            });
            $("#myTable tbody tr").each(function () {
                var item = parseFloat($(this).find('td:nth-child(8)').html());
                tovar_sum += item?item:0;
            });
            $("#qator").html($("#myTable tbody tr").length);
            $("#tovar").html(abc2(tovar_sum.toString()));
            $("#kirim").html(abc2(kirim_sum.toString()));
            $("#qoldiq").html(qoldiq_sum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " "));
        });
    </script>
</div>

