<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\searches\CategorySearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Category');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'pid',
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

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'Action',
            ],

        ],
    ]); ?>

</div>