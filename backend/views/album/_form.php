<?php

use newerton\fancybox\FancyBox;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Album */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '9999',
    ])?>

    <? $fmUrl = '/extensions/filemanager/dialog.php?akey=' . Yii::$app->params['fileManagerPrivateKey'] . '&type=1&field_id=album-thumbnail'; ?>
    <?= $form->field($model, 'thumbnail', ['template' => "{label}\n<div class=\"input-group\"><span class=\"input-group-btn\"><a class=\"btn btn-default fancybox.iframe\" id=\"fileManager\" href=\"$fmUrl\" type=\"button\"><span class=\"glyphicon glyphicon-plus\"></span></a></span>{input}\n</div>\n{hint}\n{error}"]); ?>

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
        var ths = $('#album-thumbnail');
        $('#files').remove();
        ths.closest('.form-group')
            .append('<div id="files" class="files"><img style="width: 20%; padding: 7px;" src="' + ths.val() + '" alt="" /></div>');
    }

    function responsive_filemanager_callback(ths) {
        addImage();
    }

    $(function () {
        addImage();
    });
</script>
