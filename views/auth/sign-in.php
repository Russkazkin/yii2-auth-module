<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\modules\auth\models\SigninForm.php */

use app\modules\auth\Module;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = Module::t('auth', 'Sign In');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Module::t('auth', 'Please fill out the following fields to login:'); ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div style="color:#999;margin:1em 0">
                <?= Module::t('auth', 'If you forgot your password you can '); ?><?= Html::a(Module::t('auth', 'reset it'),
                    ['site/request-password-reset']) ?>.
            </div>

            <div class="form-group">
                <?= Html::submitButton(Module::t('auth', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
