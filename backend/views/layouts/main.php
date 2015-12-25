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

    <?php $navbar_nar = [
        1 => "<a href = " . Url::to(['news/index', 'click' => 1]) . "> 新闻管理 </a>",
        2 => "<a href = " . Url::to(['category/index', 'click' => 2]) . "> 新闻分类管理 </a>",
        3 => "<a href = " . Url::to(['user-manager/index', 'click' => 3]) . "> 用户管理 </a>",
        4 => "<a href = " . Url::to(['manager/index', 'click' => 4]) . "> 管理员管理 </a>",
    ];
    ?>
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
                <a class="navbar-brand" href="#" style = 'color:#e7e8e9'>网易新闻</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if (empty($this->params['click'])) : $this->params['click'] = null; endif ?>
                    <?php foreach ($navbar_nar as $key => $value):?>
                        <?php if ($key == $this->params['click']) :
                            echo "<li class='addclick active'>$value</li>";
                        else :
                            echo "<li class='addclick'>$value</li>";
                        endif ;
                        ?>
                    <?php endforeach ?>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?php if(Yii::$app->session['isManager']): ?>
                        <li class="addclick"><a href="<?= Url::to(['user/logout']) ?>">退出</a></li>
                    <?php else: ?>
                        <li class="addclick"><a href="<?= Url::to(['user/login']) ?>">登录</a></li>
                    <?php endif ?>
                    <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>-->
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
       $('.addclick').click(function(){
           $('.addclick').removeClass('active');
           $(this).addClass('active');
       })
    });
    </script>
    </html>
<?php $this->endPage() ?>