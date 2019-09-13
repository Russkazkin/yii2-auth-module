<?php

/* @var $this yii\web\View */
/* @var $user app\modules\auth\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['auth/password-reset', 'token' => $user->password_reset_token]);

use app\modules\auth\Module; ?>

<?= Module::t('auth', 'Hello {name}', [
    'name' => $user->name,
]);?>,

<?= Module::t('auth', 'Follow the link below to reset your password:'); ?>

<?= $resetLink ?>
