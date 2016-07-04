<?php
/**
 * Created by PhpStorm.
 * User: kalen
 * Date: 7/3/16
 * Time: 12:46 AM
 */

/**
 * Command
 * $ mv config.sample.php config.php
 */

define("DEFAULT_CONTROLLER_MAP", "home");
define("BASE_URI", "localhost/wechat");


//wechat configuration
define("WECHAT_DEBUG", false);
define("WECHAT_APP_ID", "");
define("WECHAT_SECRET", "");
define("WECHAT_TOKEN", "");

//database configuration
define("DBHOST", "127.0.0.1");
define("DBUSER", "root");
define("DBPASS", "root");
define("DBNAME", "kalen_mvc");
define("DBPORT", 3306);

