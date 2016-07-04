<?php

include __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/app/config/config.php';

use EasyWeChat\Foundation\Application;

$options = [
    'debug'     => true,
    'app_id'    => WECHAT_APP_ID,
    'secret'    => WECHAT_SECRET,
    'token'     => WECHAT_TOKEN
];

$app = new Application($options);

$server = $app->server;
$user = $app->user;

//$server->setMessageHandler(function($message) use ($user) {
//    $fromUser = $user->get($message->FromUserName);
//    return $message;
//});

$server->serve()->send();