<?php

use newerton\fancybox\FancyBox;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GalleryImages */
/* @var $form yii\widgets\ActiveForm */
/* @var $galleries array */
/* @var $tags array */
?>

<div class="gallery-images-form">

    <?php $form = ActiveForm::begin(); ?>

    <? $fmUrl = '/extensions/filemanager/dialog.php?akey=' . Yii::$app->params['fileManagerPrivateKey'] . '&type=1&field_id=galleryimages-image'; ?>
    <?= $form->field($model, 'image', ['template' => "{label}\n<div class=\"input-group\"><span class=\"input-group-btn\"><a class=\"btn btn-default fancybox.iframe\" id=\"fileManager\" href=\"$fmUrl\" type=\"button\"><span class=\"glyphicon glyphicon-plus\"></span></a></span>{input}\n</div>\n{hint}\n{error}"]); ?>

    <?= $form->field($model, 'gallery_name_id')->dropDownList($galleries)->label('Gallery') ?>

    <?= $form->field($model, 'tag', ['template' => "{label}\n<div class=\"input-group\"><span class=\"input-group-btn\"><a class=\"btn btn-default fancybox.iframe\" id=\"add-tag\" href=\"#\" type=\"button\"><span class=\"glyphicon glyphicon-plus\"></span></a></span>{input}\n</div>\n{hint}\n{error}"])->dropDownList($tags); ?>

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
        var ths = $('#galleryimages-image');
        if (ths.val().search(/(.jpe?g)|(.gif)|(.png)/i) != -1) {
            $('#files').remove();
            ths.closest('.form-group')
                .append('<div id="files" class="files"><img style="width: 20%; padding: 7px;" src="' + ths.val() + '" alt="" /></div>');
        }
    }
    function responsive_filemanager_callback(ths) {
        addImage();
    }

    $(function () {
        $('#add-tag').on('click', function (e) {
            e.preventDefault();
            var result = prompt('Введите новый тег');
            if (result) {
                $('#galleryimages-tag option').removeAttr('selected');
                $('#galleryimages-tag').prepend('<option value="' + result + '" selected>' + result + '</option>');
            }
        });
    });
</script>

