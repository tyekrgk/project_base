<?php
namespace Backend\Model;
use Think\Model;

class IosTopicContentModel extends Model
{
    protected $trueTableName = 'ios_topic_content';

    protected $_validate = array(
        array('sort','number','排序必须为数字'),
    );

    /**按条件取数据
     * @param string $option
     * @param array $where
     * @return mixed
     */
    public function getIosTopicContentByCondition($option = 'select',$where = array())
    {
        switch($option){
            case 'find':
                return $this->where($where)->find();
            case 'select':
                return $this->where($where)->select();
        }
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