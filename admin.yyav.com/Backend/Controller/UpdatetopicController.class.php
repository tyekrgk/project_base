<?php
namespace Backend\Controller;
use Think\Controller;

class UpdatetopicController extends Controller
{
	public function update_sodo_app_id()
	{
		exit();
		set_time_limit(0);
		//从数据库全拉出来
		$pageSize = 100;
		$contentModel = D('AndroidFeatureContent');

		$id = I('get.id');
		$whereL = array();
		if($id)
		{
			$idArr = explode(',', $id);
			$whereL = array('id'=>array('in',$idArr));
		}
		

		$count = $contentModel->where($whereL)->count();
		$number = ceil($count/$pageSize);

		for($i=1;$i<=$number;$i++)
		{
			$list = $contentModel->where($whereL)->page($i,$pageSize)->select();
			
			if(I('get.pretty') == 1)
			{
				echo '<pre />';
				var_dump($list);
				exit();
			}

			if($list)
			{
				$appModel = D('App');
				foreach($list as $k => $v)
				{
					$where = array('id' => $v['id']);
					if($v['type'] == 'apps')
					{
						//为应用时去详情拉取详情
						$app = $appModel->where(array('name_url' => $v['app_id']))->find();
						if($app)
						{
							if(substr($app['appid'], 0,4) == 'com.')
							{
								//以com.开头
								$use = substr($app['appid'], 4);
							}else
							{
								$use = $app['appid'];
							}
							$sodoAppId = preg_replace('/\./', '-', strtolower($use));
						}else
						{
							echo 'app not found<br />';
							$contentModel->where($where)->delete();
						}
					}

					if($v['type'] == 'ad')
					{
						$sodoAppId = $v['app_id'];
					}

					//执行更新
					$res = $contentModel->where($where)->save(array('sodo_app_id' => $sodoAppId));

					if($res)
					{
						$isOk = 'ok';
					}else
					{
						$isOk = 'no';
					}
					echo $isOk.':'.$v['id'].'___'.$sodoAppId.'__'.$v['app_id'].'<br />';
				}
			}
		}
	}

	public function update_top_content()
	{
		exit();
		set_time_limit(0);
		$pageSize = 100;
		$contentModel = D('AndroidTopContent');

		$id = I('get.id');
		$whereL = array();
		if($id)
		{
			$idArr = explode(',', $id);
			$whereL = array('id'=>array('in',$idArr));
		}
		

		$count = $contentModel->where($whereL)->count();
		$number = ceil($count/$pageSize);
		for($i=1;$i<=$number;$i++)
		{
			$list = $contentModel->where($whereL)->page($i,$pageSize)->select();
			if(I('get.pretty') == 1)
			{
				echo '<pre />';
				var_dump($list);
				exit();
			}

			if($list)
			{
				$appModel = D('App');
				foreach($list as $k => $v)
				{
					$where = array('id' => $v['id']);
					if($v['type'] == 'apps')
					{
						//为应用时去详情拉取详情
						$app = $appModel->where(array('name_url' => $v['data_id']))->find();
						if($app)
						{
							if(substr($app['appid'], 0,4) == 'com.')
							{
								//以com.开头
								$use = substr($app['appid'], 4);
							}else
							{
								$use = $app['appid'];
							}
							$sodoAppId = preg_replace('/\./', '-', strtolower($use));
						}else
						{
							echo 'app not found<br />';
							$contentModel->where($where)->delete();
						}
					}

					if($v['type'] == 'ad')
					{
						$sodoAppId = $v['data_id'];
					}

					//执行更新
					$res = $contentModel->where($where)->save(array('sodo_data_id' => $sodoAppId));

					if($res)
					{
						$isOk = 'ok';
					}else
					{
						$isOk = 'no';
					}
					echo $isOk.':'.$v['id'].'___'.$sodoAppId.'__'.$v['data_id'].'<br />';
				}
			}
		}
	}
}