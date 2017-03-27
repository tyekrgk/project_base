<?php
namespace Backend\Model;
use Think\Model;

/**
 * @author 754368@qq.com
 */

class UserModel extends Model
{

	protected $_validate = array(
		array('email','email','邮箱格式不正确'),
	    array('email','','邮箱已经被使用',0,'unique',1), //默认情况下用正则进行验证
	);

	//获取所有用户
	public function getUsers()
	{
		return $this->select();
	}

	//根据邮箱和密码获取用户
	public function getUserByEmailAndPwd($email,$password)
	{
		$password = md5(md5($password).'dou');
		return $this->where(array('email'=>$email,'password'=>$password))->find();
	}


}