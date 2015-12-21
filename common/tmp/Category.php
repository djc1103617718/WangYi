<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

class Category extends \yii\db\ActiveRecord
{
    /**
     * @var array
     */
    private static $categoryList = array();

    public static function tableName()
    {
        return '{{%category}}';
    }

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