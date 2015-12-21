<?php

namespace frontend\models;

use Yii;
use common\models\User as UserCommon;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $status
 * @property integer $updated_at
 * @property integer $created_at
 */
class UserTest extends UserCommon
{
    /**
     * @return array
     */
    public function scenarios()
    {
        return [
            'needValidatePassword' => ['password', 'username'],
            'setPassword' => ['passwordRepeat'],
            'createTime' => 'created_at',
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'on' => 'needValidatePassword'],
            ['email', 'required'],
            [['username', 'password', 'email'], 'filter', 'filter' => 'trim'],
            [['status', 'updated_at', 'created_at'], 'integer'],
            ['username', 'string', 'max' => 32, 'min' => 6, 'message' => 'oh! no you should input at least six'],
            [['username', 'email'], 'unique'],
            [['password'], 'string','min' => 6, 'max' => 60, 'message' => 'Password length must not be greater than 40 is less than six'],
            //['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'message' => 'The two passwords do not match'],
            [['email'], 'string', 'max' => 64],
            ['email','email'],
        ];
    }

    public function attributeLabels()
    {
        ArrayHelper::merge(parent::attributeLabels(), [
            'passwordRepeat' => Yii::t('app', '再次输入密码'),
            'originalPassword' => Yii::t('app', '输入原有密码'),
        ]);
    }
    public function validateOriginalPassword($attribute, $params)
    {
        $model = User::find()->where(['username' => Yii::$app->session['username']])->one();
        if (!empty($model) && $this->$attribute == $model->password) {
            return true;
        }
        $this->addError($attribute, 'The original password is error!');
    }

    public function say_hello($parm){
        echo "你应该会看到:".$parm->data.'<br>';
    }

    public function say_goodbye($parm){
        echo "你应该会看到:".$parm->data.'<br>';
    }

    public static $var = 0;
    public function s()
    {
        self::$var++;
        echo self::$var;
        echo "<br/>";
    }


}
