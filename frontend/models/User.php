<?php

namespace frontend\models;

use Yii;
use common\models\User as UserCommon;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
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
class User extends UserCommon
{
    /**
     * @return array
     */
    public function scenarios()
    {
        return [
            'updateProfile' => ['email', 'username', 'updated_at'],
            'passwordReset' => ['password', 'updated_at'],
            'signup' => ['username', 'password', 'email', 'created_at', 'updated_at'],
            'default' => [
                'username',
                'password',
                'email',
                'created_at',
                'updated_at'
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'updated_at', 'created_at'], 'required'],
            [['username', 'password', 'email'], 'filter', 'filter' => 'trim'],
            [['status', 'updated_at', 'created_at'], 'integer'],
            [['username'], 'string', 'max' => 32],
            [['username', 'email'], 'unique'],
            [['password'], 'string','min' => 6, 'max' => 60, 'tooShort' => '123'],
            //['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'message' => 'The two passwords do not match'],
            [['email'], 'string', 'max' => 64],
            ['email','email'],
            ['status', 'safe']
        ];
    }

    /**
     * @param string $password
     * @return string|void
     */
    public function setPassword($password)
    {
        return $password = md5(sha1($password));
    }


    /**
     * @return array|null|\yii\db\ActiveRecord
     * @throws NotFoundHttpException
     */
    public static function findModelByUsername()
    {
        if ($username = Yii::$app->session['__username']) {
            if (($model = User::find()->where(['username' => $username])->one()) !== null) {
                return $model;
            }
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
