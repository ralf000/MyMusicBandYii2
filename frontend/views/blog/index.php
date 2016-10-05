<?
/**
 * @var $this \yii\web\View
 * @var $articles array Blog models
 */
use yii\helpers\Html;

?>
<? $this->title = 'Blog' ?>
<? if (isset($articles)): ?>
    <? foreach ($articles as $article): ?>
        <div class="post">
            <div class="entry-date">
                <div class="date"><?= date('d', $article->created_at) ?></div>
                <span class="month"><?= date('M', $article->created_at) ?></span>
            </div>
            <div class="featured-image">
                <img src="<?= $article->thumbnail?>" alt="">
            </div>
            <h2 class="entry-title">
                <?= Html::a($article->title, ['blog/article', 'id' => $article->id])?>
            </h2>
            <p><?= $article->description ?></p>
            <?= Html::a('Read more', ['blog/article', 'id' => $article->id])?>
        </div>
    <? endforeach; ?>
<? endif; ?>