<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pl".
 *
 * @property int $id
 * @property int $bank_id
 * @property int $kod
 * @property int $n_pl
 * @property string $n_dok
 * @property string $d_pl
 * @property string $rssvoy
 * @property string $rs
 * @property int $vo
 * @property int $nn
 * @property int $client
 * @property int $client_id
 * @property double $sena_pl
 * @property double $saldo
 * @property double $ost_pl
 * @property int $vid
 * @property string $s1
 * @property int $ter
 * @property int $pot1
 * @property int $pot2
 * @property int $sf
 * @property int $sf_pot
 * @property string $username
 * @property string $changedate
 * @property int $stos
 * @property int $del_flag
 * @property string $prim
 * @property int $statrashod
 * @property int $diler_id
 * @property int $h_id
 */
class Pl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bank_id', 'kod', 'n_pl', 'vo', 'nn', 'client', 'client_id', 'vid', 'ter', 'pot1', 'pot2', 'sf', 'sf_pot', 'stos', 'del_flag', 'statrashod', 'diler_id', 'h_id'], 'integer'],
            [['d_pl'], 'required'],
            [['d_pl', 'changedate'], 'safe'],
            [['sena_pl', 'saldo', 'ost_pl'], 'number'],
            [['n_dok'], 'string', 'max' => 10],
            [['rssvoy'], 'string', 'max' => 26],
            [['rs'], 'string', 'max' => 21],
            [['s1'], 'string', 'max' => 12],
            [['username'], 'string', 'max' => 50],
            [['prim'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bank_id' => 'Bank ID',
            'kod' => 'Kod',
            'n_pl' => 'N Pl',
            'n_dok' => 'N Dok',
            'd_pl' => 'D Pl',
            'rssvoy' => 'Rssvoy',
            'rs' => 'Rs',
            'vo' => 'Vo',
            'nn' => 'Nn',
            'client' => 'Client',
            'client_id' => 'Client ID',
            'sena_pl' => 'Sena Pl',
            'saldo' => 'Saldo',
            'ost_pl' => 'Ost Pl',
            'vid' => 'Vid',
            's1' => 'S1',
            'ter' => 'Ter',
            'pot1' => 'Pot1',
            'pot2' => 'Pot2',
            'sf' => 'Sf',
            'sf_pot' => 'Sf Pot',
            'username' => 'Username',
            'changedate' => 'Changedate',
            'stos' => 'Stos',
            'del_flag' => 'Del Flag',
            'prim' => 'Prim',
            'statrashod' => 'Statrashod',
            'diler_id' => 'Diler ID',
            'h_id' => 'H ID',
        ];
    }
}
