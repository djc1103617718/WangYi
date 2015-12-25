<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\searches\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'created_at')->widget(DatePicker::className(), [
        'language' => 'zh-CN',
        'clientOptions' => [
            'format' => 'yyyy-MM-dd',
        ]
    ])?>
    <?= $form->field($model, 'updated_at')->widget(DatePicker::className(), [
        'language' => 'zh-CN',
        'clientOptions' => [
            'format' => 'yyyy-MM-dd',
        ]
    ])?>
    <?php  //echo $form->field($model, 'created_at') ?>

    <?php  //echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>