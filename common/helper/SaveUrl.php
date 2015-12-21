<?php

namespace common\helper;

use Yii;
use yii\helpers\Url;

/**
 * Class SaveUrl
 * @package common\helper
 */
class SaveUrl
{
    /**
     * @param $url
     * @return bool
     */
    public static function isSafeUrl($url)
    {
        $websiteBaseUrl = dirname(Yii::getAlias('@app'));
        preg_match('%[^/]+[\w]+$%',$websiteBaseUrl,$baseUrl);
        $position = strpos($url,$baseUrl[0]);
        if ($position === 1) {
            return true;
        }
        return false;
    }

}