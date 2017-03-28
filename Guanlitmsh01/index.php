<?php
define('APP_DEBUG', false);
define('APP_NAME', 'Guanlitmsh01');
define('APP_PATH', './');
define("RUNTIME_PATH", "./Data/");
define("CONF_PATH", RUNTIME_PATH . "Conf/");
//加载UC接口，要在加载Thinkphp之前加载
require("./ucenter.php");
require('../Source/ThinkPHP/ThinkPHP.php');

?>