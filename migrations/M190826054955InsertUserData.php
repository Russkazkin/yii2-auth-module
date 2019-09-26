<?php

namespace app\modules\auth\migrations;

use Yii;
use yii\db\Migration;

/**
 * Class M190826054955InsertUserData
 */
class M190826054955InsertUserData extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'admin',
            'name' => 'Admin',
            'authKey' => 'test100key',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'password_reset_token' => '100-token',
            'email' => 'admin@examle.com',
            'created_at' => strtotime('now'),
            'updated_at' => strtotime('now'),
        ]);
        $this->insert('user', [
            'username' => 'user',
            'name' => 'User',
            'authKey' => 'test101key',
            'password_hash' => Yii::$app->security->generatePasswordHash('user'),
            'password_reset_token' => '101-token',
            'email' => 'user@example.com',
            'created_at' => strtotime('now'),
            'updated_at' => strtotime('now'),
        ]);
        $this->insert('user', [
            'username' => 'editor',
            'name' => 'Editor',
            'authKey' => 'test102key',
            'password_hash' => Yii::$app->security->generatePasswordHash('editor'),
            'password_reset_token' => '102-token',
            'email' => 'editor@example.com',
            'created_at' => strtotime('now'),
            'updated_at' => strtotime('now'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('user');
    }
}
