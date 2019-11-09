<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $client_id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $site_address
 * @property int $x_tur_id
 * @property string $login
 * @property string $userpass
 * @property string $fio
 * @property string $kod
 * @property string $kim
 * @property string $tarmoq
 * @property string $vaqtin
 * @property string $vaqtout
 * @property int $flag
 * @property int $active
 * @property int $del_flag
 * @property int $dyum
 * @property int $int1
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id','int1', 'status', 'created_at', 'updated_at', 'x_tur_id', 'flag', 'active', 'del_flag', 'dyum'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'site_address', 'del_flag', 'dyum'], 'required'],
            [['vaqtin', 'vaqtout'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'site_address'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['login', 'userpass', 'fio', 'kim', 'tarmoq'], 'string', 'max' => 150],
            [['kod'], 'string', 'max' => 13],
            [['username'], 'unique'],
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
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'site_address' => 'Site Address',
            'x_tur_id' => 'X Tur ID',
            'login' => 'Login',
            'userpass' => 'Userpass',
            'fio' => 'Fio',
            'kod' => 'Kod',
            'kim' => 'Kim',
            'tarmoq' => 'Tarmoq',
            'vaqtin' => 'Vaqtin',
            'vaqtout' => 'Vaqtout',
            'flag' => 'Flag',
            'active' => 'Active',
            'del_flag' => 'Del Flag',
            'dyum' => 'Dyum',
        ];
    }
}
