<?php
namespace Backend\Model;
use Think\Model;

class IconModel extends Model
{

    protected $trueTableName = 'icons';

    protected $_validate = array(
        array('name','require','名称不能为空'),
        array('hash','require','必须上传图片'),
    );

    //默认获取全部广告 根据条件查询
    public function getIconByCondition($option = 'select',$where = array())
    {
        switch ($option) {
            case 'select':
                return $this->where($where)->select();
            case 'find' :
                return $this->where($where)->find();
        }
    }
}