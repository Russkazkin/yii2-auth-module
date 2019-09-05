<?php

use app\modules\auth\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\base\BaseUser */

$this->title = Module::t('auth', 'Create User');
$this->params['breadcrumbs'][] = ['label' => Module::t('auth', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="base-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
