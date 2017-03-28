<?php
return array(

    'DB_TYPE'=>'mysql',     // 数据库类型
    'DB_DEPLOY_TYPE' => 1,  //开打支持多服务器                
    'DB_RW_SEPARATE'=>true, //读写分离分开  
    'DB_HOST' => '192.168.125.83', // 服务器地址
    'DB_NAME' => 'www752',     // 数据库名
    'DB_USER' => 'webroot',   // 用户名
    'DB_PWD' => 'www752Login#!15',          // 密码
    'DB_PORT' => '3306',      // 端口
    'DB_PREFIX' => 'ai_',     // 数据库表前缀查
	
     //Cookie设置
    'COOKIE_EXPIRE' => 6000, //Coodie 有效期（秒）
    'COOKIE_DOMAIN' => '.752g.com', //Cookie 有效域名
    'COOKIE_PATH' => '/', //Cookie 路径
    'COOKIE_PREFIX' => 'Leee_', //Cookie 前缀 避免冲突
	
	'AIMEE_PREFIX'=>'ai',     // AIMEE全局变量前缀
	'TAGLIB_LOAD' => true,
	'TAGLIB_PRE_LOAD' => 'Ai',
	'TAGLIB_BUILD_IN' => 'cx,ai', // 内置标签库名称(标签使用不必指定标签库名称),以逗号分隔 注意解析顺序
	
	
    'BBS_DB_CONFIG' => array( // bbs数据库配置       
	    'db_type'  => 'mysql',
	    'db_user'  => 'root',
	    'db_pwd'   => 'Fly9#97G)',
	    'db_host'  => '192.168.125.83',
	    'db_port'  => '3306',
	    'db_name'  => 'www752'
	)
	
	
);

?>
