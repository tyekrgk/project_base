<?php
namespace Backend\Model;
use Think\Model;

class GameCategoryModel extends Model
{
	protected $trueTableName = 'play_category';

	//通过pid获取分类列表
	public function getTopCategory($pid)
	{
		return $this->where(array('pid'=>$pid))->order('sort asc')->select();
	}

	//通过一个或多个分类ID获取分类列表
	public function getCategoryByIds($ids)
	{
		$where = array(
			'is_deleted' => 0,
			'id' => array('in',$ids),
		);
		
		return $this->where($where)->select();
	}
}