<?php


use yii\rbac\Rule;

class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    /**
     * @inheritDoc
     */
    public function execute($user, $item, $params)
    {

    }
}