<?php
namespace Backend\Controller;
use Think\Controller;
class BaseController extends Controller
{

	public function _empty()
	{	
		$msg = ACTION_NAME.' action not exist...';
		$this->assign('msg',$msg);
		$this->display('Public:404');
	}

}