<?php
/* @var $this yii\web\View */

/* @var $gallery \common\models\Gallery */
/* @var $tags array gallery's tags (GalleryImages models) */
$this->title = "Gallery «{$gallery->name}»"; ?>
<? if (!empty($gallery) && $gallery instanceof \common\models\Gallery && is_array($tags)):?>
<div class="filter-links filterable-nav">
    <select class="mobile-filter">
        <option value="*">Show all</option>
        <? foreach ($tags as $tag): ?>
            <? /* @var $tag \common\models\GalleryImages */ ?>
            <option value=".<?= $tag->tag ?>"><?= $tag->tag ?></option>
        <? endforeach; ?>
    </select>
    <a href="#" class="current" data-filter="*">Show all</a>
    <? foreach ($tags as $tag): ?>
        <a href="#" data-filter=".<?= $tag->tag ?>"><?= $tag->tag ?></a>
    <? endforeach; ?>
</div>
<div class="filterable-items">
    <? foreach ($gallery->images as $image): ?>
        <? /* @var $image \common\models\GalleryImages */ ?>
        <div class="filterable-item <?= $image->tag ?>">
            <a href="<?= $image->image ?>">
                <figure><img src="<?= $image->thumbnail ?>" alt="<?= $image->tag?>"></figure>
            </a>
        </div>
    <? endforeach; ?>
</div>
<? else: ?>
    <p>This gallery is empty</p>
<? endif;?>
<?= \yii\helpers\Html::a('Back', ['/gallery'], ['class' => 'pull-right', 'style' => 'color: #fd5927; text-decoration: none;'])?>
