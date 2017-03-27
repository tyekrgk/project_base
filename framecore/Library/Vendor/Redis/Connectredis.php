<?php
$file = 'Diyredis.php';
include $file;
class Connectredis {
	
	protected static $_instance = null;

	public static function using($option=array('127.0.0.1',6379))
	{
		if(empty(self::$_instance)){
			self::$_instance = new Diyredis($option);
		}
		return self::$_instance;
	}
}