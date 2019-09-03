<?php


namespace app\modules\auth\controllers\actions;


use app\modules\auth\controllers\base\BaseAction;
use Yii;

class AuthLogOutAction extends BaseAction
{
    public function run()
    {
        Yii::$app->user->logout();

        return $this->controller->goHome();
    }
}