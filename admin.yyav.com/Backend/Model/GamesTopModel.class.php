<?php
namespace Backend\Model;
use Think\Model;

class GamesTopModel extends Model
{
	protected $trueTableName = 'play_top';

	//读取某排行里的所有内容
	public function getTopByType($typeId)
	{
		$where =array(
			'type' => $typeId,
		);
		return $this->where($where)->order('sort asc')->select();
	}
}