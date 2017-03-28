<?php
	$db = require_once '../Data/Conf/db.php';
	$emall = require_once '../Data/Conf/emall.php';
    $man =  array(

	'TMPL_STRIP_SPACE' => false,  //JSON  false 输出需要关闭GZIP //true开启GZIP
	'OUTPUT_ENCODE'    => false, // 页面压缩输出
	//'APP_DEBUG'        => false,
	//'HTTP_CACHE_CONTROL'    =>  'private', // 网页缓存控制
	
    'URL_MODEL' => 2, //URL模式： 0 普通模式 1 PATHINFO 2 REWRITE 3 兼容模式 当URL_DISPATCH_ON开启后有效
    'URL_ROUTER_ON' => true, //是否开启URL路由
    'URL_DISPATCH_ON' => true, //是否启用Dispatcher，如果关闭，只能使用传统方式的参数传值
    'URL_CASE_INSENSITIVE' => true, //URL区分大小写 true 不区分
	'URL_PATHINFO_DEPR' => '/', //分割
    'URL_HTML_SUFFIX' => '', //访问后辍.html

);
    $newglobal = array_merge($db,$man,$emall);
    return $newglobal; 
?>