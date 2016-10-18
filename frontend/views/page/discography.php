<?
/**
 * @var array $albums
 * @var $this yii\web\View
 */

use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

$this->title = 'Discography';
?>
    <hr>
<? if (!empty($albums) && is_array($albums)): ?>
    <div class="col-md-5">
        <h2 class="page-title">Albums</h2>

        <? foreach ($albums as $album): ?>
            <? /* @var $album \common\models\Album */ ?>
            <div class="item">
                <h3 class="item-title"><?= $album->name ?></h3>
                <span class="year"><?= $album->year ?></span>
                <img class="cover show-songs" src="<?= $album->thumbnail ?>" alt="<?= $album->name ?>">
                <a href="#" class="button small secondary show-songs">Listen to</a>
                <div class="social-share">
                    <span>Share:</span>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>
        <? endforeach; ?>

    </div>
    <div class="col-md-5 col-md-push-2" id="songs">
        <h2 class="page-title">Songs</h2>

        <? foreach ($albums as $album): ?>
            <div class="<?= $album->name ?> album" style="display: none">
                <? if (!empty($album->songs) && is_array($album->songs)): ?>
                    <? foreach ($album->songs as $song): ?>
                        <? /* @var $song \common\models\Song */ ?>
                        <div class="item">
                            <h3 class="item-title"><?= $song->name ?></h3>
                            <span class="year"><?= $album->name?>: <?=$album->year ?></span>
                            <audio controls>
                                <source src="<?= $song->link ?>" type="audio/mpeg">
                                Тег audio не поддерживается вашим браузером.
                                <a href="<?= $song->link ?>">Скачайте музыку</a>.
                            </audio>
                            <div class="social-share">
                                <span>Share:</span>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    <? endforeach; ?>
                <? endif; ?>
            </div>
        <? endforeach; ?>

    </div>
<? endif; ?>
<script>
    $(function () {
        $('.show-songs').on('click', function (e) {
            e.preventDefault();
            var album = $(this).closest('.item').children('.item-title').text();
            $('#songs .album').hide();
            $('#songs .' + album + '.album').fadeToggle();
        })
    });
</script>
