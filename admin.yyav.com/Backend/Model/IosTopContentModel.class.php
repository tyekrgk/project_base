<?php
namespace Backend\Model;
use Think\Model;

class IosTopContentModel extends Model
{
    protected $trueTableName = 'ios_top_content';
    protected $_validate = array(
        array('sort','number','排序必须是数字'),
    );

    /**按条件搜索
     * @param string $option
     * @param array $where
     * @return mixed
     */
    public function getIosTopContentByCondition($option = 'select',$where = array())
    {
        switch($option){
            case 'find':
                return $this->where($where)->find();
            case 'select':
                return $this->where($where)->select();
        }
    }

    /**设置指定数据的字段值
     * @param $id
     * @param $field
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