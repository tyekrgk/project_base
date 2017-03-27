<?php
namespace Backend\Model;
use Think\Model;

class RingMusicModel extends Model
{

    protected $trueTableName = 'ring_music';

    protected $_validate = array(
        array('name','require','歌曲名不能为空'),
        array('down','number','下载量必须是数字'),
        array('share','number','点赞数必须是数字'),
        array('down','require','下载量不能为空'),
        array('share','require','点赞数不能为空'),
        array('tag','require','标签Tag不能为空'),
        array('desc','require','描述不能为空'),
        array('cid','require','歌手分类未选'),
        array('hash_mp3','require','mp3文件未上传'),
        array('hash_m4r','require','m4r文件未上传'),
    );

    //默认获取全部记录
    public function getRingMusicByCondition($option = 'select',$where = array())
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


    //根据ID获取一首或多首铃声
    public function getRingsByIds($ids)
    {
        $list = $this->where(array('id'=>array('in',$ids),'is_deleted'=>0))->select();
        //需要保持顺序
        $orderList = array();
        foreach($ids as $v){
            foreach($list as $vv){
                if($vv['id'] == $v){
                    $orderList[] = $vv;
                }
            }
        }
        if($orderList){
            $list = $this->_get_ring_pic_by_editor($orderList);
        }
        return $list;
    }


    public function _get_ring_pic_by_editor($list)
    {
        $arr = array();
        foreach($list as $v){
            if($v['editor']){
                $arr[$v['id']] = $v['editor'];
            }
        }
        if(!$arr){
            return $list;
        }
        $editorArr = array_values($arr);
        $editorList = M()->table('ring_singer')->where(array('name'=>array('in',$editorArr)))->select();

        foreach($list as $k=>$v){
            foreach($editorList as $kk=>$vv){
                if($v['editor'] == $vv['name']){
                    $list[$k]['editor_pic_hash'] = $vv['hash'];
                }
            }
        }

        foreach($list as $k=>$v){
            if(!$v['mp3_size'] || $v['mp3_size']== '0'){
                $list[$k]['mp3_size'] = rand(100000,800000);
            }
            if(!$v['m4r_size'] || $v['m4r_size']== '0'){
                $list[$k]['m4r_size'] = rand(100000,800000);
            }
        }

        return $list;
    }
}