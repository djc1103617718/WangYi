<?php
namespace frontend\models;

use Yii;
use frontend\models\User;
use yii\base\Model;

/**
 * Signup form
 */
class UserResetPasswordForm extends Model
{
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
    public $updated_at;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'passwordRepeat'], 'required', 'message' => '不能为空'],
            [['password', 'passwordRepeat'], 'string', 'min' => 6, 'max' => 40, 'tooShort' => '密码长度不得小于６', 'tooLong' => '密码长度不得大于４０'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'message' => '两次输入的密码不一致'],

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
     * @return bool
     * @throws NotFoundHttpException
     */
    public function resetPassword()
    {
        if ($this->validate()) {
            $user = User::findModelByUsername();

            $user->setScenario('passwordReset');
            $user->password = $user->setPassword($this->password);
            $user->updated_at = time();
            if ($user->save()) {
                return $user;

            }
        }
        return false;
    }

}
