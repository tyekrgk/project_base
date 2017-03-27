<?php
//数据库配置
if(APP_DEV){
    return  array(
        'DB_TYPE'   => 'mysql', // 数据库类型
        'DB_HOST'   => '120.24.80.214', // 服务器地址
        'DB_NAME'   => 'wwwdoubiwang', // 数据库名
        'DB_USER'   => 'womi', // 用户名
        'DB_PWD'    => '%$#^womi@#$%', // 密码
        'DB_PORT'   => 3306, // 端口
        'DB_PREFIX' => 'sys_', // 数据库表前缀
        'DB_CHARSET'=> 'utf8', // 字符集
    );
}else{
    return  array(
         'DB_TYPE'   => 'mysql', // 数据库类型
         'DB_HOST'   => 'vsharewebre.clm1o715he2v.eu-west-1.rds.amazonaws.com', // 服务器地址
         'DB_NAME'   => 'vshare_web', // 数据库名
         'DB_USER'   => 'vshare_web', // 用户名
         'DB_PWD'    => 'HpZoL0dJ#c-!LNw6k', // 密码
         'DB_PORT'   => 3306, // 端口
         'DB_PREFIX' => 'sys_', // 数据库表前缀
         'DB_CHARSET'=> 'utf8', // 字符集
    );
}