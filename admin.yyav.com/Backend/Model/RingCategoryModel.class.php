<?php
namespace Backend\Model;
use Think\Model;

class RingCategoryModel extends Model
{

    protected $trueTableName = 'ring_category';


    //默认获取全部记录
    public function getRingCategoryByCondition($option = 'select',$where = array())
    {
        switch ($option) {
            case 'select':
                return $this->where($where)->select();
            case 'find' :
                return $this->where($where)->find();
        }
    }


}