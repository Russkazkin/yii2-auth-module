# yii2-auth-module
Authentication module for yii2 basic app

Install

* Add 'user.passwordResetTokenExpire' => 3600 to params.php
* Add this to web.php 'modules' section:

        'auth' => [
                    'class' => 'app\modules\auth\Module',
                    'components' => [
                        'rbac' => RbacComponent::class
                    ]
        ],
* Add this to console.php 'modules' section:

        'auth' => [
            'class' => 'app\modules\auth\Module'
        ],
* Replace user component config in web.php with next code:

        'user' => [
            'identityClass' => 'app\modules\auth\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['auth/sign-in'],
        ],
* Add this to web.php ''i18n' => ['translations'] section:
        
        'blog*' => [
            'class' => PhpMessageSource::class,
            'basePath' => '@app/modules/auth/messages',
            'fileMap' => [
                'auth' => 'auth.php'
            ]
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
* Add this to console.php 'bootstrap' section:

        'auth'

and apply these migrations.

