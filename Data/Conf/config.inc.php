<?php
define('UC_CONNECT', 'mysql');
define('UC_DBHOST', '192.168.125.83');
define('UC_DBUSER', 'webroot');
define('UC_DBPW', 'www752Login#!15');
define('UC_DBNAME', 'ucenter');
define('UC_DBCHARSET', 'utf8');
define('UC_DBTABLEPRE', '`ucenter`.uc_');
define('UC_DBCONNECT', '0');
define('UC_KEY', '21231EWR2RWDF2132');
define('UC_API', 'http://ucnew.752g.com');
define('UC_CHARSET', 'utf-8');
define('UC_IP', '');
define('UC_APPID', '1');
define('UC_PPP', '20');


//Ucenter接入必需,否则报通讯失败
$dbhost = '192.168.125.83';                      // 数据库服务器
$dbuser = 'webroot';			// 数据库用户名
$dbpw = 'www752Login#!15'; 			// 数据库密码
$dbname = 'ucenter';			// 数据库名
$pconnect = '1';                              // 数据库持久连接 0=关闭, 1=打开
$tablepre = 'uc_';                          // 表名前缀, 同一数据库安装多个论坛请修改此处
$dbcharset = 'utf8'; 

$ucdb = array(
'dbhost' => 'localhost',			// 数据库服务器
'dbuser' => 'webroot',			        // 数据库用户名
'dbpw' => 'www752Login#!15',			// 数据库密码
'dbname' => 'www752',		     	// 数据库名
'pconnect' => 0,				    // 数据库持久连接 0=关闭, 1=打开
'tablepre' => '`www752`.ai_',  		// 表名前缀, 同一数据库安装多个论坛请修改此处
'dbcharset' => 'utf8',			    // MySQL 字符集, 可选 'gbk', 'big5', 'utf8', 'latin1', 留空为按照论坛字符集设定
);
//Cookies设置
$cookiepre = '752g_';
$cookiedomain = '.752g.com';
$cookiepath = '/';
