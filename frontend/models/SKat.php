<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "s_kat".
 *
 * @property int $id
 * @property string $nom
 */
class SKat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_kat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom'], 'required'],
            [['nom'], 'string', 'max' => 250],
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
        ];
    }
}
