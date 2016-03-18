<?php
namespace backend\modules\dashboard\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use backend\modules\dashboard\models\Metrika;
use backend\modules\dashboard\models\MetrikaV2;

class DefaultController extends Controller
{
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }
    
    
    public function actionIndex()
    {
        $metrika = new MetrikaV2();
        
        if (Yii::$app->request->isAjax && Yii::$app->request->get('id')) {
            return $metrika->getData(Yii::$app->request->get('id'));
        }
        return $this->render('index');
    }
}
