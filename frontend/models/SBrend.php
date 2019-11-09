<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "s_brend".
 *
 * @property int $id
 * @property string $nom
 * @property int $kat_id
 */
class SBrend extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_brend';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom'], 'required'],
            [['kat_id'], 'integer'],
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
            'kat_id' => 'Kat ID',
        ];
    }
}
