<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller
{
	public $redis = null;

	public function _initialize()
	{
		//获取redis
		vendor('Redis.Connectredis');
        $redis = \Connectredis::using(C('REDIS_DB'));
        $this->redis = $redis;
	}

	
}