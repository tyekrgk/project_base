<?php
namespace Backend\Model;
use Think\Model;

class RingWorldTopModel extends Model
{

    protected $trueTableName = 'ring_world_top';

    protected $_validate = array(
        array('title','','该榜单已存在',0,'unique',1),
        array('title','require','榜单名不能为空'),
    );

    //默认获取全部记录
    public function getRingWorldTopByCondition($option = 'select',$where = array())
    {
        $where['is_deleted'] =0;
        switch ($option) {
            case 'select':
                return $this->where($where)->select();
            case 'find' :
                return $this->where($where)->find();
        }
    }

    /**设置字段的值
     * @param $id
     * @param array $field
     * @return bool
     */
    public function setFieldValue($id,$field=array())
    {
        return $this->where(array('id' => $id))->setField($field);
    }

    /**
     * 获取分页
     * @param int $page         //当前页
     * @param int $pageSize     //每页显示的数量
     * @param array $where      //条件
     * @param null $order       //排序 默认 id降序
     * @return mixed            //返回结果
     */
    public function getPaginationData($page = 1,$pageSize = 10,$where = array(),$order = null)
    {
        if($order === null){
            $order = 'id desc';
        }
        return $this->where($where)->order($order)->page($page,$pageSize)->select();
    }
}