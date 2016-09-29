<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <?= \yii\helpers\Html::csrfMetaTags() ?>

    <title><?= \yii\helpers\Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="header-collapse">
<?php $this->beginBody() ?>

<div id="site-content">
    <header class="site-header">
        <div class="container">
            <a href="index.html" id="branding">
                <img src="dummy/logo.png" alt="Site Title">
                <small class="site-description">Slogan goes here</small>
            </a> <!-- #branding -->

            <nav class="main-navigation">
                <button type="button" class="toggle-menu"><i class="fa fa-bars"></i></button>
                <ul class="menu">
                    <li class="menu-item current-menu-item"><a href="index.html">Home</a></li>
                    <li class="menu-item"><a href="about.html">About</a></li>
                    <li class="menu-item"><a href="gallery.html">Gallery</a></li>
                    <li class="menu-item"><a href="download.html">Download</a></li>
                    <li class="menu-item"><a href="blog.html">Blog</a></li>
                    <li class="menu-item"><a href="contact.html">Contact</a></li>
                </ul> <!-- .menu -->
            </nav> <!-- .main-navigation -->
            <div class="mobile-menu"></div>
        </div>
    </header> <!-- .site-header -->