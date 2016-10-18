<? $quotes = \common\models\Quote::findAll(['status' => 1]); ?>
<? if ($quotes && is_array($quotes)): ?>
    <div class="fullwidth-block testimonial-section">
        <div class="container">
            <div class="quote-slider">
                <ul class="slides">
                    <? foreach ($quotes as $quote): ?>
                        <? /** @var $quote \common\models\Quote */ ?>
                        <li>
                            <blockquote>
                                <p><?= $quote->content ?></p>
                                <cite><?= $quote->title ?></cite>
                                <span><?= $quote->description ?></span>
                            </blockquote>
                        </li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>
    </div> <!-- .testimonial-section -->
<? endif; ?>