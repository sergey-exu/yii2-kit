<?php

namespace frontend\controllers;

use Yii;
use backend\modules\page\models\Page;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
{
    //public $layout = 'column2';
    
    public function actionIndex()
    {
        $model = Page::find()->where(['alias'=>'main'])->one();
        
        if(!$model){
            throw new NotFoundHttpException(\Yii::t('common', 'Page not found'));
        }
        return $this->render('index', ['model'=>$model]);
    }
    
    public function actionView($alias)
    {
        $model = Page::find()->where(['alias'=>$alias])->one();
        
        if(!$model){
            throw new NotFoundHttpException(\Yii::t('common', 'Page not found'));
        }
        return $this->render('view', ['model'=>$model]);
    }
    
}
