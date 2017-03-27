<?php
namespace Task\Controller;
use Think\Controller;

class EmailsendController extends Controller
{
	public function send_ringtone()
	{
                set_time_limit(0);
                $tag = true;
                vendor('Redis.Connectredis');
                $redis = \Connectredis::using(C('REDIS_DB'));
                $listKey = 'vshareweb_ringtone';
                vendor('smtpSendEmail.SendEmail');
                // $lastSendMail = '';//上次发送默认收件箱
                while ($tag) {
                        $ringtone = $redis->rPop($listKey);
                        if($ringtone){
                                $sendMail = new \SendEmail();
                        	$sendRes = $sendMail->send_ringtone($ringtone['email'],'http://webmediacenter.s3.amazonaws.com/'.$ringtone['m4r'],$ringtone['title'],$ringtone['id']);
                                $data = array();
                                if($sendRes['error_code'] == 1){
                		      //再次加入到队列中
                		      $redis->lPush($listKey,$ringtone);
                                        $data['error_des'] = $sendRes['error_des'];
                                        $isSuccess = 0;
                        	}else{
                                        $isSuccess = 1;
                                }
                                
                        	//数据库记录
                        	$data['ring_id'] = $ringtone['id'];
                        	$data['ring_name'] = $ringtone['title'];
                        	$data['position'] = $ringtone['position'];
                        	$data['ip'] = $ringtone['ip'];
                        	$data['email'] = $ringtone['email'];
                        	$data['is_success'] =  $isSuccess;
                        	$data['ptime'] = date('Y-m-d H:i:s');
                        	D('RingEmail')->add($data);
                                unset($sendMail);
                        }
                        sleep(3);
                }
	}

        public function phpofinfo()
        {
                phpinfo();
        }

        public function send_ringtone2()
        {
                set_time_limit(0);
                $tag = true;
                vendor('Redis.Connectredis');
                $redis = \Connectredis::using(C('REDIS_DB'));
                $listKey = 'vshareweb_ringtone';
                vendor('smtpSendEmail.SendEmail');
                // $lastSendMail = '';//上次发送默认收件箱
                while ($tag) {
                        $ringtone = $redis->rPop($listKey);
                        if($ringtone){
                                $sendMail = new \SendEmail();
                                $sendRes = $sendMail->send_ringtone($ringtone['email'],'http://webmediacenter.s3.amazonaws.com/'.$ringtone['m4r'],$ringtone['title'],$ringtone['id']);
                                $data = array();
                                if($sendRes['error_code'] == 1){
                                      //再次加入到队列中
                                      $redis->lPush($listKey,$ringtone);
                                        $data['error_des'] = $sendRes['error_des'];
                                        $isSuccess = 0;
                                }else{
                                        $isSuccess = 1;
                                }
                                
                                //数据库记录
                                $data['ring_id'] = $ringtone['id'];
                                $data['ring_name'] = $ringtone['title'];
                                $data['position'] = $ringtone['position'];
                                $data['ip'] = $ringtone['ip'];
                                $data['email'] = $ringtone['email'];
                                $data['is_success'] =  $isSuccess;
                                $data['ptime'] = date('Y-m-d H:i:s');
                                D('RingEmail')->add($data);
                                unset($sendMail);
                        }
                        sleep(3);
                }
        }

        public function send_ringtone3()
        {
                set_time_limit(0);
                $tag = true;
                vendor('Redis.Connectredis');
                $redis = \Connectredis::using(C('REDIS_DB'));
                $listKey = 'vshareweb_ringtone';
                vendor('smtpSendEmail.SendEmail');
                // $lastSendMail = '';//上次发送默认收件箱
                while ($tag) {
                        $ringtone = $redis->rPop($listKey);
                        if($ringtone){
                                $sendMail = new \SendEmail();
                                $sendRes = $sendMail->send_ringtone($ringtone['email'],'http://webmediacenter.s3.amazonaws.com/'.$ringtone['m4r'],$ringtone['title'],$ringtone['id']);
                                $data = array();
                                if($sendRes['error_code'] == 1){
                                      //再次加入到队列中
                                      $redis->lPush($listKey,$ringtone);
                                        $data['error_des'] = $sendRes['error_des'];
                                        $isSuccess = 0;
                                }else{
                                        $isSuccess = 1;
                                }
                                
                                //数据库记录
                                $data['ring_id'] = $ringtone['id'];
                                $data['ring_name'] = $ringtone['title'];
                                $data['position'] = $ringtone['position'];
                                $data['ip'] = $ringtone['ip'];
                                $data['email'] = $ringtone['email'];
                                $data['is_success'] =  $isSuccess;
                                $data['ptime'] = date('Y-m-d H:i:s');
                                D('RingEmail')->add($data);
                                unset($sendMail);
                        }
                        sleep(5);
                }
        }

        public function send_ringtone4()
        {
                set_time_limit(0);
                $tag = true;
                vendor('Redis.Connectredis');
                $redis = \Connectredis::using(C('REDIS_DB'));
                $listKey = 'vshareweb_ringtone';
                vendor('smtpSendEmail.SendEmail');
                // $lastSendMail = '';//上次发送默认收件箱
                while ($tag) {
                        $ringtone = $redis->rPop($listKey);
                        if($ringtone){
                                $sendMail = new \SendEmail();
                                $sendRes = $sendMail->send_ringtone($ringtone['email'],'http://webmediacenter.s3.amazonaws.com/'.$ringtone['m4r'],$ringtone['title'],$ringtone['id']);
                                $data = array();
                                if($sendRes['error_code'] == 1){
                                      //再次加入到队列中
                                      $redis->lPush($listKey,$ringtone);
                                        $data['error_des'] = $sendRes['error_des'];
                                        $isSuccess = 0;
                                }else{
                                        $isSuccess = 1;
                                }
                                
                                //数据库记录
                                $data['ring_id'] = $ringtone['id'];
                                $data['ring_name'] = $ringtone['title'];
                                $data['position'] = $ringtone['position'];
                                $data['ip'] = $ringtone['ip'];
                                $data['email'] = $ringtone['email'];
                                $data['is_success'] =  $isSuccess;
                                $data['ptime'] = date('Y-m-d H:i:s');
                                D('RingEmail')->add($data);
                                unset($sendMail);
                        }
                        sleep(2);
                }
        }

        public function send_ringtone5()
        {
                set_time_limit(0);
                $tag = true;
                vendor('Redis.Connectredis');
                $redis = \Connectredis::using(C('REDIS_DB'));
                $listKey = 'vshareweb_ringtone';
                vendor('smtpSendEmail.SendEmail');
                // $lastSendMail = '';//上次发送默认收件箱
                while ($tag) {
                        $ringtone = $redis->rPop($listKey);
                        if($ringtone){
                                $sendMail = new \SendEmail();
                                $sendRes = $sendMail->send_ringtone($ringtone['email'],'http://webmediacenter.s3.amazonaws.com/'.$ringtone['m4r'],$ringtone['title'],$ringtone['id']);
                                $data = array();
                                if($sendRes['error_code'] == 1){
                                      //再次加入到队列中
                                      $redis->lPush($listKey,$ringtone);
                                        $data['error_des'] = $sendRes['error_des'];
                                        $isSuccess = 0;
                                }else{
                                        $isSuccess = 1;
                                }
                                
                                //数据库记录
                                $data['ring_id'] = $ringtone['id'];
                                $data['ring_name'] = $ringtone['title'];
                                $data['position'] = $ringtone['position'];
                                $data['ip'] = $ringtone['ip'];
                                $data['email'] = $ringtone['email'];
                                $data['is_success'] =  $isSuccess;
                                $data['ptime'] = date('Y-m-d H:i:s');
                                D('RingEmail')->add($data);
                                unset($sendMail);
                        }
                        sleep(1);
                }
        }
}