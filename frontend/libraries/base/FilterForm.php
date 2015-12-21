<?php

namespace frontend\libraries\base;

use Yii;
use yii\helpers\arrayHelper;

/**
 * Class FilterForm
 * @package frontend\libraries\base
 */
class FilterForm
{
    //private static $_link;
    /*
    private static function conn()
    {
        if (!empty(self::$_link)) {
            return self::$_link;
        }
        $config = Yii::$app->db;
        $con = mysqli_connect('localhost', $config->username, $config->password, 'wangyi');
        if (mysqli_connect_errno($con)) {
            echo 'Failed to connect to Mysql:' . mysqli_connect_errno();
        }
        self::$_link = $con;

        return self::$_link;
    }*/

    /**
     * @param $params
     * @return array
     */
    public static function filterHtml($params)
    {
        $arr = [];
        foreach ($params as $k => $v) {
            if (!is_array($v)) {
                $v = htmlspecialchars($v);
                $arr[$k] = $v;
            } else {
                $arr[$k] = self::filterHtml($v);
            }
        }
        return $arr;
    }
}
