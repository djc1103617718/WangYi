<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

$this->title = Yii::t('app', '个人账户');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '更新个人账户'), ['update-profile', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '密码修改'), ['reset-password', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '注销账户'), ['logout-account', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '你想要注销这个帐号吗?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => '用户名',
                'value' => $model->username,
            ],
            [
                'label' => '邮箱',
                'value' => $model->email,
            ],
            [
                'label' => '创建时间',
                'value' => date('Y-m-d H:i:s', $model->created_at)

            ],
            [
                'label' => '修改时间',
                'value' => date('Y-m-d H:i:s', $model->updated_at)

            ],
        ],
    ])
    ?>

</div>
