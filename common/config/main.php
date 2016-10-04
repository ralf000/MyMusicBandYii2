<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru-RU',
    //'sourceLanguage' => 'ru-RU', // !!! Базовый язык лудше оставить английским
    'timeZone' => 'Europe/Moscow',
    'components' => [
        'db' => require __DIR__ . '/db.php',
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
