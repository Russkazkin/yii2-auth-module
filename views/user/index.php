<?php

use app\modules\auth\Module;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\auth\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('auth', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="base-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('auth', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'options' => ['width' => '20']
            ],
            [
                'attribute' => 'username',
                'options' => ['width' => '100']
            ],
            [
                'attribute' => 'name',
                'options' => ['width' => '150']

            ],
            [
                'attribute' => 'email',
                'options' => ['width' => '150'],
                'format' =>  ['email'],
            ],
            [
                'attribute' => 'status',
                'options' => ['width' => '100'],
                'content' => function($data){
                    return $data->status === 0 ? Module::t('auth', 'Deleted') : Module::t('auth', 'Active');
                }
            ],
            //'authKey',
            //'password_hash',
            //'password_reset_token',
            [
                'attribute' => 'created_at',
                'format' =>  'date',
                'options' => ['width' => '160']
            ],
            [
                'attribute' => 'updated_at',
                'format' =>  'date',
                'options' => ['width' => '160']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
