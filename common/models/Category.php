<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $pid
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'pid', 'sort', 'created_at', 'updated_at'], 'required'],
            [['pid', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'pid' => Yii::t('app', 'Pid'),
            'sort' => Yii::t('app', 'Sort'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @var array
     */
    private static $categoryList = array();

    /**
     * @return array
     */
    public static function getCategoryList()
    {
        if (empty(self::$categoryList)) {
            $list = self::find()->all();
        } else {
            $list = self::$categoryList;
        }

        $arr = [];
        foreach ($list as $v) {
            $arr[$v->id] = $v->name;
        };
        self::$categoryList = $arr;

        return $arr;
    }

    /**
     * @param $categoryName
     * @return int|string
     */
    public static function getPidByCategory($categoryName)
    {
        if (empty(self::$categoryList)) {
            $list = self::find()->all();
        } else {
            $list = self::$categoryList;
        }

        $pid = '';
        foreach ($list as $k => $v) {
            if ($v == $categoryName) {
                $pid = $k;
                break;
            }
        }

        return $pid;
    }

    /**
     * @return array
     */
    public static function NavBarCategory()
    {
        $list = self::find()->where(['pid' => 0])->orderBy('sort DESC')->all();
        $arr = [];
        foreach ($list as $k => $v) {
            $arr[$v->id] = $v->name;
        }
        return $arr;
    }
}
