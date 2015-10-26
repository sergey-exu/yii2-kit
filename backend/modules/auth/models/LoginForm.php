<?php
namespace backend\modules\auth\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('backend', 'Incorrect username or password.'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            //$this->_user = User::findByUsername($this->username);
            
            //Находим пользователя в БД по логину или эл.почте
            $this->_user = User::find()
                ->where(['or', ['username' => $this->username], 
                                ['email' => $this->username]])
                ->one();
            
            //Проверяем права доступа, если нет, то делаем вид,
            //что пользователь не найден.
            //if (!Yii::$app->user->can('admin', ['user' => $this->_user])) {
            //if (!Yii::$app->user->can('admin')) {
            
            if ($this->_user && $this->_user->role !== 'admin') {
                $this->_user = null;
            }
            
        }
        return $this->_user;
    }
    
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('backend', 'Username or email'),
            'password' => Yii::t('backend', 'Password'),
            'rememberMe' => Yii::t('backend', 'Remember Me'),
        ];
    }
}
