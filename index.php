<?php
define('COCOA_VERSON','v0.9.3');
header("Content-type: text/html; charset=utf-8");
if (!is_file('./data/install.lock')) {
    header('Location: ./install/index.php');
    exit;
}
if (get_magic_quotes_gpc()) {
    function stripslashes_deep($value)
    {
        $value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
        return $value;
    }
    $_POST = array_map('stripslashes_deep', $_POST);
    $_GET = array_map('stripslashes_deep', $_GET);
    $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
}
define('APP_DEBUG',0);
define('APP_NAME', 'zhifeng');
define('CONF_PATH','./Conf/');
define('RUNTIME_PATH','./data/runtime/');
define('TMPL_PATH','tpl/');
define('HTML_PATH','./data/html/');
define('APP_PATH','./zhifeng/');
define('CORE','zhifeng/_Core');
define('SITE_ROOT', dirname(__FILE__)); 
require(CORE.'/weixin.php');