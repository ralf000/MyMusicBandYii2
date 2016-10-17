<?
/**
 * @var $model \common\models\Page
 */
?>
<? $this->title = $model->title ?>
<? if (!empty($model->thumbnail)): ?>
    <figure class="featured-image">
        <img src="<?= $model->thumbnail ?>" alt="<?= $model->title ?>">
    </figure>
<? endif; ?>
<? if (!empty($model->description)): ?>
    <p class="leading"><?= $model->description ?></p>
<? endif; ?>
<?= $model->content ?>