<?php
if(APP_DEV){
	return array(
		'REDIS_DB' => array(
			'127.0.0.1',
			6379,
		)
	);
}else{
	return array(
		'REDIS_DB' => array(
			'newvshareweb.adybql.0001.euw1.cache.amazonaws.com',
			6379,
		)
	);
}