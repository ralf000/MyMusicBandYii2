<?
/**
 * @var $this \yii\web\View
 * @var $galleries array Gallery models
 */
use yii\helpers\Html;

?>
<? $this->title = 'Galleries' ?>
<? if (isset($galleries)): ?>
    <? foreach ($galleries as $gallery): ?>
        <div class="post">
            <div class="entry-date">
                <div class="date"><?= date('d', $gallery->created_at) ?></div>
                <span class="month"><?= date('M', $gallery->created_at) ?></span>
            </div>
            <h2 class="entry-title">
                <?= Html::a($gallery->name, ['blog/article', 'id' => $gallery->id])?>
            </h2>
            <div class="featured-image">
                <img src="<?= $gallery->thumbnail?>" alt="">
            </div>
            <?= Html::a('Read more', ['gallery/view', 'id' => $gallery->id], ['class' => 'pull-right'])?>
        </div>
    <? endforeach; ?>
<? endif; ?>