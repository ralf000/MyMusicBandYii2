<?php

use common\helpers\Helper;
use newerton\fancybox\FancyBox;
use xvs32x\tinymce\Tinymce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->widget(Tinymce::className(), [
        //TinyMCE options
        'pluginOptions' => [
            'plugins' => [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
            ],
            'toolbar1' => "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            'toolbar2' => "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor ",
            'image_advtab' => true,
            'filemanager_title' => "Filemanager",
            'language' => explode('-', Yii::$app->language)[0],
            'height' => '400px',
        ],
        //Widget Options
        'fileManagerOptions' => [
            'configPath' => [
                'upload_dir' => '/upload/filemanager/source/',
                'current_path' => dirname(__DIR__) . '/../../frontend/web/upload/filemanager/source/',
                'thumbs_base_path' => '/upload/filemanager/thumbs/',
                'base_url' => Helper::getHost(),
            ]
        ]
    ]);
    ?>

    <? $fmUrl = '/extensions/filemanager/dialog.php?akey=' . Yii::$app->params['fileManagerPrivateKey'] . '&type=1&field_id=page-thumbnail'; ?>
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
        var ths = $('#page-thumbnail');
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
