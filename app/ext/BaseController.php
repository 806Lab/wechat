<?php

/**
 * Created by PhpStorm.
 * User: kalen
 * Date: 7/3/16
 * Time: 12:24 AM
 */
namespace App\Ext;
use EasyWeChat\Foundation\Application;
use Core\Controller;

class BaseController extends Controller
{
    protected $oauth;
    protected $user;

    function __construct()
    {
        $options = [
            'debug'     => WECHAT_DEBUG,
            'app_id'    => WECHAT_APP_ID,
            'secret'    => WECHAT_SECRET,
            'token'     => WECHAT_TOKEN,
            'oauth' => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => 'http://' . BASE_URI . '/index.php/oauth/callback',
            ],
        ];
        $app = new Application($options);
        $this->oauth = $app->oauth;
    }

    function check_oauth()
    {
        $target_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        session_start();

        // 未登录
        if (empty($_SESSION['wechat_user'])) {

            $_SESSION['target_url'] = $target_url;
            $this->oauth->redirect()->send();
            exit();
        }

        // 已经登录过
        $this->user = $_SESSION['wechat_user'];
    }

}