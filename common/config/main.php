<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'layout' => 'page',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => \yii\web\UrlManager::className(),
            'enablePrettyUrl' => true,
            'showScriptName' => false
        ]
    ],
];
