<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LoginForm */
/* @var $form ActiveForm */

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="login">

    <?php $form = ActiveForm::begin([
        'action' => ['user/login', 'from' => $from],
    ]); ?>

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput(); ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Signup'), [Url::to('signup')], ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- login -->
