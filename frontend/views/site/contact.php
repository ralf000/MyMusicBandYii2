<?php
/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */
$this->title = 'Contact Us';
?>

<div class="col-md-6">
    <?php echo ($f = Yii::$app->session->getAllFlashes()) ? implode('<br>', $f) : false; ?>
    <?php $form = ActiveForm::begin([
        'id' => 'contact-form',
        'options' => ['class' => 'contact-form'],
    ]); ?>

    <?= $form->field($model, 'name', ['enableLabel' => false])
        ->textInput(['autofocus' => true, 'placeholder' => 'Your name..']) ?>

    <?= $form->field($model, 'email', ['enableLabel' => false])
        ->textInput(['placeholder' => 'Email Address..']) ?>

    <?= $form->field($model, 'subject', ['enableLabel' => false])
        ->textInput(['placeholder' => 'Subject']) ?>

    <?= $form->field($model, 'body', ['enableLabel' => false])->textarea(['rows' => 6])
        ->textarea(['placeholder' => 'Message...']) ?>

    <?= $form->field($model, 'verifyCode', ['enableLabel' => false])->widget(Captcha::className(), [
        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>',
        'options' => ['placeholder' => 'CAPTCHA Code']
    ]) ?>


    <div class="form-group">
        <?= Html::submitInput('Send message', ['name' => 'submit']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<div class="col-md-6">
    <div class="map-wrapper">
        <div class="map"></div>
        <address>
            <div class="row">
                <div class="col-sm-6">
                    <strong> Company Name INC.</strong>
                    <span> 40 Sibley St, Detroit </span>
                </div>
                <div class="col-sm-6">
                    <a href="mailto:office@companyname.com"> office@companyname.com </a> <br>
                    <a href="tel:532930098891"> (532) 930 098 891 </a>
                </div>
            </div>
        </address>
    </div>
</div>