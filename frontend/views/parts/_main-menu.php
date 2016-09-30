<?php
use yii\helpers\Html;
use yii\widgets\Menu;

$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'menu-item']],
    ['label' => 'About', 'url' => ['/site/about'], 'linkOptions' => ['class' => 'menu-item']],
    ['label' => 'Gallery', 'url' => ['/site/about'], 'linkOptions' => ['class' => 'menu-item']],
    ['label' => 'Download', 'url' => ['/site/about'], 'linkOptions' => ['class' => 'menu-item']],
    ['label' => 'Blog', 'url' => ['/site/about'], 'linkOptions' => ['class' => 'menu-item']],
    ['label' => 'Contact', 'url' => ['/site/contact'], 'linkOptions' => ['class' => 'menu-item']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link']
        )
        . Html::endForm()
        . '</li>';
}
?>
<nav class="main-navigation">
    <button type="button" class="toggle-menu"><i class="fa fa-bars"></i></button>
    <?
    echo Menu::widget([
        'options' => ['class' => 'menu'],
        'itemOptions' => ['class' => 'menu-item'],
        'class' => 'menu-item',
        'activeCssClass' => 'current-menu-item',
        'items' => $menuItems,
    ]);
    ?>
</nav> <!-- .main-navigation -->
<div class="mobile-menu"></div>