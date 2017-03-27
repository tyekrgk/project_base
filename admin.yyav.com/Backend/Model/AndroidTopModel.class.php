<?php
namespace Backend\Model;
use Think\Model;
class AndroidTopModel extends Model
{
    protected $trueTableName = 'android_top';

    /**按条件查询
     * @param string $option
     * @param array $where
     * @return mixed
     */
    public function getAndroidTopByCondition($option = 'select',$where = array())
    {
        switch($option){
            case 'find':
                return $this->where($where)->find();
            case 'select':
                return $this->where($where)->select();
        }
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