<?php
    $basic = require_once 'basic.php';
	$db = require_once 'db.php';
    $man =  array(
	
	
	'TMPL_STRIP_SPACE' => true,  //JSON  输出需要关闭GZIP  false
	'OUTPUT_ENCODE'    => true, // 页面压缩输出
	'APP_DEBUG'        => true,
	'HTTP_CACHE_CONTROL'    =>  'private', // 网页缓存控制

	'DEFAULT_FILTER' => 'htmlspecialchars', //默认过滤函数

    'URL_MODEL' => 2, //URL模式： 0 普通模式 1 PATHINFO 2 REWRITE 3 兼容模式 当URL_DISPATCH_ON开启后有效
    'URL_ROUTER_ON' => true, //是否开启URL路由
    'URL_DISPATCH_ON' => true, //是否启用Dispatcher，如果关闭，只能使用传统方式的参数传值
    'URL_CASE_INSENSITIVE' => true, //URL区分大小写 true 不区分
	//'URL_PATHINFO_DEPR' => '-', //分割
    'URL_HTML_SUFFIX' => '', //访问后辍.html
    'URL_ROUTE_RULES' => array(

				    'zixun/:id\d' => 'Zixun/news?id=:1',   //新闻
					'news/:id\d' => 'Zixun/news?id=:1',   //新闻
					'game/:gid\d' => 'Libao/game',   //新手卡

					'login/:dlq\s' => ':1/dlq',   //game/51/1
					

					'fuli/:tag\s' => 'fuli/game',
					'u/:url\s' => 'Ad/url',
	
					
					'tg/:tag\s/:sid\d/:mid\d/:swfid\d' => 'Ad/index?tag=:1&sid=:2&mid=:3&swfid=:4',
					'tg/:tag\s/:mid\d/:swfid\d' => 'ad/index?tag=:1&mid=:2&swfid=:3',

	    	), 
			
    'AIMEE_PREFIX'=>'ai',     // AIMEE全局变量前缀
   'APP_SUB_DOMAIN_DEPLOY'=>1, // 开启子域名配置
    //错误设置
    //'TMPL_ACTION_ERROR' =>'Public:error', //默认错诣跳转对应癿模板文件
    //'TMPL_ACTION_SUCCESS' =>'Public:success', //默认成功跳转对应癿模板文件
   
     //是否开启牌验证
    'TOKEN_ON' => true,  // 是否开启令牌验证
    'TOKEN_NAME' => '__hash__',    // 令牌验证的表单隐藏字段名称
    'TOKEN_TYPE' => 'md5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET' => true,  //令牌验证出错后是否重置令牌 默认为true
    //'VAR_FILTERS'           =>  'htmlspecialchars',     // 全局系统变量的默认过滤方法 多个用逗号分割 造成数组
    //Session设置
    'SESSION_PREFIX' => 'Leee_', //session 前缀
    'SESSION_AUTO_START'    => true,    //true 是否自动开启Session  false
	
	'LOAD_EXT_CONFIG' => 'db', //加载扩展配置
	
    'DEFAULT_TIMEZONE' => 'PRC',	// 默认时区
	
	'HOME_UPLOAD_PATH' => './Upload/thumbs/', //定义前台上传文件存放路径
	'ADMIN_UPLOAD_PATH' => '../Upload/', //定义后台上传文件存放路径
	'UPLOAD_FILE_SIZE' => 1024*1024*3, //定义后台上传文件附件大小  3M
	
	'LANG_SWITCH_ON' => false,  // 多语言包功能   true：开启  false：关闭
	'DEFAULT_LANG' => 'zh-cn', // 默认语言

	//'SHOW_PAGE_TRACE' => true,

);
    $newglobal = array_merge($db,$basic,$man);
    return $newglobal; 

?>