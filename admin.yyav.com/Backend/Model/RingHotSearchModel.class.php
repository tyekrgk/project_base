<?php
namespace Backend\Model;
use Think\Model;

class RingHotSearchModel extends Model
{
    protected $trueTableName = 'ring_hot_search';

    protected $_validate = array(
        array('name','require','名称不能为空'),
        array('sort','number','排序必须是数字'),
    );

    /**按条件查找
     * @param string $option
     * @param array $where
     * @return mixed
     */
    public function getRingHotSearchByCondition($option = 'select',$where = array())
    {
        switch($option){
            case 'select':
                return $this->where($where)->select();
            case 'find':
                return $this->where($where)->find();
        }
    }

    /**设置某条记录的字段的值
     * @param $id
     * @param $fields
     * @return bool
     */
    public function setFieldValue($id,$fields)
    {
        $res = $this->where(array('id'=>$id))->setField($fields);
        return $res;
    }


    /**获取分页
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
        return $this->where($where)->page($page,$pageSize)->order($order)->select();
    }


}