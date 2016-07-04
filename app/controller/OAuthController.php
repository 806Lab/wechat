<?php

/**
 * Created by PhpStorm.
 * User: kalen
 * Date: 7/3/16
 * Time: 12:23 AM
 */
namespace App\Controller;



use App\Ext\BaseController;

class OAuthController extends BaseController
{
    // 获取 OAuth 授权结果用户信息
    function callback()
    {
        $user = $this->oauth->user();
        $_SESSION['wechat_user'] = $user->toArray();

        $targetUrl = empty($_SESSION['target_url']) ? '/' : $_SESSION['target_url'];
        $this->redirect($targetUrl);
    }
}