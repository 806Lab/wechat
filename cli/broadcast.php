<?php

include __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/../app/config/config.php';

use EasyWeChat\Foundation\Application;

$options = [
    'debug'     => true,
    'app_id'    => WECHAT_APP_ID,
    'secret'    => WECHAT_SECRET,
    'token'     => WECHAT_TOKEN,
    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/easywechat.log',
    ],
];

$app = new Application($options);

$broadcast = $app->broadcast;

echo $broadcast->sendText("测试est111111", "oCvxov1_T-s6DPCMMpY2WpVjh6Y0")."\n";