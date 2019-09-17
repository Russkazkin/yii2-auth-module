# yii2-auth-module
Authentication module for yii2 basic app

Install

* Add 'user.passwordResetTokenExpire' => 3600 to params.php
* Add this to web.php 'modules' section:

        'auth' => [
            'class' => 'app\modules\auth\Module'
        ],
* Add this to web.php and console.php 'components' section:

        'authManager' => [
            'class' => DbManager::class,
        ],
* Add this to console.php 'controllerMap' section:

        'migrate-auth' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationNamespaces' => ['app\modules\auth\migrations'],
            'migrationTable' => 'migration_auth'
        ],
        'migrate-rbac' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => '@yii/rbac/migrations',
            'migrationTable' => 'migration_rbac',
        ],

and apply these migrations.
