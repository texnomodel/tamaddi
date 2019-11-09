<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "s_client".
 *
 * @property int $id
 * @property int $iduz
 * @property int $kod
 * @property string $nom
 * @property string $userpass
 * @property int $komu
 * @property int $vazir
 * @property string $adress
 * @property string $manzil
 * @property string $indeks
 * @property int $obl
 * @property int $tuman
 * @property string $boss
 * @property string $tel
 * @property string $rs
 * @property string $mr
 * @property string $inn
 * @property string $okonh
 * @property string $bank
 * @property string $kod_bank
 * @property string $s1
 * @property int $flag
 * @property string $flag1
 * @property string $flag2
 * @property string $gorod
 * @property int $active
 * @property string $tugashsana
 * @property int $user_id
 * @property string $changedate
 * @property int $uyu_type
 * @property int $garaj
 * @property int $garaj_turi
 * @property int $glav_id
 * @property int $client_tur
 * @property int $arendachi_kodi
 * @property string $arendachi_nomi
 * @property int $jivoy
 * @property int $tja
 * @property int $avto
 * @property string $sana
 * @property string $srok
 * @property string $prim
 * @property int $tez
 * @property int $stos
 * @property string $tods_sana
 * @property int $tods
 * @property string $sayt
 * @property string $email
 * @property string $masul1
 * @property string $telsms1
 * @property string $masul2
 * @property string $telsms2
 * @property int $komputer
 * @property int $printer
 * @property int $skaner
 * @property int $esp
 * @property int $telinternet
 * @property string $primoferta
 * @property string $sanaforma1
 * @property string $sanaoplata
 * @property string $oferta
 * @property int $nik
 * @property double $summa
 * @property int $edit_it
 * @property string $ssana
 * @property string $snomer
 * @property double $ost_n_sbor
 * @property double $ost_n_posh
 * @property int $del_flag
 * @property int $kolin
 * @property int $iamhere
 * @property string $diamhere
 * @property string $prikname
 * @property string $prikdate
 * @property string $filenom
 * @property int $at91
 * @property int $tender_n
 * @property string $tender_d
 * @property int $xizmat_n
 * @property string $xizmat_d
 * @property int $disp_n
 * @property string $disp_d
 * @property string $vaqt_in
 * @property string $vaqtout
 * @property string $kim
 * @property string $tarmoq
 * @property int $yaxlitlash
 * @property int $yaxlitlash_in
 * @property double $foiz
 * @property double $foiz_in
 * @property double $chegirma
 * @property int $seriya
 * @property int $ichkitovar
 * @property int $lasttz_id
 * @property int $lastta_id
 * @property int $lis
 */
class SClient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iduz', 'kod', 'komu', 'vazir', 'obl', 'tuman', 'flag', 'active', 'user_id', 'uyu_type', 'garaj', 'garaj_turi', 'glav_id', 'client_tur', 'arendachi_kodi', 'jivoy', 'tja', 'avto', 'tez', 'stos', 'tods', 'komputer', 'printer', 'skaner', 'esp', 'telinternet', 'nik', 'edit_it', 'del_flag', 'kolin', 'iamhere', 'at91', 'tender_n', 'xizmat_n', 'disp_n', 'yaxlitlash', 'yaxlitlash_in', 'seriya', 'ichkitovar', 'lasttz_id', 'lastta_id', 'lis'], 'integer'],
            [['tugashsana', 'changedate', 'sana', 'srok', 'tods_sana', 'sanaforma1', 'sanaoplata', 'oferta', 'ssana', 'diamhere', 'prikdate', 'tender_d', 'xizmat_d', 'disp_d', 'vaqt_in', 'vaqtout'], 'safe'],
            [['summa', 'ost_n_sbor', 'ost_n_posh', 'foiz', 'foiz_in', 'chegirma'], 'number'],
            [['lis'], 'required'],
            [['nom', 'adress', 'manzil', 'prim'], 'string', 'max' => 250],
            [['userpass', 'tel', 'gorod', 'snomer', 'prikname', 'filenom'], 'string', 'max' => 50],
            [['indeks', 'rs', 'mr', 'flag1', 'flag2'], 'string', 'max' => 20],
            [['boss', 'bank', 'primoferta'], 'string', 'max' => 150],
            [['inn', 'okonh', 'telsms1', 'telsms2'], 'string', 'max' => 9],
            [['kod_bank'], 'string', 'max' => 5],
            [['s1'], 'string', 'max' => 12],
            [['arendachi_nomi'], 'string', 'max' => 128],
            [['sayt', 'email', 'masul1', 'masul2', 'kim', 'tarmoq'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iduz' => 'Iduz',
            'kod' => 'Kod',
            'nom' => 'Nom',
            'userpass' => 'Userpass',
            'komu' => 'Komu',
            'vazir' => 'Vazir',
            'adress' => 'Adress',
            'manzil' => 'Manzil',
            'indeks' => 'Indeks',
            'obl' => 'Obl',
            'tuman' => 'Tuman',
            'boss' => 'Boss',
            'tel' => 'Tel',
            'rs' => 'Rs',
            'mr' => 'Mr',
            'inn' => 'Inn',
            'okonh' => 'Okonh',
            'bank' => 'Bank',
            'kod_bank' => 'Kod Bank',
            's1' => 'S1',
            'flag' => 'Flag',
            'flag1' => 'Flag1',
            'flag2' => 'Flag2',
            'gorod' => 'Gorod',
            'active' => 'Active',
            'tugashsana' => 'Tugashsana',
            'user_id' => 'User ID',
            'changedate' => 'Changedate',
            'uyu_type' => 'Uyu Type',
            'garaj' => 'Garaj',
            'garaj_turi' => 'Garaj Turi',
            'glav_id' => 'Glav ID',
            'client_tur' => 'Client Tur',
            'arendachi_kodi' => 'Arendachi Kodi',
            'arendachi_nomi' => 'Arendachi Nomi',
            'jivoy' => 'Jivoy',
            'tja' => 'Tja',
            'avto' => 'Avto',
            'sana' => 'Sana',
            'srok' => 'Srok',
            'prim' => 'Prim',
            'tez' => 'Tez',
            'stos' => 'Stos',
            'tods_sana' => 'Tods Sana',
            'tods' => 'Tods',
            'sayt' => 'Sayt',
            'email' => 'Email',
            'masul1' => 'Masul1',
            'telsms1' => 'Telsms1',
            'masul2' => 'Masul2',
            'telsms2' => 'Telsms2',
            'komputer' => 'Komputer',
            'printer' => 'Printer',
            'skaner' => 'Skaner',
            'esp' => 'Esp',
            'telinternet' => 'Telinternet',
            'primoferta' => 'Primoferta',
            'sanaforma1' => 'Sanaforma1',
            'sanaoplata' => 'Sanaoplata',
            'oferta' => 'Oferta',
            'nik' => 'Nik',
            'summa' => 'Summa',
            'edit_it' => 'Edit It',
            'ssana' => 'Ssana',
            'snomer' => 'Snomer',
            'ost_n_sbor' => 'Ost N Sbor',
            'ost_n_posh' => 'Ost N Posh',
            'del_flag' => 'Del Flag',
            'kolin' => 'Kolin',
            'iamhere' => 'Iamhere',
            'diamhere' => 'Diamhere',
            'prikname' => 'Prikname',
            'prikdate' => 'Prikdate',
            'filenom' => 'Filenom',
            'at91' => 'At91',
            'tender_n' => 'Tender N',
            'tender_d' => 'Tender D',
            'xizmat_n' => 'Xizmat N',
            'xizmat_d' => 'Xizmat D',
            'disp_n' => 'Disp N',
            'disp_d' => 'Disp D',
            'vaqt_in' => 'Vaqt In',
            'vaqtout' => 'Vaqtout',
            'kim' => 'Kim',
            'tarmoq' => 'Tarmoq',
            'yaxlitlash' => 'Yaxlitlash',
            'yaxlitlash_in' => 'Yaxlitlash In',
            'foiz' => 'Foiz',
            'foiz_in' => 'Foiz In',
            'chegirma' => 'Chegirma',
            'seriya' => 'Seriya',
            'ichkitovar' => 'Ichkitovar',
            'lasttz_id' => 'Lasttz ID',
            'lastta_id' => 'Lastta ID',
            'lis' => 'Lis',
        ];
    }
}
