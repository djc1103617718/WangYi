<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::t('app', '用户验证');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="validate-password">

    <?php $form = ActiveForm::begin([
        'method' => 'post',
    ]); ?>

    <input type = 'hidden' name = 'action' value = <?= $action ?>/>

    <?= $form->field($model, 'originalPassword')->passwordInput(); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '提交'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
