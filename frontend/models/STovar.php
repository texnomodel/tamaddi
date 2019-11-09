<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "s_tovar".
 *
 * @property int $id
 * @property string $nom
 * @property string $nom_ru
 * @property string $nom_sh
 * @property string $shtrix
 * @property string $shtrix_in
 * @property int $tz_id
 * @property int $kg
 * @property string $shtrix_full
 * @property string $shtrix1
 * @property string $shtrix2
 * @property int $kat
 * @property int $brend
 * @property string $qr
 * @property int $shtrixkod
 * @property int $qrkod
 * @property int $izm_id
 * @property int $kol_in
 * @property int $izm1
 * @property string $shakl
 * @property string $internom
 * @property int $turi
 * @property int $resept
 * @property double $aniq
 * @property double $minimal
 * @property double $maksimal
 * @property double $sotish
 * @property int $zavod_id
 * @property double $ustama
 * @property int $del_flag
 * @property int $upakavka
 * @property int $user_id
 * @property int $client_id
 * @property string $changedate
 * @property int $majbur_dori_id
 * @property int $miqdor
 * @property int $shart
 */
class STovar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_tovar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tz_id', 'kg', 'kat', 'brend', 'shtrixkod', 'qrkod', 'izm_id', 'kol_in', 'izm1', 'turi', 'resept', 'zavod_id', 'del_flag', 'upakavka', 'user_id', 'client_id', 'majbur_dori_id', 'miqdor', 'shart'], 'integer'],
            [['kat', 'brend'], 'required'],
            [['aniq', 'minimal', 'maksimal', 'sotish'], 'number'],
            [['changedate'], 'safe'],
            [['nom', 'nom_ru', 'qr', 'shakl', 'internom'], 'string', 'max' => 250],
            [['nom_sh'], 'string', 'max' => 50],
            [['shtrix', 'shtrix_full', 'shtrix1', 'shtrix2'], 'string', 'max' => 150],
            [['shtrix_in'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nom' => 'Nom',
            'nom_ru' => 'Nom Ru',
            'nom_sh' => 'Nom Sh',
            'shtrix' => 'Shtrix',
            'shtrix_in' => 'Shtrix In',
            'tz_id' => 'Tz ID',
            'kg' => 'Kg',
            'shtrix_full' => 'Shtrix Full',
            'shtrix1' => 'Shtrix1',
            'shtrix2' => 'Shtrix2',
            'kat' => 'Kat',
            'brend' => 'Brend',
            'qr' => 'Qr',
            'shtrixkod' => 'Shtrixkod',
            'qrkod' => 'Qrkod',
            'izm_id' => 'Izm ID',
            'kol_in' => 'Kol In',
            'izm1' => 'Izm1',
            'shakl' => 'Shakl',
            'internom' => 'Internom',
            'turi' => 'Turi',
            'resept' => 'Resept',
            'aniq' => 'Aniq',
            'minimal' => 'Minimal',
            'maksimal' => 'Maksimal',
            'sotish' => 'Sotish',
            'zavod_id' => 'Zavod ID',
            'del_flag' => 'Del Flag',
            'upakavka' => 'Upakavka',
            'user_id' => 'User ID',
            'client_id' => 'Client ID',
            'changedate' => 'Changedate',
            'majbur_dori_id' => 'Majbur Dori ID',
            'miqdor' => 'Miqdor',
            'shart' => 'Shart',
            'ustama' => 'Ustama',
        ];
    }
}
