<?php
// 应用入口文件 本系统采用TP框架 版本3.2.3 2015年09月09日

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

//检测是否开启开发调试模式
if(file_exists('./dev.lock')){
	define('APP_DEV',True);
}else{
	define('APP_DEV',False);
}

if((isset($_REQUEST['env']) && $_REQUEST['env'] == 'dev') || file_exists('./dev.lock')){
	define('APP_DEBUG',True);
}

// 定义应用目录
define('APP_PATH','./');
//绑定模块
// define('BIND_MODULE','Task');
// 引入ThinkPHP入口文件
require '../framecore/ThinkPHP.php';

// GO!GO!GO!