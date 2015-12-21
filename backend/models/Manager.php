<?php

namespace backend\models;

use Yii;
use common\models\Manager as ManagerCommon;
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
    public function getUser()
    {
        return $this->hasOne(UserCommon::className(),['id' => 'user_id']);
    }

    public function getUsername($user_id)
    {
        $model = $this->findOne($user_id);
        $username = $model->user->username;
        $arr[$user_id] = $username;
        return $arr;
    }
}