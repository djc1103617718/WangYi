<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Index');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'category_name',
                'header' => 'Category Name',
                'value' => 'category.name',
                //'filter' => Html::input('text','category_name',isset($_GET['category.name'])?$_GET['category.name']:'',['class'=>'form-control filter']),
            ],
            'title',
            'description',
            'content:text',
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s', $model->created_at);
                }
            ],
            [
                'attribute' => 'updated_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s', $model->updated_at);
                }
            ],
            //['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{views}',
                'buttons' => [
                    'views' => function ($url,$model,$key) {
                    return Html::a('<span class = "glyphicon glyphicon-eye-open"></span>',Url::to(['show/view', 'id' => $model->id]), ['title' => 'View']);
                }]
            ],
        ],
    ]); ?>

</div>