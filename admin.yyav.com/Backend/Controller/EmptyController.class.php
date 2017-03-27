<?php
namespace Backend\Controller;
use Think\Controller;
class EmptyController extends Controller
{
	/**
	 * 控制器不存在时跳转到404
	 */
	public function index(){
		$cName = CONTROLLER_NAME;
		$this->assign('msg',$cName.' controller not exist...');
		$this->display('Public:404');
	}
}