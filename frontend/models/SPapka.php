<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "s_mobil".
 *
 * @property int $id
 * @property string $nom
 * @property int $foiz
 * @property int $nn
 * @property int $activ
 */
class SPapka extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_papka';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom'], 'required'],
            [['kat', 'nn', 'activ'], 'integer'],
            [['nom_uz'], 'string', 'max' => 150],
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
            'kat' => 'Kat',
            'nn' => 'Nn',
            'activ' => 'Activ',
        ];
    }
}
