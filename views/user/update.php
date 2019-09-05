<?php

use app\modules\auth\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\base\BaseUser */

$this->title = Module::t('auth', 'Update User: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Module::t('auth', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('auth', 'Update');
?>
<div class="base-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
