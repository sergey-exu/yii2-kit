<?php
namespace backend\controllers;
use yii\filters\AccessControl;

class FileManagerController extends \yii\web\Controller
{
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ]
        ];
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }
}