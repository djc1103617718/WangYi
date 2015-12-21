<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\User;

/**
 * LoginForm is the model behind the login form.
 */
class UserLoginForm extends Model
{
    public $username;
    public $password;
    //public $rememberMe = true;

    //private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            //['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'myValidatePassword'],
        ];
    }

    /**
     * @param $attribute
     * @param $params
     * @return bool
     */
    public function myValidatePassword($attribute, $params)
    {
        $model = User::find()->where(['username' => $this->username])->andWhere(['status' => 1])->one();

        if (!empty($model) && $model->setPassword($this->$attribute) == $model->password) {
            return true;
        }
        $this->addError($attribute, 'The username or password is error!');
    }

    /**
     * @return bool
     */
    public function Login()
    {
        if (!$this->validate()) {
            return false;
        }
        return true;
    }

    public function whetherLoggedIn()
    {
        if (Yii::$app->session['isLogin']) {
            return true;
        }
    }

}
