<?php
namespace Backend\Model;
use Think\Model;

class WallpaperPictureModel extends Model
{

    protected $trueTableName = 'wallpaper_picture';
    protected $_validate = array(
        array('name','require','壁纸名不能为空'),
        array('like_number','number','点赞数必须为数字'),
        array('down_number','number','下载量必须为数字'),
        array('name_url','','Name_Url已存在',0,'unique',1)
    );

    //默认获取全部广告
    public function getWallpaperPictureByCondition($option = 'select',$where = array())
    {
        $where['is_deleted'] = 0;
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