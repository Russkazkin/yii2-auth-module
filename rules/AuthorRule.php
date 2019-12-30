<?php

namespace app\modules\auth\rules;

use yii\rbac\Rule;

class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    /**
     * @inheritDoc
     */
    public function execute($user, $item, $params)
    {
        /* @var \app\modules\blog\models\Article $article */

        $article = $params['article'];

        return $article->user_id == $user;
    }
}