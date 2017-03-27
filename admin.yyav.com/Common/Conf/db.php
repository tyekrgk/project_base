<?php
//数据库配置
if(APP_DEV){
    return  array(
        'DB_TYPE'   => 'mysql', // 数据库类型
        'DB_HOST'   => '127.0.0.1', // 服务器地址
        'DB_NAME'   => 'admin_base', // 数据库名
        'DB_USER'   => 'root', // 用户名
        'DB_PWD'    => 'root', // 密码
        'DB_PORT'   => 3306, // 端口
        'DB_PREFIX' => 'sys_', // 数据库表前缀
        'DB_CHARSET'=> 'utf8', // 字符集
    );
}else{
    return  array(
         'DB_TYPE'   => 'mysql', // 数据库类型
         'DB_HOST'   => '127.0.0.1', // 服务器地址
         'DB_NAME'   => 'admin_base', // 数据库名
         'DB_USER'   => 'root', // 用户名
         'DB_PWD'    => 'root', // 密码
         'DB_PORT'   => 3306, // 端口
         'DB_PREFIX' => 'sys_', // 数据库表前缀
         'DB_CHARSET'=> 'utf8', // 字符集
    );
}
