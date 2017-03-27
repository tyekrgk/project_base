<?php
namespace Backend\Model;
use Think\Model;
/**
 * @author jeffwang@appvv.com
 */

class IostopicModel extends Model
{
	protected $trueTableName = 'ios_topic';
	protected $_validate = array(
		array('hash','require','封面图必须'),
		array('topic_name','require','专题名称必填'),
	);

    //默认获取全部
    public function getIostopicByCondition($option = 'select',$where = array())
    {
        switch ($option) {
            case 'select':
                return $this->where($where)->select();
            case 'find' :
                return $this->where($where)->find();
        }

    }

    /**设置指定数据的字段值
     * @param $id
     * @param $field
     * @return bool
     */
    public function setFieldValue($id,$field)
    {
        return $this->where(array('id' => $id))->setField($field);
    }

    /**分页数据
     * @param $page
     * @param $pageSize
     * @param array $where
     * @param null $order
     * @return array
     */
    public function getPaginationData($page,$pageSize,$where = array(),$order = null)
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