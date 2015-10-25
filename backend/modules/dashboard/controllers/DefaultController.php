<?php
namespace backend\modules\dashboard\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use backend\modules\dashboard\models\Metrika;

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
        $metrika = new Metrika();
        
        if (Yii::$app->request->isAjax && $i=Yii::$app->request->get('id')) {
            
            switch ($i) {
                case "traffic":
                    return $metrika->getData(Metrika::TRAFFIC);
                    break;
                case "sources":
                    return $metrika->getData(Metrika::SOURCES);
                    break;
                case "geo":
                    return $metrika->getData(Metrika::GEO);
                    break;
                case "content":
                    return $metrika->getData(Metrika::CONTENT);
                    break;
            }
        
        }
        return $this->render('index');
    }
    
}
