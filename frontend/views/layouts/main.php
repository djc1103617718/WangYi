<?php

use yii\helpers\Html;
use backend\assets\AppAsset;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use common\widgets\Alert;
use common\models\Category;


/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage()?>
    <!DOCTYPE html>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>

    <?php $this->beginBody() ?>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= Url::to(['show/index'])?>" style = 'color:#e7e8e9'>网易新闻</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if (empty($this->params['click'])) : $this->params['click'] = null; endif ?>
                    <?php $i = 0;foreach (Category::NavBarCategory() as $key => $value):?>
                        <?php if (($i == 0 && empty($this->params['click'])) || $key == $this->params['click']) :
                                echo "<li class='addclick active'><a href = " . Url::to(['show/index','NewsSearch[category_id]' => $key]) . "> $value </a></li>";
                            else :
                                echo "<li class='addclick'><a href = " . Url::to(['show/index','NewsSearch[category_id]' => $key]) . "> $value </a></li>";
                        endif ;
                        $i++;
                        ?>
                    <?php endforeach ?>
                </ul>
                <form class="navbar-form navbar-left" role="search" method="get" action="<?= Url::to(['show/search'])?>">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (!Yii::$app->session['isLogin']):
                        echo "<li class='addclick'><a href=" . Url::to(['user/login']) . ">登录</a></li>";
                        echo "<li class='addclick'><a href=" . Url::to(['user/signup']) . ">注册</a></li>";
                    else :
                         echo   "<li class='dropdown'>
                                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>设置 <span class='caret'></span></a>
                                    <ul class='dropdown-menu' style = 'background:#101010;'>
                                        <li><a style = 'color:#9d9d9d;' href=" . Url::to(['user-centre/reset-password']) . ">重置密码</a></li>
                                        <li role='separator' class='divider'></li>
                                        <li><a style = 'color:#9d9d9d;' href=" . Url::to(['user-centre/index']) . ">个人资料</a></li>
                                    </ul>
                                </li>";
                         echo "<li class='addclick'><a href=" . Url::to(['user/logout']) . ">退出</a></li>";
                    endif ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

    <?php $this->endBody() ?>

    </body>
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <script>
    jQuery(document).ready(function() {
        $('.dropdown').mouseover(function(){
            $('.dropdown-menu').show();
        });
        $('.dropdown-menu').mouseout(function(){
            $(this).hide();
        })


    });
    </script>
    </html>
<?php $this->endPage() ?>