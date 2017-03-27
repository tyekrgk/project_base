<?php
if(APP_DEV){
	return array(
		'MONGO_DB' => array(
			'DB_TYPE'   => 'mongo', // 数据库类型
			'DB_HOST'   => '52.18.74.201', // 服务器地址
			'DB_NAME'   => 'android_appcenter', // 数据库名
			'DB_USER'   => 'androidcenter', // 用户名
			'DB_PWD'    => 'HpZoL0dJcLNw6k', // 密码
			'DB_PORT'   => 27017, // 端口
		),
	);
}else{
	return array(
		'MONGO_DB' => array(
			'DB_TYPE'   => 'mongo', // 数据库类型
			'DB_HOST'   => '172.31.7.156', // 服务器地址
			'DB_NAME'   => 'android_appcenter', // 数据库名
			'DB_USER'   => 'androidappcenter', // 用户名
			'DB_PWD'    => 'Bt7y2etY44_iT537A', // 密码
			'DB_PORT'   => 27017, // 端口
		),
	);
}