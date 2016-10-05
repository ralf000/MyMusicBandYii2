<?
/**
 * @var $this \yii\web\View
 * @var $article \common\models\Blog model
 */
?>
<? $this->title = $article->title?>
<figure class="featured-image">
    <img src="<?= $article->thumbnail?>" alt="<?= $article->title?>">
</figure>
<div>Date: <?= date('H:i:s d-m-Y', $article->created_at)?></div><br>
<p class="leading"><?= $article->description?></p>
<div>
    <?= $article->content?>
</div>