<?php
namespace Backend\Model;
use Think\Model;

class AndroidFeatureContentModel extends Model
{
    protected $trueTableName = 'android_feature_content';
    protected $_validate = array(
        array('sort','number','排序必须是数字'),
    );

    /**按条件查找
     * @param string $option
     * @param array $where
     * @return mixed
     */
    public function getFeatureContentByCondition($option = 'select',$where = array())
    {
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
    public function setFieldValue($id,$field=array()){
        return $this->where(array('id' =>$id))->setField($field);
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