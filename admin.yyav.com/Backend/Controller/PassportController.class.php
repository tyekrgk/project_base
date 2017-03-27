<?php
namespace Backend\Controller;
use Backend\Controller\BaseController;

class PassportController extends BaseController
{
	//登陆
	public function login()
	{
        if(cookie('jeffbackendhaslogin')){
            $this->redirect('/backend/main/index');
        }
		$this->display('login');
	}

	public function check_login()
	{
		$verify = I('verify');
		$password = I('password');
		$email = I('email');
		$rememberMe = I('rememberme');

		if(!check_verify($verify)){
			$this->ajaxReturn(array('error_code'=>1,'des'=>'验证码错误'));
            exit();
		}

		$userModel = D('User');
		$loginUser = $userModel->getUserByEmailAndPwd($email,$password);
		if(!$loginUser){
			$this->ajaxReturn(array('error_code'=>1,'des'=>'用户名或密码错误'));
			exit();
		}



        //更新上次登录时间和ip
        $last_time = time();
        $last_ip = $_SERVER['REMOTE_ADDR'];

        $userModel->where(array('id'=>$loginUser['id']))->setField(array('last_login_time'=>$last_time,'last_login_ip'=>ip2long($last_ip)));
        unset($loginUser['password']);
		//设置会话信息
		if($rememberMe == 1){
			cookie('jeffbackendhaslogin',1,3600*24*7);
            cookie('adminLoginUser',json_encode($loginUser),3600*24*7);
            cookie('last_ip',long2ip($loginUser['last_ip']),3600*24*7);
            cookie('last_time',date('Y-m-d H:i:s',$loginUser['last_login_time']),3600*24*7);
		}else{
            cookie('adminLoginUser',json_encode($loginUser));
            cookie('jeffbackendhaslogin',1);
            cookie('last_ip',long2ip($loginUser['last_ip']));
            cookie('last_time',date('Y-m-d H:i:s',$loginUser['last_login_time']));
        }
		
		$arr = array(
			'error_code' => 0,
			'des' => '验证成功',
			'data' => array(
				'url' => '/backend/main/index',
			),
		);
		$this->ajaxReturn($arr);
	}

    public function logout()
    {
        cookie('jeffbackendhaslogin',null);
        cookie('menu_arrs',null);
        session(null);
        session('[destroy]');
        $this->redirect('/backend/main/login');
    }
}