<?php
namespace Backend\Controller;
use Backend\Controller\AuthController;


class UploadController extends AuthController
{
    public function upload_pic()
    {
    	vendor('fileUpload.UploadHandler');
        $object = new \UploadHandler();
        return $object;
    }

    //上传图片至亚马逊 
    public function upload_pic_aws()
    {
    	$fileName = I('post.file_name');
    	$key = I('post.key');
    	$type = 'pic';     //type pic表示图片 audio表示音频
        $file =dirname($_SERVER['DOCUMENT_ROOT']).'/tempfile/'.$fileName;

    	if(empty($fileName) || empty($key) || !file_exists($file)){
            $this->ajaxReturn(array(
                'error_code' => 1,
                'des' => '文件或KEY不存在',
            ));
            exit;
        }
    	$flag = upload_aws($file,$key,$type);//上传至亚马逊
        @unlink($file); //删除大图文件
        @unlink(dirname($_SERVER['DOCUMENT_ROOT']).'/tempfile/thumbnail/'.$fileName);//删除小图文件
        if($flag){
            $this->ajaxReturn(array(
                'error_code' => 0,
                'des' => '上传成功'
            ));
        }else{
            $this->ajaxReturn(array(
                'error_code' => 1,
                'des' => '上传失败',
            ));
        }
    }

    //上传图片至亚马逊
    public function upload_audio_aws()
    {
        $fileName = I('post.file_name');
        $key = I('post.key');
        $type = 'audio';     //type pic表示图片 audio表示音频
        $file =dirname($_SERVER['DOCUMENT_ROOT']).'/tempfile/'.$fileName;

        if(empty($fileName) || empty($key) || !file_exists($file)){
            $this->ajaxReturn(array(
                'error_code' => 1,
                'des' => '文件或KEY不存在',
            ));
            exit;
        }
        $flag = upload_aws($file,$key,$type);//上传至亚马逊
        @unlink($file); //删除大图文件
        @unlink(dirname($_SERVER['DOCUMENT_ROOT']).'/tempfile/thumbnail/'.$fileName);//删除小图文件
        if($flag){
            $this->ajaxReturn(array(
                'error_code' => 0,
                'des' => '上传成功'
            ));
        }else{
            $this->ajaxReturn(array(
                'error_code' => 1,
                '上传失败'
            ));
        }
    }


    
}

