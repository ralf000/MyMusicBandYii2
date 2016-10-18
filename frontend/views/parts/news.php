<? $news = \common\models\Blog::findAll(['status' => 1]); ?>
<? if ($news && is_array($news)): ?>
    <div class="fullwidth-block upcoming-event-section" data-bg-color="#191919">
        <div class="container">
            <header class="section-header">
                <h2 class="section-title">Upcoming events</h2>

                <div class="event-nav">
                    <a class="prev" id="event-prev" href="#"><i class="fa fa-caret-left"></i></a>
                    <a class="next" id="event-next" href="#"><i class="fa fa-caret-right"></i></a>
                </div> <!-- .event-nav -->

            </header> <!-- .section-header -->
            <div class="event-carousel">

                <? foreach ($news as $article): ?>
                    <? /** @var $article \common\models\Blog */ ?>
                    <div class="event">
                        <div class="entry-date">
                            <div class="date"><?= date('d', $article->created_at) ?></div>
                            <span class="month"><?= date('M', $article->created_at) ?></span>
                        </div>
                        <h2 class="entry-title"><a
                                href="/blog/article?id=<?= $article->id ?>"><?= ucfirst($article->title) ?></a></h2>
                        <p><?= substr($article->description, 0, 50) ?>...</p>
                    </div> <!-- .event -->
                <? endforeach; ?>

            </div> <!-- .event-carousel -->
        </div> <!-- .container -->
    </div> <!-- .upcoming-event-section -->
<? endif; ?>