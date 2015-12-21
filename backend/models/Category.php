<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\Category as CategoryCommon;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $pid
 * @property integer $created_at
 * @property integer $updated_at
 */
class Category extends CategoryCommon
{
    /**
     * @var array
     */
    public $categoryArray = null;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'pid', 'created_at', 'updated_at'], 'required','on' => ['create','update']],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 64],
        ];
    }


}
