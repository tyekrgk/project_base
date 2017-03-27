<?php
namespace Backend\Model;
use Think\Model;

class SappModel extends Model
{
	protected $autoCheckFields = false;

	//获取应用详情
	public function getApp($platform,$lang,$id)
	{
		if($platform == 'ios')
		{
			$idP = 'trackId';
		}
		if($platform == 'android')
		{
			$idP = 'seo_name';
		}
		
		if($platform == 'windows')
		{
			$idP = 'bundleId';
			$id = strtolower($id);
		}
		$api = "http://sodo.apiappvv.com/api/app/detail?language={$lang}&platform={$platform}&from=appsodo&{$idP}={$id}";

		// echo $api.'<br />';
		$app = json_decode(curl_get($api),true);

		if($app['code'] == 200)
		{
			return $app['data']['results'][0];
		}else
		{
			return array();
		}
	}

	//获取搜索结果列表
	public function getSearchApps($platform,$lang,$keyword,$page,$pageSize)
	{
		$api = "http://sodosearch.apiappvv.com/search?q={$keyword}&platform={$platform}&language={$lang}&device=1&page={$page}&num={$pageSize}&from=sodo";
		$res = json_decode(curl_get($api),true);

		$data = array();
		if($res['code'] == 1000)
		{
			$data['list'] = $res['data']['results'];
			$data['pagenation'] = array(
				'total_count' => $res['data']['pageInfo']['total'],
				'current_page' => $page,
			);
		}
		
		return $data;
	}
}