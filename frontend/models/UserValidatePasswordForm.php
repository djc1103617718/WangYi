<?php
namespace frontend\models;

use frontend\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class UserValidatePasswordForm extends Model
{
    /**
     * @var
     */
    public $originalPassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['originalPassword'], 'required', 'message' => '不能为空'],
            [['originalPassword'], 'string', 'min' => 6, 'max' => 40, 'tooShort' => '密码长度不得小于６', 'tooLong' => '密码长度不得大于４０'],
            ['originalPassword', 'validateOriginalPassword'],

        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'password' => Yii::t('app', '请输入新密码'),
            'passwordRepeat' => Yii::t('app', '请确认新密码'),
        ];
    }

    /**
     * @param $attribute
     * @param $params
     * @return bool
     */
     public function validateOriginalPassword($attribute, $params)
     {
         $user = User::findModelByUsername();
         //var_dump($user->setPassword($this->$attribute));echo '<br/><pre>';var_dump($user);die;
         if (!empty($user) && $user->setPassword($this->$attribute) == $user->password) {
             return true;
         }
         $this->addError($attribute, '密码错误!');
     }

    /**
     * @return bool
     * @throws NotFoundHttpException
     */
    public function validatePassword()
    {
        if ($this->validate()) {
            return true;
        }

        return false;
    }

}
