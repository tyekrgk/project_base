<?php
namespace Backend\Model;
use Think\Model;

class AdPositionModel extends Model
{

    protected $trueTableName = 'ad_position';

    public $_validate = array(
        array('title','require','标题不能为空'),
    );
    
    //获取广告位标题
    public function getPositionTitleById($id)
    {
        $allPosition = $this->find($id);
        return $allPosition['title'];
    }

    //默认获取全部广告位
    public function getPositionByCondition($option = 'select',$where = array())
    {
        switch ($option) {
            case 'select':
                return $this->where($where)->select();
            case 'find' :
                return $this->where($where)->find();
        }

    }
}