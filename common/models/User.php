<?php

namespace common\models;

use Yii;

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
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'updated_at', 'created_at'], 'required'],
            [['status', 'updated_at', 'created_at'], 'integer'],
            [['username'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 40],
            [['email'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', '用户名'),
            'password' => Yii::t('app', '密码'),
            'email' => Yii::t('app', '邮箱'),
            'status' => Yii::t('app', '用户状态'),
            'updated_at' => Yii::t('app', '更新时间'),
            'created_at' => Yii::t('app', '创建时间'),
        ];
    }
}
