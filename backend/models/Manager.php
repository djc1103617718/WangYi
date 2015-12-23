<?php

namespace backend\models;

use Yii;
use common\models\Manager as ManagerCommon;
use common\models\User;
/**
 * This is the model class for table "wy_manager".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Manager extends ManagerCommon
{
    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'status' => 'Manager Status',
        ];
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['user_id', 'required'],
            ['user_id', 'unique', 'message' => '该用户已经是管理员'],
        ];
    }

    /**
     * @return $this|static
     */
    public function getUser()
    {
        return $this->hasOne(User::className(),['id' => 'user_id'])->select(['id', 'username', 'status']);
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getUsername($user_id)
    {
        $model = $this->findOne($user_id);
        $username = $model->user->username;
        return $username;
    }
}