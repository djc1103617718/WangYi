<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Manager */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manager-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['readonly' => 'readonly'])->label('UserName'); ?>
    <?= $form->field($model, 'status')->dropDownList($model::statusArray() , array('prompt' => '请选择管理员的权限状态'))->label('status'); ?>
    <input type = "hidden" name = 'manager[id]' value = "<?= $model->id?>" />

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Update'), ['class' =>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>