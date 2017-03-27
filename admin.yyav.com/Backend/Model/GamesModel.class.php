<?php

namespace Backend\Model;
use Think\Model;

class GamesModel extends Model
{
	protected $trueTableName = 'play_games';

	//读取一个或多个游戏详情，并保持顺序
	public function getGameByIds($ids)
	{
		if(!is_array($ids)){
			return 'ids must array';
		}

		$list = $this->where(array('id' => array('in',$ids)))->select();
		$lastList = array();
		if($list){
			foreach($ids as $v){
				foreach($list as $vv){
					if($v == $vv['id']){
						$lastList[] = $vv;
					}
				}
			}
		}
		return $this->_getGameCategoryInfo($lastList);
	}

	//PC需求，需获取每个应用对应分类以及该分类的父级分类详细信息,存放在一个字段里
	private function _getGameCategoryInfo($list)
	{
		if(!$list){
			return array();
		}
		$categoryIdArr = array();
		foreach($list as $v){
			//防止重复
			$cid = $v['cid'];
			if(!in_array($cid, $categoryIdArr)){
				$categoryIdArr[] = $cid;
			}
		}
		//读取分类详情
		$topCategoryIdArr = array();
		if($categoryIdArr){
			$categoryModel = D('GameCategory');
			$allSecondCategory = $categoryModel->getCategoryByIds($categoryIdArr);//所有二级分类获取到

			//再读取其一级分类信息
			if($allSecondCategory){
				foreach($allSecondCategory as $v){
					if(!in_array($v['pid'], $topCategoryIdArr) && $v['pid']){
						$topCategoryIdArr[] = $v['pid'];
					}
				}

				if($topCategoryIdArr){
					$allTopCategory = $categoryModel->getCategoryByIds($topCategoryIdArr);
				}

				foreach($allSecondCategory as $k=>$v){
					foreach($allTopCategory as $kk=>$vv){
						if($v['pid'] == $vv['id']){
							$allSecondCategory[$k]['top_category_detail'] = $vv;
						}
					}
				}
			}
		}

		if($allSecondCategory){
			foreach($list as $k=>$v){
				foreach($allSecondCategory as $kk=>$vv){
					if($v['cid'] == $vv['id']){
						$list[$k]['category_info'] = $vv;
					}
				}
			}
		}
		return $list;
	}
}