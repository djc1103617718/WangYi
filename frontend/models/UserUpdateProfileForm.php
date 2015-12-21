<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\User;

/**
 * Signup form
 */
class UserUpdateProfileForm extends Model
{
    /**
     * @var
     */
    public $username;
    /**
     * @var
     */
    public $email;
    /**
     * @var
     */


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            [['username', 'email'], 'required', 'message' => '不能为空'],
            ['username', 'unique', 'targetClass' => '\frontend\models\User', 'message' => '该用户名已经存在.'],
            ['username', 'string', 'min' => 2, 'max' => 32, 'tooShort' => '用户名长度不得少于２.', 'tooLong' => '用户名长度不得长于３２.'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email', 'message' => '邮箱格式不正确'],
            ['email', 'string', 'max' => 64, 'message' => '邮箱长度不得超过６４.'],
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => '该邮箱已经被注册.'],

        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app','用户名'),
            'email' => Yii::t('app','邮箱'),
        ];
    }

    /**
     * Signs user up.
     * @return User|null the saved model or null if saving fails
     */
    public function updateProfile()
    {
        if ($this->validate()) {
            $user = new User();
            $user->setScenario('updateProfile');
            $user->username = $this->username;
            $user->email = $this->email;
            $user->updated_at = time();
            if ($user->save()) {
                return $user;
            }
        }
        return false;
    }

}
