<?php

 namespace backend\models;

 use Yii;
 use yii\base\Model;
 use backend\models\User;
 use backend\models\Manager;

 /**
  * LoginForm is the model behind the login form.
  */
 class ManagerLoginForm extends Model
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

     /**
      * @return bool
      */
     public function isManager()
     {
         $model = User::find()->where(['username' => $this->username])->andWhere(['status' => 1])->one();
         $manager = Manager::find()->where(['user_id' => $model->id, 'status' => 1])->one();
         if ($manager) {
             return true;
         }
         return false;
     }

     /**
      * @return bool
      */
     public function whetherLoggedIn()
     {
         if (Yii::$app->session['isManager']) {
             return true;
         }
     }
 }