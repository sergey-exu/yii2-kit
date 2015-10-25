<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\components\rbac\UserGroupRule;


class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll(); //delete all old data

        //permission
        //add permission 'backend'
        $backend = $auth->createPermission('backend');
        $backend->description = 'access to backend';
        $auth->add($backend);
        //add permission 'user_lk'
        //$user_lk = $auth->createPermission('user_lk');
        //$user_lk->description = 'access to user_lk';
        //$auth->add($user_lk);
        
        
        // Add rule, based on User->role === $user->role
        $userGroupRule = new UserGroupRule();
        $auth->add($userGroupRule);
        
        /*
        //role
        // add "user" role and give this role the "user_lk" permission
        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $user_lk);

        // add "admin" role and give this role the "backend" permission
        // as well as the permissions of the "user_lk" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $backend);
        //$auth->addChild($admin, $user);
        */
        
        $user = $auth->createRole('user');
        $admin = $auth->createRole('admin');
        
        $user->ruleName  = $userGroupRule->name;
        $admin->ruleName  = $userGroupRule->name;
        
        $auth->add($user);
        $auth->add($admin);
        
        //$auth->addChild($admin, $user);
        
        
        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        //$auth->assign($user, 2);
        //$auth->assign($admin, 1);
    }
}