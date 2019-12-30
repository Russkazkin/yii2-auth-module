<?php


namespace app\modules\auth\components;


use app\modules\blog\models\Article;
use Yii;
use yii\base\BaseObject;

class RbacComponent extends BaseObject
{
    public function haveAdminPermissions() : bool
    {
        return Yii::$app->user->can('adminPermissions');
    }

    public function haveEditorPermissions() : bool
    {
        return Yii::$app->user->can('editorPermissions');
    }

    public function canCreateArticle() : bool
    {
        return Yii::$app->user->can('createArticle');
    }

    public function canViewArticle(Article $article) : bool
    {
        if (Yii::$app->user->can('editorPermissions')) {
            return true;
        }

        if (Yii::$app->user->can('viewOwnArticle', ['article' => $article])) {
            return true;
        }

        return false;
    }

    public function canEditArticle(Article $article) : bool
    {
        if (Yii::$app->user->can('editorPermissions')) {
            return true;
        }

        if (Yii::$app->user->can('editOwnArticle', ['article' => $article])) {
            return true;
        }

        return false;
    }
}