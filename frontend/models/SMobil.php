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
 * @property string $qavat
 * @property int $activ
 */
class SMobil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_mobil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom'], 'required'],
            [['foiz', 'nn', 'activ'], 'integer'],
            [['nom'], 'string', 'max' => 150],
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
            'foiz' => 'Foiz',
            'qavat' => 'Qavat',
            'nn' => 'Nn',
            'activ' => 'Activ',
        ];
    }
}
