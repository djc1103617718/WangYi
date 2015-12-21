<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::t('app', '密码修改');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="reset-password">

    <?php $form = ActiveForm::begin([]); ?>



    <!--<label class="control-label" for="user-password">请输入新密码：</label>
    <input type="password" id="user-password" class="form-control" name="User[password]" value="">-->

    <?= $form->field($model, 'password')->passwordInput()->label('请输入密码'); ?>

    <?= $form->field($model, 'passwordRepeat')->passwordInput()->label('请再次输入密码'); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '修改'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
