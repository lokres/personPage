<?php

$params = require __DIR__ . '/params.php';
$mailer = require __DIR__ . '/mailer.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'name'=>'Mikheev Person Page',
    'bootstrap' => ['log','jsUrlManager'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
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
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'username' => 'myMiheevSite@yandex.ru',
                'password' => 'Agorafobia2000',
                'port' => '465',
                'encryption' => 'SSL',
            ],
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
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
        'imagemanager' => [
		'class' => 'noam148\imagemanager\components\ImageManagerGetPath',
		//set media path (outside the web folder is possible)
		'mediaPath' => 'images/media/imagemanager',
        //path relative web folder. In case of multiple environments (frontend, backend) add more paths 
                'cachePath' =>  ['assets/images', '../../frontend/web/assets/images'],
		//use filename (seo friendly) for resized images else use a hash
		'useFilename' => true,
		//show full url (for example in case of a API)
		'absoluteUrl' => false,
		'databaseComponent' => 'db' // The used database component by the image manager, this defaults to the Yii::$app->db component
	],
    ],
    'params' => $params,
    'modules' => [
	'imagemanager' => [
		'class' => 'noam148\imagemanager\Module',
            /*    'as access' => [
                        'class' => 'yii\filters\AccessControl',
                        'rules' => [
                            [
                                'roles' => ['@'],
                                'allow' => true,
                                'matchCallback' => function ($rule, $action) {
                                    return Yii::$app->user->identity->type > 5;
                                }                   
                            ],                   
                            // И так далее
                        ]
                    ],*/
		'canUploadImage' => true,
		'canRemoveImage' => function(){
                    return true;
		},
		'deleteOriginalAfterEdit' => false, // false: keep original image after edit. true: delete original image after edit
		// Set if blameable behavior is used, if it is, callable function can also be used
		'setBlameableBehavior' => false,
		//add css files (to use in media manage selector iframe)
		'cssFiles' => [
			'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css',
		],
	],
    ],
    
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
    $config['components']['assetManager']['forceCopy'] = true;
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
