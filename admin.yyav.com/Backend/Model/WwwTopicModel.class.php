<?php
namespace Backend\Model;
use Think\Model;

class WwwTopicModel extends Model
{

    protected $trueTableName = 'www_topic';
    protected $_validate = array(
        array('title','require','标题不能为空'),
        array('sort','number','排序必须为数字'),
        array('hash','require','必须上传图片'),
    );

    //默认获取全部广告
    public function getWwwTopicByCondition($option = 'select',$where = array())
    {
        switch ($option) {
            case 'select':
                return $this->where($where)->select();
            case 'find' :
                return $this->where($where)->find();
        }
    }


}