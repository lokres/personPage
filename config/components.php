<?php
$mailer = require __DIR__ . '/mailer.php';
$db = require __DIR__ . '/db.php';
return 
[
    'i18n' => [ // компонент мультизязычности
        'translations' => [
            'app*' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@common/messages/', // ВАЖНО! этот путь к папке с переводами
                'sourceLanguage' => 'en-Us', // базовым языком путь будет инглиш
                'fileMap' => [
                    'app' => 'app.php', // группа фраз и её файл-источник
                    'app/error' => 'error.php', // для ошибок (тоже какое-то подмножетсво переводимых фраз)
                ],
            ],
        ],
    ],
    'jsUrlManager' => [
        'class' => \dmirogin\js\urlmanager\JsUrlManager::class,
    ],
    'request' => [
        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        'cookieValidationKey' => '123456',
    ],
    'cache' => [
        'class' => 'yii\caching\FileCache',
    ],
    'user' => [
        'identityClass' => 'app\models\User',
        'enableAutoLogin' => true,
    ],
    'errorHandler' => [
        'errorAction' => 'site/error',
    ],
    'mailer' => $mailer,

    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                'class' => 'yii\log\FileTarget',
                'levels' => ['error', 'warning'],
            ],
        ],
    ],
    'db' => $db,

    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
        ],
    ],
];