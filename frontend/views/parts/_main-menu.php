<?php
use common\helpers\Helper;
use common\models\Menu as MenuModel;
use yii\helpers\Html;
use yii\widgets\Menu;

//$menuItems = [
//    ['label' => 'Home', 'url' => ['/site/index']],
//    ['label' => 'About', 'url' => ['/site/about']],
//    ['label' => 'Gallery', 'url' => ['/site/gallery']],
//    ['label' => 'Discography', 'url' => ['/site/discography']],
//    ['label' => 'Blog', 'url' => ['/blog/index']],
//    ['label' => 'Contact', 'url' => ['/site/contact']],
//];

$menuItems = MenuModel::handledFromMenuWidget(MenuModel::getMainMenu());

if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = [
        'label' => 'Logout',
        'url' => ['site/logout'],
        'template' => '<li class="menu-item"><a href="{url}" data-method="post">{label}</a></li>'
    ];
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