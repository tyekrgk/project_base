<?php
namespace Backend\Model;
use Think\Model;

class RingTopicModel extends Model
{
	protected $trueTableName = 'ring_topic';

    protected $_validate = array(
        array('title','require','专题名必须有'),
        array('sort','number','排序必须是数字')
    );
    //默认获取全部记录
    public function getRingTopicByCondition($option = 'select',$where = array())
    {
        $where['is_deleted'] =0;
        switch ($option) {
            case 'select':
                return $this->where($where)->select();
            case 'find' :
                return $this->where($where)->find();
        }
    }

    /**设置字段值
     * @param $id
     * @param array $field
     * @return bool
     */
    public function setFieldValue($id,$field=array())
    {
        return $this->where(array('id' => $id))->setField($field);
    }

    /**分页数据
     * @param int $page
     * @param int $pageSize
     * @param array $where
     * @param null $order
     * @return array
     */
    public function getPaginationData($page = 1,$pageSize = 10,$where = array(),$order = null)
    {
        if($order === null){
            $order = 'id desc';
        }
        $data = $this->where($where)->order($order)->page($page,$pageSize)->select();
        $count = $this->where($where)->count();
        $pageData = array(
            'count' => $count,
            'data' => $data,
        );
        return $pageData;
    }
}