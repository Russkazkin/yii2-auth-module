<?php


namespace app\modules\auth\controllers;


use app\modules\auth\controllers\base\BaseUserController;
use app\modules\auth\models\User;
use Yii;
use yii\helpers\Url;

class UserController extends BaseUserController
{
    /**
     * @param int $id
     * @return mixed|\yii\web\Response
     */
    public function actionDelete($id)
    {
        $user = User::findOne($id);
        $user->status = 0;
        $user->save();

        return $this->redirect(['index']);
    }

    public function actionCreate()
    {
        return Yii::$app->response->redirect(Url::to('/auth/auth/sign-up'));
    }
}