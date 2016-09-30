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

        <div class="fullwidth-block inner-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="content">

                            <h2 class="entry-title"><?= \yii\helpers\Html::encode($this->title) ?></h2>
                            <?= $content ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-md-push-1">
                        <?= $this->render('//parts/sidebar') ?>
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