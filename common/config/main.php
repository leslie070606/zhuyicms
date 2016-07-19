<?php

return [
    'language' => 'zh-CN',
    'timeZone' => 'PRC',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'db' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=101.201.110.46;dbname=zhuyicms',
        'username' => 'root',
        'password' => '526080515',
        'charset' => 'utf8',
    ],
];
