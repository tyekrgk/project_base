<?php
namespace Backend\Controller;

use Think\Controller;
use Think\Verify;

/**
 * @author 754368@qq.com
 */

class IndexController extends Controller {

    public function index(){
    	echo 'running...';
    }

    //公共验证码
    public function code()
    {
    	//接收自定义
    	$height = I('height');
    	$width = I('width');
    	$length = I('length');
    	$fontSize = I('font');

    	$Verify = new Verify();
    	$Verify->length = $length;
    	$Verify->imageW = $width;
    	$Verify->imageH = $height;
    	$Verify->fontSize = $fontSize;
        $Verify->useNoise = false;
        $Verify->useCurve = false;
        $Verify->codeSet = '842';
    	$Verify->entry();
    }

    //打印系统信息
    public function sys_info()
    {
        phpinfo();
    }

    public function into_data()
    {
//        $flag = $_GET['flag'];
//        $m = M();
//        if($flag == 'top'){
//            $sql1 = "SELECT * FROM android_top";
//            $data = $m->query($sql1);
//            var_dump(count($data));
//            $time1 = time();
//            foreach($data as $k=>$v){
//                if($v['name_url']){
//                    $sql = "INSERT INTO android_top_content (id,data_id,language,`group`,`type`,sort,status,is_deleted,icon_hash,time) VALUES (".$v['id'].",'".$v['name_url']."','".$v['language']."','".$v['group']."','apps',".$v['order_number'].",".$v['status'].",0,'".$v['icons_hash']."',".$v['time'].")";
//                    $m->execute($sql);
//                }
//            }
//            $time2 = time()-$time1;
//            $count = D('AndroidTopContent')->where(array())->count();
//            var_dump($time2);echo '<br/>';
//            var_dump($count);
//        }
//
//        if($flag == 'topic'){
//            $topicData = D('AndroidFeature')->select();
//            foreach($topicData as $k=>$v){
//                $topicContent = json_decode($v['content'],true);
//                foreach($topicContent as $kk=>$vv){
//
//                    if($vv['name_url']){
//                        $sql = "INSERT INTO android_feature_content (app_id,feature_id,`type`,sort,icons_hash,time) VALUES ('".$vv['name_url']."',".$v['id'].",'apps',".$vv['order'].",'".$vv['icons_hash']."',".$vv['release_time'].")";
//                        $m->execute($sql);
//                    }
//
//                }
//            }
//        }
    }
}