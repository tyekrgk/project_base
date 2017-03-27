<?php
namespace Home\Controller;
use Think\Controller\RestController;

class AndroidapkController extends RestController
{
	public function _initialize()
    {
        vendor('Redis.Connectredis');
        $redis = \Connectredis::using(C('REDIS_DB'));
        $this->redis = $redis;
    }
	//允许跨域
	public function get_latest_apk()
	{
		header("Access-Control-Allow-Origin: *");//允许所有跨域请求
		$start = time();
		$redisKey = 'androidapkinfo'.$this->redis->get('api_android_apk',false,false);
		$data = $this->redis->get($redisKey,false,false);
		if(!$data){
			$data = D('AndroidApk')->order("id desc")->find();
			$data = serialize($data);
			$this->redis->set($redisKey,$data,false,false,86400*7);
		}
		$data = unserialize($data);
		$lastData = array('error_code'=>0,'des'=>'ok','data'=>$data,'query_time'=>time());
		$this->response(array('error_code'=>0,'des'=>'ok','data'=>$data,'use_time'=>(time()-$start)),'json');
	}

	public function _empty(){
		header("HTTP/1.0 404 Not Found");
		$this->response(array('error_code'=>404,'des'=>'not find'),'json');
	}
}