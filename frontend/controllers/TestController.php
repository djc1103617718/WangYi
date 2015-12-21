<?php

namespace frontend\controllers;

use Yii;
//use frontend\libraries\base\Controller;
use yii\web\Controller;
use frontend\libraries\base\FilterForm;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\UserTest;

/**
 * Class TestController
 *
 * @package frontend\controllers
 */
class TestController extends Controller
{
    public function actionRedirect()
    {
        $this->redirect(['user/login', 'id' => 1, 'news_id' => $_GET['news_id']]);
    }

    public function actionEvent()
    {
        echo '这是事件处理<br/>';

        $person = new UserTest();

        $this->on('SayHello', [$person, 'say_hello'], '你好，朋友');

        $this->on('SayGoodBye', ['frontend\models\UserTest', 'say_goodbye'], '再见了，我的朋友');

        $this->on('GoodNight', function () {
            echo '晚安！';
        });


        $this->trigger('SayHello');
        $this->trigger('SayGoodBye');
        $this->trigger('GoodNight');
    }

    public function actionStatic()
    {
        $test = new UserTest();
        echo $test->s();
        $t = new UserTest();
        echo $t->s();
        echo $test->s();
    }


}