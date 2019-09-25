<?php


namespace app\modules\auth\commands;


use yii\console\Controller;

class RbacController extends  Controller
{
    public function actionIndex($message = 'hello world from module')
    {
        echo $message . PHP_EOL;
    }
}