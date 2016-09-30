<?
/**
 * @var $this \yii\web\View
 */
/**
 * @var $content string
 */

use frontend\assets\FrontAsset;

FrontAsset::register($this);
$this->beginPage(); ?>

<?= $this->render('//parts/header') ?>

    <main class="main-content">

        <div class="fullwidth-block testimonial-section">
            <div class="container">

                <h2 class="page-title"><?=\yii\helpers\Html::encode($this->title)?></h2>
                <?= $content ?>

            </div>
        </div>

    </main> <!-- .main-content -->

<?= $this->render('//parts/footer'); ?>

    </div> <!-- #site-content -->

<?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>