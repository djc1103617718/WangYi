<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\searches\ManagerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Managers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Manager'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_id',
            [
                'attribute' => 'username',
                'value' => function($model){
                    return $model->user->username;
                }
            ],
            [
                'attribute' => 'userStatus',
                'value' => function($model){
                    if ($model->user->status == 1) {
                        return '合法';
                    }
                    return '冻结';
                }
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    if ($model->status == 1) {
                        return '合法';
                    }
                    return '冻结';
                }
            ],
            [
                'attribute' =>'created_at',
                'value' => function($model){
                    return date('Y-m-d H:i:s', $model->created_at);
                }
            ],
            [
                'attribute' =>'updated_at',
                'value' => function($model){
                    return date('Y-m-d H:i:s', $model->updated_at);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>