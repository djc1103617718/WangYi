<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserCommon */
/* @var $form ActiveForm */

$this->title = Yii::t('app', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-signup">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password')->passwordInput(); ?>
    <?= $form->field($model, 'passwordRepeat')->passwordInput(); ?>
    <?= $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-signup -->