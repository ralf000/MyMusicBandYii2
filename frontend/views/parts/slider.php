<? $slider = \common\models\Slide::findAll(['status' => 1]); ?>
<? if ($slider && is_array($slider)): ?>
    <div class="hero">
        <div class="slider">
            <ul class="slides">
                <? foreach ($slider as $slide): ?>
                    <? /** @var $slide \common\models\Slide */ ?>
                    <li class="lazy-bg" data-background="<?= $slide->image ?>">
                        <div class="container">
                            <h2 class="slide-title"><?= $slide->title ?></h2>
                            <h3 class="slide-subtitle"><?= $slide->description ?></h3>
                            <p class="slide-desc"><?= $slide->content ?></p>

                            <a href="<?= $slide->link ?>" class="button cut-corner">Read More</a>
                        </div>
                    </li>
                <? endforeach; ?>
            </ul>
        </div>
    </div>
<? endif; ?>