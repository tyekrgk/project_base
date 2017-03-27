<?php
namespace Backend\Model;
use Think\Model;

class WallpaperTopicModel extends Model
{

    protected $trueTableName = 'wallpaper_topic';
    protected $_validate = array(

    );

    //默认获取全部记录
    public function getWallpaperTopicByCondition($option = 'select',$where = array())
    {
        $where['is_deleted'] =0;
        switch ($option) {
            case 'select':
                return $this->where($where)->select();
            case 'find' :
                return $this->where($where)->find();
        }
    }

    //设置删除
    public function setDelete($id)
    {
        return $this->where(array('id' => $id))->setField(array('is_deleted' => 1));
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