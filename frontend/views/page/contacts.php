<?
/* @var $page \common\models\Page */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

$this->title = $page->title;
?>

<div class="col-md-6">
    <?php echo ($f = Yii::$app->session->getAllFlashes()) ? implode('<br>', $f) : false; ?>
    <?= $page->content ?: null ?>
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
        <div class="map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=w1AmasNlVtCdLv72yo4EZr-_bECbXUIm&amp;width=auto&amp;height=310&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
        </div>
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