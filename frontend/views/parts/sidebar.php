<aside class="sidebar">
    <div class="widget">
        <h3 class="widget-title">Discography</h3>
        <? $albums = \common\models\Album::findAll(['status' => 1]) ?>
        <? if ($albums && is_array($albums)): ?>
            <ul class="discography-list">
                <? foreach ($albums as $album): ?>
                    <? /**@var $album \common\models\Album */ ?>
                    <li>
                        <figure class="cover"><img src="<?= $album->thumbnail ?>" alt="<?= $album->name ?>"></figure>
                        <div class="detail">
                            <h3><a href="/page/discography"><?= $album->name ?></a></h3>
                            <span class="year"><?= $album->year ?></span>
                            <span class="track">Tracks: <?= $album->getNumberTracks() ?></span>
                        </div>
                    </li>
                <? endforeach; ?>
            </ul>
        <? else: ?>
            <p>Albums not found</p>
        <? endif; ?>
    </div>
</aside>