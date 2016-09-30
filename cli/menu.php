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

$buttons = [
    [
        "name"       => "服务",
        "sub_button" => [
            [
                "type" => "view",
                "name" => "本科教务",
                "url"  => "http://wx.ustb806.cn/wechat/index.php/seam/classtable"
            ],
            [
                "type" => "view",
                "name" => "图书馆",
                "url" => "http://wx.ustb806.cn/wechat/index.php/library/borrowed_books"
            ],
            [
                "type" => "view",
                "name" => "机电楼无课表",
                "url"  => "http://scce.kalen25115.cn/no_class.html"
            ],
        ],
    ],
    [
        "name"       => "关于",
        "sub_button" => [
            [
                "type" => "click",
                "name" => "806实验室",
                "key" => "ABOUT_806"
            ],
            [
                "type" => "view",
                "name" => "作者博客",
                "url" => "http://nladuo.github.io"
            ],
        ],
    ]
];
$menu = $app->menu;
echo $menu->destroy()."\n"; // 全部
echo $menu->add($buttons)."\n";