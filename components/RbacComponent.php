<?php


namespace app\modules\auth\components;


use Yii;
use yii\base\BaseObject;

class RbacComponent extends BaseObject
{
    public function haveAdminPermissions() : bool
    {
        return Yii::$app->user->can('adminPermissions');
    }

    public function canCreateArticle() : bool
    {
        return Yii::$app->user->can('createArticle');
    }
}