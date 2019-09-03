<?php


namespace app\modules\auth\controllers;


use app\modules\auth\controllers\actions\AuthLogOutAction;
use app\modules\auth\controllers\actions\AuthRequestPasswordResetAction;
use app\modules\auth\controllers\actions\AuthSignInAction;
use app\modules\auth\controllers\actions\AuthSignUpAction;
use app\modules\auth\controllers\actions\ResetPasswordAction;
use app\modules\auth\controllers\base\BaseController;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class AuthController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'sign-up' => ['class' => AuthSignUpAction::class],
            'sign-in' => ['class' => AuthSignInAction::class],
            'logout' => ['class' => AuthLogOutAction::class],
            'request-password-reset' => ['class' => AuthRequestPasswordResetAction::class],
            'password-reset' => ['class' => ResetPasswordAction::class],
        ];
    }
}