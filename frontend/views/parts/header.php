<?
/**
 * @var $this \yii\web\View
 */
?>
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
            <?= $this->render('//parts/_logo')?>

            <?= $this->render('//parts/_main-menu')?>

        </div>
    </header> <!-- .site-header -->