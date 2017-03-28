<?php
//define('APP_DEBUG',  true);
define('APP_PATH', './Source/');
define("RUNTIME_PATH", "./Data/");
define("CONF_PATH", RUNTIME_PATH . "Conf/");
define("TMPL_PATH", "./Template752/");
//加载UC接口，要在加载Thinkphp之前加载
require("./ucenter.php");
require('./Source/ThinkPHP/ThinkPHP.php');
?>
