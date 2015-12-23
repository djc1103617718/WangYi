<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use backend\models\Manager;
use common\models\User;
/**
 * This is the model class for table "wy_manager".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class ManagerForm extends Model
{
    /**
     * @var
     */
    public $username;
    /**
     * @var
     */
    public $status;
    /**
     * @var
     */
    public $user_id;
    /**
     * @var
     */
    public $id;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'string', 'max' => 32],
            ['status', 'required'],
            [['user_id', 'id'], 'integer']
        ];
    }

    /**
     * @return mixed
     */
    protected function getUserIdByUsername()
    {
        $model = User::find()->where(['user_id' => $this->username, 'status' => 1])->one();

        if ($model) {
            $user_id = $model->id;
            return $user_id;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function createManager()
    {
        if ($this->validate() && $user_id = $this->getUserIdByUsername()) {
            $model = new Manager();
            $model->user_id = $user_id;
            $model->status = 1;
            $model->created_at = time();
            $model->updated_at = time();
            if ($model->save()) {
                return true;
            }
        return false;
        }

    }

    /**
     * @return array
     */
    public static function statusArray()
    {
        return [
            1 => '获得管理员权限',
            2 => '冻结管理员权限',
        ];
    }

    /**
     * @return bool
     */
    public function UpdateManager()
    {
        if ($this->validate()) {
            $manager = Manager::findOne($this->id);
            $manager->status = $this->status;
            $manager->updated_at = time();
            if ($manager->save()) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $id
     * @return $this
     */
    public function getModel($id)
    {
        $manager = Manager::findOne($id);
        $this->id = $id;
        $this->user_id = $manager->user_id;
        $this->username = $manager->getUsername($this->user_id);
        $this->status = $manager->status;
        return $this;
    }

}