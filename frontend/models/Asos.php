<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "asos".
 *
 * @property int $id
 * @property int $client_id
 * @property int $kassa_id
 * @property int $xodim_id
 * @property string $seriya
 * @property string $nomer
 * @property string $sana
 * @property string $qabul_sana
 * @property double $summa
 * @property double $sum_naqd
 * @property double $sum_plastik
 * @property double $sum_epos
 * @property double $cheg_n
 * @property double $cheg_p
 * @property double $cheg_e
 * @property double $sum_naqd_ch
 * @property double $sum_plast_ch
 * @property double $sum_epos_ch
 * @property double $summa_ch
 * @property int $kol
 * @property string $changedate
 * @property int $user_id
 * @property int $del_flag
 * @property int $tur_oper
 * @property int $diler_id
 * @property int $print_flag
 * @property int $ombor_id
 * @property int $filial_id
 * @property int $shartnoma_id
 * @property int $woywo_bill_type Тип запроса Вай воу
 * @property double $qarz_summa
 * @property string $qarz_kim
 * @property string $qarz_izoh
 * @property int $qarz_flag
 * @property int $h_id
 * @property int $mobil
 * @property int $pl_id
 * @property double $kurs
 * @property int $dollar
 * @property double $sum_d
 */
class Asos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id'], 'required'],
            [['client_id', 'kassa_id', 'xodim_id', 'kol', 'user_id', 'del_flag', 'tur_oper', 'diler_id', 'print_flag', 'ombor_id', 'filial_id', 'shartnoma_id', 'woywo_bill_type', 'qarz_flag','mobil', 'h_id', 'pl_id', 'dollar'], 'integer'],
            [['sana', 'qabul_sana', 'changedate'], 'safe'],
            [['summa', 'sum_naqd', 'sum_plastik', 'sum_epos', 'cheg_n', 'cheg_p', 'cheg_e', 'sum_naqd_ch', 'sum_plast_ch', 'sum_epos_ch', 'summa_ch', 'qarz_summa', 'kurs', 'sum_d'], 'number'],
            [['seriya', 'nomer'], 'string', 'max' => 50],
            [['qarz_kim'], 'string', 'max' => 100],
            [['qarz_izoh'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'kassa_id' => 'Kassa ID',
            'xodim_id' => 'Xodim ID',
            'seriya' => 'Seriya',
            'nomer' => 'Nomer',
            'sana' => 'Sana',
            'qabul_sana' => 'Qabul Sana',
            'summa' => 'Summa',
            'sum_naqd' => 'Sum Naqd',
            'sum_plastik' => 'Sum Plastik',
            'sum_epos' => 'Sum Epos',
            'cheg_n' => 'Cheg N',
            'cheg_p' => 'Cheg P',
            'cheg_e' => 'Cheg E',
            'sum_naqd_ch' => 'Sum Naqd Ch',
            'sum_plast_ch' => 'Sum Plast Ch',
            'sum_epos_ch' => 'Sum Epos Ch',
            'summa_ch' => 'Summa Ch',
            'kol' => 'Kol',
            'changedate' => 'Changedate',
            'user_id' => 'User ID',
            'del_flag' => 'Del Flag',
            'tur_oper' => 'Tur Oper',
            'diler_id' => 'Diler ID',
            'print_flag' => 'Print Flag',
            'ombor_id' => 'Ombor ID',
            'filial_id' => 'Filial ID',
            'shartnoma_id' => 'Shartnoma ID',
            'woywo_bill_type' => 'Woywo Bill Type',
            'qarz_summa' => 'Qarz Summa',
            'qarz_kim' => 'Qarz Kim',
            'qarz_izoh' => 'Qarz Izoh',
            'qarz_flag' => 'Qarz Flag',
            'h_id' => 'H ID',
            'pl_id' => 'Pl ID',
            'kurs' => 'Kurs',
            'dollar' => 'Dollar',
            'mobil' => 'Mobil',
            'sum_d' => 'Sum D',
            'xizmat_foiz' => 'Xizmat_foiz',
        ];
    }
}
