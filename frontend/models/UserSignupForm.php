<?php
namespace frontend\models;

use frontend\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class UserSignupForm extends Model
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
    public $password;
    /**
     * @var
     */
    public $passwordRepeat;
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
            [['username', 'email', 'password', 'passwordRepeat'], 'required', 'message' => '不能为空'],
            ['username', 'unique', 'targetClass' => '\frontend\models\User', 'message' => '该用户名已经存在.'],
            ['username', 'string', 'min' => 2, 'max' => 32, 'tooShort' => '用户名长度不得少于２.', 'tooLong' => '用户名长度不得长于３２.'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email', 'message' => '邮箱格式不正确'],
            ['email', 'string', 'max' => 64, 'message' => '邮箱长度不得超过６４.'],
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => '该邮箱已经被注册.'],
            [['password', 'passwordRepeat'], 'string', 'min' => 6, 'max' => 40, 'tooShort' => '密码长度不得小于６', 'tooLong' => '密码长度不得大于４０'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'message' => '两次输入的密码不一致'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app','用户名'),
            'email' => Yii::t('app','邮箱'),
            'password' => Yii::t('app','密码'),
            'passwordRepeat' => Yii::t('app','重复密码')
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->setScenario('signup');
            $user->username = $this->username;
            $user->email = $this->email;
            $user->created_at = time();
            $user->updated_at = time();
            $user->password = $user->setPassword($this->password);
            //echo '<pre>';var_dump($user);die;
            if ($user->save()) {
                return true;
            }
           var_dump($user->getErrors());die;
        }
        return null;
    }
}
