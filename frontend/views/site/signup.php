<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
?>

<p>Please fill out the following fields to signup:</p>

<?php $form = ActiveForm::begin([
    'id' => 'form-signup',
    'options' => ['class' => 'contact-form'],
]); ?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'password')->passwordInput() ?>

<div class="form-group">
    <?= Html::submitInput('Signup', ['name' => 'signup-button']) ?>
</div>

<?php ActiveForm::end(); ?>
