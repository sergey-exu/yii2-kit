<?php

namespace backend\modules\user\controllers;

use yii\web\Controller;
use Yii;
use backend\modules\user\models\LoginForm;
use backend\modules\user\models\PasswordResetRequestForm;
use backend\modules\user\models\ResetPasswordForm;
use backend\modules\user\models\SignupForm;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;

//use yii\base\InvalidParamException;
//use yii\web\BadRequestHttpException;


//-------------------------------------------
use backend\modules\user\models\User; 
use yii\data\ActiveDataProvider; 
use yii\web\NotFoundHttpException;
//-------------------------------------------



class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout', 'login', 'error'],
                'rules' => [
                    [
                        'actions' => ['logout', 'signup'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    //---------------------------------------------
                    'delete' => ['post'],
                    //---------------------------------------------
                ],
            ],
        ];
    }
    
    
    
    //------------------------------------------------------------------------------------
    /*
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
           'query' => User::find(),
       ]);
       
       return $this->render('index', [
           'dataProvider' => $dataProvider,
       ]);
    }
    
    public function actionView($id)
    {
       return $this->render('view', [
           'model' => $this->findModel($id),
       ]);
    }
    
    public function actionCreate()
   {
       $model = new User();
       if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['view', 'id' => $model->id]);
       } else {
           return $this->render('create', [
               'model' => $model,
           ]);
       }
   }
   
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['view', 'id' => $model->id]);
       } else {
           return $this->render('update', [
               'model' => $model,
           ]);
       }
    }
    
    
    public function actionDelete($id)
    {
       $this->findModel($id)->delete();
       return $this->redirect(['index']);
    }
    
    
    protected function findModel($id)
    {
       if (($model = User::findOne($id)) !== null) {
           return $model;
       } else {
           throw new NotFoundHttpException('The requested page does not exist.');
       }
    }
   */
    //----------------------------------------------------------------------------------------
    
    
    public function actionLogin()
    {
        //set page template
        $this->layout = 'login';
        
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    
    public function actionRequestPasswordReset()
    {
        $this->layout = 'login';
        
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    
}
