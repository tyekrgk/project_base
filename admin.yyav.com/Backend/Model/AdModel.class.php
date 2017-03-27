<?php
namespace Backend\Model;
use Think\Model;

class AdModel extends Model
{

    protected $trueTableName = 'ad';
    protected $_validate = array(
        array('title','require','广告标题不能为空'),
        array('sort','number','排序必须为数字'),
        array('time','number','时间戳')
    );

    //默认获取全部广告
    public function getADByCondition($option = 'select',$where = array())
    {
        switch ($option) {
            case 'select':
                return $this->where($where)->select();
            case 'find' :
                return $this->where($where)->find();
        }
    }

    /**分页
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