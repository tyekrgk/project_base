<?php
namespace Backend\Controller;

use Think\Controller;

class UetoawsController extends Controller
{
	//百度编辑器上传到亚马逊
    public function ueditor_upload_pic_to_aws()
    {
        $file = I('get.file');
        $key = md5($file);
        $file = $_SERVER['DOCUMENT_ROOT'].$file;
        if(!file_exists($file)){
            $this->ajaxReturn(array(
                'error_code' => 1,
                'des' => '文件不存在'
            ));
            exit();
        }
        $flag = upload_aws($file,$key,'pic');
        @unlink($file);
        if($flag){
            $this->ajaxReturn(array(
                'error_code' => 0,
                'url' => $key,
            ));
        }else{
            $this->ajaxReturn(array(
                'error_code' => 1,
            ));
        }
    }
}