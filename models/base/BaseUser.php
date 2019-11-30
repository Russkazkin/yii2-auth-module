<?php

namespace app\modules\auth\models\base;

use app\modules\auth\Module;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string $authKey
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class BaseUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name', 'authKey', 'password_hash', 'email'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'name'], 'string', 'max' => 48],
            [['authKey'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('auth', 'ID'),
            'username' => Yii::t('auth', 'Username'),
            'name' => Yii::t('auth', 'Name'),
            'authKey' => Yii::t('auth', 'Auth Key'),
            'password_hash' => Yii::t('auth', 'Password Hash'),
            'password_reset_token' => Yii::t('auth', 'Password Reset Token'),
            'email' => Yii::t('auth', 'Email'),
            'status' => Yii::t('auth', 'Status'),
            'created_at' => Yii::t('auth', 'Created At'),
            'updated_at' => Yii::t('auth', 'Updated At'),
        ];
    }
}
