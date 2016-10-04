<?php

use common\helpers\Helper;
use mihaildev\ckeditor\CKEditor;
use xvs32x\tinymce\Tinymce;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'thumbnail', ['options' => ['style' => 'display:none',
        'id' => 'insert-img']])->widget(Tinymce::className(), [
        //TinyMCE options
        'pluginOptions' => [
            'plugins' => [
                "responsivefilemanager"
            ],
            'toolbar1' => "responsivefilemanager",
            'toolbar2' => "",
            'image_advtab' => false,
            'filemanager_title' => "Filemanager",
            'language' => explode('-', Yii::$app->language)[0],
            'setup' => new \yii\web\JsExpression("function(editor){
                editor.on('change', function () {
                    editor.save();
                });
            }"),
        ],
        //Widget Options
        'fileManagerOptions' => [
            'configPath' => [
                'upload_dir' => '/upload/filemanager/source/',
                'current_path' => dirname(__DIR__) . '/../../frontend/web/upload/filemanager/source/',
                'thumbs_base_path' => '/upload/filemanager/thumbs/',
                'base_url' => Helper::getHost()
            ]
        ]
    ]);
    ?>

    <a id="img" class="btn btn-danger" href="#"><span class="glyphicon glyphicon-plus"></span> Add thumbnail</a>

    <div id="files" class="files" style="margin-bottom: 10px; display: none;"></div>

    <?= $form->field($model, 'status')->dropDownList([1 => 'Published', 0 => 'Unpublished']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<script>
    function readURL(input, evt, box) {
        var files = evt.target.files;

        for (var i = 0, f; f = files[i]; i++) {
            if (!f.type.match('image.*'))
                continue;
            var reader = new FileReader();
            reader.onload = function (e) {
                $('<img/>').attr('src', e.target.result).addClass('thumb').appendTo(box);
            };
            reader.readAsDataURL(f);
            box.fadeIn();
        }
    }
    function addHandlers() {
        $("#insert-img").change(function (e) {
            $('#files').empty().hide();
            readURL($(this), e, $('#files'));
        });
        $('#img').on('click', function (e) {
            e.preventDefault();
            $('#insert-img [aria-label="Insert file"]').last().click();
            tinyMCE.get('blog-thumbnail').setContent('');
        });
    }
    $(function () {
        addHandlers();
        setInterval(function () {
            if (tinyMCE.get('blog-thumbnail').getContent().length > 0) {
                $('#files').empty();
                var content = tinyMCE.get('blog-thumbnail').getContent().match(/.*(<p>|src=")(.+)(<\/p>|").*/);
                content = content[2];
                if (content.indexOf(location.hostname.split('.')[1]) === -1)
                    content = 'http://' + location.hostname.split('.')[1] + content;
                $('#files').append('<img src="'+content + '"/>');
                if (!$('#files').is(':visible'))
                    $('#files').fadeIn();
            }
        }, 500);
    });
</script>
