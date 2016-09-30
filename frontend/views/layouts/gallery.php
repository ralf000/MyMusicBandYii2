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

        <div class="fullwidth-block gallery">
            <div class="container">
                <div class="content fullwidth">
                    <h1 class="entry-title"><?= \yii\helpers\Html::encode($this->title) ?></h1>
                    <div class="row">
                        <?= $content ?>
                    </div>
                </div>

            </div>
        </div>

    </main> <!-- .main-content -->

<?= $this->render('//parts/footer'); ?>

    </div> <!-- #site-content -->

<?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>