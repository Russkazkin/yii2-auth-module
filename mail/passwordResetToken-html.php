<?php

use app\modules\auth\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\modules\auth\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['/auth/password-reset', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p><?= Module::t('auth', 'Hello {name}', [
            'name' => $user->name,
        ]);?>,</p>

    <p><?= Module::t('auth', 'Follow the link below to reset your password:'); ?></p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
