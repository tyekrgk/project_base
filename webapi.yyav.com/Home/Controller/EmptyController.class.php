<?php
namespace Home\Controller;
use Think\Controller;

class EmptyController extends Controller
{
	public function _empty(){
		header("HTTP/1.0 404 Not Found");
		echo json_encode(array('error_code'=>404,'des'=>'not find'));
	}
}