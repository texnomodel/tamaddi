<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "s_izm".
 *
 * @property int $id
 * @property string $nom
 * @property string $nom_ru
 */
class SIzm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_izm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom', 'nom_ru'], 'required'],
            [['nom', 'nom_ru'], 'string', 'max' => 50],
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
        ];
    }
}
