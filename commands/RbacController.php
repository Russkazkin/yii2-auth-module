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

        $admin = $auth->createRole('admin');
        $editor = $auth->createRole('editor');
        $user = $auth->createRole('user');

        $auth->add($admin);
        $auth->add($editor);
        $auth->add($user);



    }
    public function actionPurge()
    {
        Yii::$app->authManager->removeAll();
        echo 'All RBAC data was purged' . PHP_EOL;
    }
}