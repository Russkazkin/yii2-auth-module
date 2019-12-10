<?php

namespace app\modules\auth;

use Yii;
use yii\base\BootstrapInterface;
use yii\console\Application;

/**
 * auth module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\auth\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function bootstrap($app)
    {
        //To execute commands in docker container type docker-compose exec php php yii auth/{controller}/{action}
        if ($app instanceof Application) {
            $this->controllerNamespace = 'app\modules\auth\commands';
        }
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['auth'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@app/modules/auth/messages',
            'fileMap' => [
                'auth' => 'auth.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t($category, $message, $params, $language);
    }
}
