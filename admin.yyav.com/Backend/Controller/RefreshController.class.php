<?php
namespace Backend\Controller;
use Backend\Controller\AuthController;


class RefreshController extends AuthController
{
    //更新缓存
    //更新缓存
    public function refresh_cache()
    {
        $key = trim(I('post.key'));

        vendor('Redis.Connectredis');
        $redis = \Connectredis::using(C('REDIS_DB'));

        $redis->set($key,time(),false,false);
        $flag = $redis->get($key,false,false);
        if($flag){
            $this->ajaxReturn(array(
                'error_code' => 0,
                'des' => '更新成功',
            ));
        }else{
            $this->ajaxReturn(array(
                'error_code' => 1,
                'des' => '更新失败',
            ));
        }
    }

}

