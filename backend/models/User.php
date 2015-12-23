<?php

namespace backend\models;

use Yii;
use common\models\User as UserCommon;

class User extends UserCommon
{
    /**
     * @param string $password
     * @return string|void
     */
    public function setPassword($password)
    {
        return $password = md5(sha1($password));
    }
}