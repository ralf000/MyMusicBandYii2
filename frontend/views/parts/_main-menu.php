<?php
use yii\helpers\Html;
use yii\widgets\Menu;

$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
    ['label' => 'About', 'url' => ['/site/about']],
    ['label' => 'Gallery', 'url' => ['/site/gallery']],
    ['label' => 'Download', 'url' => ['/site/download']],
    ['label' => 'Blog', 'url' => ['/site/blog']],
    ['label' => 'Contact', 'url' => ['/site/contact']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
//    старый вариант от виджета nav (не работает)
//    $menuItems[] = '<li>'
//        . Html::beginForm(['/site/logout'], 'post')
//        . Html::submitButton(
//            'Logout (' . Yii::$app->user->identity->username . ')',
//            ['class' => 'btn btn-link']
//        )
//        . Html::endForm()
//        . '</li>';
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