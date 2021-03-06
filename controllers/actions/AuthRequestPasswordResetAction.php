<?php


namespace app\modules\auth\controllers\actions;


use app\modules\auth\controllers\base\BaseAction;
use app\modules\auth\models\PasswordResetRequestForm;
use app\modules\auth\Module;
use Yii;

class AuthRequestPasswordResetAction extends BaseAction
{
    /**
     * @return mixed
     * @throws \yii\base\Exception
     */
    public function run()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', Module::t('auth', 'Check your email for further instructions.'));

                return $this->controller->goHome();
            } else {
                Yii::$app->session->setFlash('error', Module::t('auth', 'Sorry, we are unable to reset password for the provided email address.'));
            }
        }

        return $this->controller->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }
}