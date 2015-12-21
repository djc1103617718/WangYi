<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model backend\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'view'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <h3>
            <?= $model->description;?>
        </h3>
        <hr/>
        <p>
            <?= $model->content;?>
        </p>
    </div>
    <hr/>
    <div>
        <h4>网友评论：&nbsp;&nbsp;<span><?= $commentNum.'人发表评论' ?></span> &nbsp;&nbsp;
            &nbsp;&nbsp; <?php if (!Yii::$app->session['isLogin']):?>
            <?= Html::a('注册', ['user/signup']) ?>
            <?php endif ?>

            <br/>

        </h4>
        <div class="">
            <?php $form = ActiveForm::begin([
                'action' => ['comment/create', 'from' => Url::to(['show/view', 'id' => $model->id])],
                'method' => 'post',
            ]); ?>
            <?= $form->field($comment, 'content')->textarea()->label('内 容：'); ?>
            <input type = 'hidden' name = 'Comment[news_id]' value = <?= $model->id ?> />
            <hr/><br/>
            <?php if (Yii::$app->session['isLogin']) :
                 echo Html::submitButton('发表',['class' => 'btn']);
            else :
                 echo Html::submitButton('登录并发表', ['class' => 'btn']);
            endif;
            ActiveForm::end();?>
        </div>
    </div>
    <br/>
    <div>
        <?php foreach ($commentData as $data):?>
        <hr/>
        <p>
            <span>回复于：<?= date('Y-m-d h:i:s', $data->created_at)?></span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>用户名：<?= Html::encode($data->username) ?></span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>IP: <?= Html::encode($data->ip) ?></span>
        </p>
        <p>
            <?= Html::encode($data->content) ?>
        </p>
        <?php endforeach ?>
        <?= LinkPager::widget([
            'pagination' => $pagination,
            'firstPageLabel' => '第一页',
            'lastPageLabel' => '最后一页',
            'prevPageLabel' => '前一页',
            'nextPageLabel' => '下一页',
        ])?>
    </div>

</div>
