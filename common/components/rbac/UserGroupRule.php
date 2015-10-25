<?php
namespace common\components\rbac;

use Yii;
use yii\rbac\Rule;
 
class UserGroupRule extends Rule
{
    public $name = 'userGroup';
 
    public function execute($user, $item, $params)
    {
        if (!\Yii::$app->user->isGuest) {
            $role = \Yii::$app->user->identity->role;
            if ($item->name === 'admin') {
                return $role == 'admin';
            } elseif ($item->name === 'user') {
                return $role == 'user';
            }
        }
        return false;
    }
}