# yii2-auth-module
Authentication module for yii2 basic app

Install

* Add 'user.passwordResetTokenExpire' => 3600 to params.php
* Add this to web.php 'modules' section:

        'auth' => [
            'class' => 'app\modules\auth\Module'
        ],
