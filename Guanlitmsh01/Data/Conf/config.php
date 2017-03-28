<?php
	$db = require_once '../Data/Conf/db.php';
    $man =  array(
    'URL_MODEL' => 3, //URL模式： 0 普通模式 1 PATHINFO 2 REWRITE 3 兼容模式 当URL_DISPATCH_ON开启后有效
    'AIMEE_PREFIX'=>'ai',     // AIMEE全局变量前缀
   
     //是否开启牌验证
    'TOKEN_ON' => true,  // 是否开启令牌验证
    'TOKEN_NAME' => '__hash__',    // 令牌验证的表单隐藏字段名称
    'TOKEN_TYPE' => 'md5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET' => true,  //令牌验证出错后是否重置令牌 默认为true
    //'VAR_FILTERS'           =>  'htmlspecialchars',     // 全局系统变量的默认过滤方法 多个用逗号分割 造成数组

    'DEFAULT_TIMEZONE' => 'PRC',	// 默认时区
	'HOME_TMPL_PATH' => '../Template/', //定义前台项目模板存放路径
	'HOME_DEFAULT_THEME' => 'default', // 定义默认模板主题名称
	
	'HOME_UPLOAD_PATH' => './Upload/thumbs/', //定义前台上传文件存放路径
	'ADMIN_UPLOAD_PATH' => '../Upload/', //定义后台上传文件存放路径
	'UPLOAD_FILE_SIZE' => 1024*1024*3, //定义后台上传文件附件大小  3M
	
	'TAGLIB_LOAD' => true,
	'TAGLIB_PRE_LOAD' => 'Ai',
	'TAGLIB_BUILD_IN' => 'cx,ai', // 内置标签库名称(标签使用不必指定标签库名称),以逗号分隔 注意解析顺序
	
	'LANG_SWITCH_ON' => true,  // 多语言包功能   true：开启  false：关闭
	'DEFAULT_LANG' => 'zh-cn', // 默认语言


);
    $newglobal = array_merge($db,$man);
    return $newglobal; 
?>