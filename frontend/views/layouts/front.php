<?
/**
 * @var $this \yii\web\View
 */

use frontend\assets\FrontAsset;

FrontAsset::register($this);
$this->beginPage(); ?>

<!--Выводим header-->
<?= $this->render('//parts/header') ?>

<?= $this->render('//parts/slider') ?>

<main class="main-content">

    <?= $this->render('//parts/blockquotes'); ?>

    <?= $this->render('//parts/news'); ?>

    <?= $this->render('//parts/chooseus'); ?>

</main> <!-- .main-content -->

<?= $this->render('//parts/footer'); ?>

</div> <!-- #site-content -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>