<?php

namespace backend\models;

use Yii;
use common\models\Category;
use common\models\News as NewsCommon;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property integer $created_at
 * @property integer $updated_at
 */
class News extends NewsCommon
{
    /**
     * @inheritdoc
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }
}