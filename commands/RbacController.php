<?php


namespace app\modules\auth\commands;


use Yii;
use yii\console\Controller;


class RbacController extends Controller
{
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();

        echo 'All RBAC data was purged...' . PHP_EOL;

        $admin = $auth->createRole('admin');
        $editor = $auth->createRole('editor');
        $user = $auth->createRole('user');

        $auth->add($admin);
        $auth->add($editor);
        $auth->add($user);

        echo 'Users added...' . PHP_EOL;

        $createArticle = $auth->createPermission('createArticle');
        $createArticle->description = 'Blog module articles creation';
        $auth->add($createArticle);

        $editOwnArticle = $auth->createPermission('editOwnArticle');
        $editOwnArticle->description = 'Blog module user articles editing';
        $auth->add($editOwnArticle);

        $deleteOwnArticle = $auth->createPermission('deleteOwnArticle');
        $deleteOwnArticle->description = 'Blog module user articles deleting';
        $auth->add($deleteOwnArticle);

        $editAllArticles = $auth->createPermission('editAllArticles');
        $editAllArticles->description = 'Blog module articles deleting';
        $auth->add($editAllArticles);

        $adminArticlesPermissions = $auth->createPermission('adminArticlesPermissions');
        $adminArticlesPermissions->description = 'Blog module admin articles permissions';
        $auth->add($adminArticlesPermissions);

        echo 'Permissions added...' . PHP_EOL;

        $auth->addChild($user, $createArticle);
        $auth->addChild($user, $editOwnArticle);
        $auth->addChild($user, $deleteOwnArticle);
        $auth->addChild($editor, $user);
        $auth->addChild($editor, $editAllArticles);
        $auth->addChild($admin, $editor);
        $auth->addChild($admin, $adminArticlesPermissions);

        echo 'Permissions assigned...' . PHP_EOL;

        echo 'All tasks complete' . PHP_EOL;

    }
    public function actionPurge()
    {
        Yii::$app->authManager->removeAll();
        echo 'All RBAC data was purged' . PHP_EOL;
    }
}