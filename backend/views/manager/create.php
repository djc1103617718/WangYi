<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Manager */
/* @var $form yii\widgets\ActiveForm */
/* @var $this yii\web\View */
/* @var $model backend\models\Manager */

$this->title = Yii::t('app', 'Create Manager');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Managers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="manager-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput()->label('UserName'); ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Create'), ['class' =>'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>