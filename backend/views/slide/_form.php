<?php

use newerton\fancybox\FancyBox;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Slide */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slide-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link')->textInput() ?>

    <? $fmUrl = '/extensions/filemanager/dialog.php?akey=' . Yii::$app->params['fileManagerPrivateKey'] . '&type=1&field_id=slide-image'; ?>
    <?= $form->field($model, 'image', ['template' => "{label}\n<div class=\"input-group\"><span class=\"input-group-btn\"><a class=\"btn btn-default fancybox.iframe\" id=\"fileManager\" href=\"$fmUrl\" type=\"button\"><span class=\"glyphicon glyphicon-plus\"></span></a></span>{input}\n</div>\n{hint}\n{error}"]); ?>

    <?= $form->field($model, 'status')->dropDownList([1 => 'Published', 0 => 'Unpublished']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?
echo FancyBox::widget([
    'target' => '#fileManager',
    'config' => [
        'fitToView' => false,
        'autoSize' => false,
        'width' => '80%',
        'height' => '80%',
        'type' => 'iframe',
    ]
]);
?>
<script>
    function addImage() {
        var host = (location.pathname.indexOf('update') !== -1) ? location.protocol + '//' + location.host.split('.')[1] : '';
        var ths = $('#slide-image');
        $('#files').remove();
        ths.closest('.form-group')
            .append('<div id="files" class="files"><img style="width: 20%; padding: 7px;" src="' + host + ths.val() + '" alt="" /></div>');
    }

    function responsive_filemanager_callback(ths) {
        addImage();
    }

    $(function () {
        addImage();
    });
</script>