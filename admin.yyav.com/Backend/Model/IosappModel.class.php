<?php
namespace Backend\Model;
use Think\Model;

class IosappModel extends Model
{
	protected $autoCheckFields = false;
	//根据应用ID获取应用详情
	public function getAppByID($ID,$device='1',$lang='en')
	{ 
                $api = "http://api.apiappvv.com/api/app/detail_web?id={$ID}&device={$device}&iphoneoff=1&language={$lang}&jb=1&appType=1";
		$res = curl_get($api);
		$res = json_decode($res,true);
		if($res['code'] == 1000){
			return $res['data'];
		}else{
			return array();
		}
       
	}
}