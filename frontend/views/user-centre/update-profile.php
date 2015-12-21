<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('app', '更新帐户信息');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="update-profile">

    <?php $form = ActiveForm::begin([]); ?>

    <?= $form->field($model, 'username')->label('请修改用户名：'); ?>

    <?= $form->field($model, 'email')->label('请修改邮箱：'); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '修改'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- login -->
