<? $pages = \common\models\Page::findAll([3, 4, 5]); ?>
<? if ($pages && is_array($pages)): ?>
    <div class="fullwidth-block why-chooseus-section">
        <div class="container">
            <h2 class="section-title">Information</h2>

            <div class="row">
                <? foreach ($pages as $page): ?>
                    <? /** @var $page \common\models\Page */ ?>
                    <div class="col-md-4">
                        <div class="feature">
                            <h2 class="feature-title"><?= $page->title ?></h2>
                            <figure class="cut-corner">
                                <img src="<?= $page->thumbnail ?>" alt="">
                            </figure>
                            <h3 class="feature-title"><?= $page->description ?></h3>
                            <?= $page->content ?>
                        </div> <!-- .feature -->
                    </div>
                <? endforeach; ?>
            </div>
        </div> <!-- .container -->
    </div> <!-- .why-chooseus-section -->
<? endif; ?>