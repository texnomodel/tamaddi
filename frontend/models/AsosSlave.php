<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "asos_slave".
 *
 * @property int $id
 * @property int $tovar_id
 * @property string $tovar_nom
 * @property int $izm_id
 * @property int $izm1
 * @property int $tulov_id
 * @property string $seriya
 * @property string $polka
 * @property string $srok
 * @property int $turi
 * @property int $resept
 * @property int $qrkod
 * @property int $kol
 * @property int $kol_in
 * @property double $sena
 * @property double $sena_in
 * @property double $summa
 * @property double $summa_in
 * @property double $summa_all
 * @property double $sotish
 * @property double $sotish_in
 * @property double $foiz
 * @property double $foiz_in
 * @property int $subkod
 * @property int $user_id
 * @property string $changedate
 * @property int $asos_id
 * @property int $del_flag
 * @property int $kol_ost
 * @property int $kol_in_ost
 * @property double $summa_ost
 * @property double $summa_in_ost
 * @property double $summa_all_ost
 * @property double $sena_d
 * @property double $sena_in_d
 * @property double $sotish_d
 * @property double $sotish_in_d
 * @property string $zakaz
 * @property string $zakaz_ok
 * @property string $zakaz_end
 * @property int $zakaz_see
 * @property double $ustama
 */
class AsosSlave extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asos_slave';
    }
    public $ids;
    public $idt;
    public $sot;
    public $sotin;
    public $nom;
    public $nom_sh;    
    public $kns;
    public $kolin;
    public $suma;
    public $sumin;
    public $tkol_in;
    public $kat;
    public $polka;
    public $papkanom;
    public $papka;
    public $ustama;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tovar_id', 'asos_id'], 'required'],
            [['tovar_id','izm_id', 'izm1', 'tulov_id', 'turi', 'resept', 'qrkod', 'kol', 'kol_in', 'subkod', 'user_id', 'asos_id', 'del_flag', 'kol_ost', 'kol_in_ost', 'zakaz_see'], 'integer'],
            [['srok', 'changedate', 'zakaz', 'zakaz_ok', 'zakaz_end'], 'safe'],
            [['sena', 'sena_in', 'summa', 'summa_in', 'summa_all', 'sotish', 'sotish_in', 'foiz', 'foiz_in', 'summa_ost', 'summa_in_ost', 'summa_all_ost', 'sena_d', 'sena_in_d', 'sotish_d', 'sotish_in_d'], 'number'],
            [['tovar_nom'], 'string', 'max' => 250],
            [['seriya', 'polka'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tovar_id' => 'Tovar ID',
            'tovar_nom' => 'Tovar Nom',
            'izm_id' => 'Izm ID',
            'izm1' => 'Izm1',
            'tulov_id' => 'Tulov ID',
            'seriya' => 'Seriya',
            'polka' => 'Polka',
            'srok' => 'Srok',
            'turi' => 'Turi',
            'resept' => 'Resept',
            'qrkod' => 'Qrkod',
            'kol' => 'Kol',
            'kol_in' => 'Kol In',
            'sena' => 'Sena',
            'sena_in' => 'Sena In',
            'summa' => 'Summa',
            'summa_in' => 'Summa In',
            'summa_all' => 'Summa All',
            'sotish' => 'Sotish',
            'sotish_in' => 'Sotish In',
            'foiz' => 'Foiz',
            'foiz_in' => 'Foiz In',
            'subkod' => 'Subkod',
            'user_id' => 'User ID',
            'changedate' => 'Changedate',
            'asos_id' => 'Asos ID',
            'del_flag' => 'Del Flag',
            'kol_ost' => 'Kol Ost',
            'kol_in_ost' => 'Kol In Ost',
            'summa_ost' => 'Summa Ost',
            'summa_in_ost' => 'Summa In Ost',
            'summa_all_ost' => 'Summa All Ost',
            'sena_d' => 'Sena D',
            'sena_in_d' => 'Sena In D',
            'sotish_d' => 'Sotish D',
            'sotish_in_d' => 'Sotish In D',
            'zakaz' => 'Zakaz',
            'zakaz_ok' => 'Zakaz Ok',
            'zakaz_end' => 'Zakaz End',
            'zakaz_see' => 'Zakaz See',
            'kat' => 'Kat See',
            'polka' => 'Polka',
            'papkanom' => 'Papka Nom',
            'ustama' => 'Ustama',
        ];
    }
}
