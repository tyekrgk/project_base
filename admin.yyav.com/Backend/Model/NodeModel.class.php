<?php
namespace Backend\Model;
use Think\Model;

/**
 * @author sunjinliang@appvv.com
 */

class NodeModel extends Model
{

    protected $tableName = 'node';
    protected $fields = array('id', 'name', 'title', 'is_menu', 'icon',
        'sort', 'is_public','type', 'status', 'pid', 'level','_pk'=>'id');

    protected $_validate = array(
        array('sort','number','必须是数字'),
        array('level','number','必须是数字'),
    );


    /**检查节点名称
     * @param $name
     * @return mixed
     */
    public function hasName($name){
        $flag = $this->where(array('name'=>$name))->find();
        return $flag;
    }


    /**
     * 获取所有的节点
     * @return mixed
     */
    public function getAllNodes()
    {
        $nodes = $this->where(array('pid' => 0))->order('sort asc')->select();
        foreach ($nodes as $k => $v) {
            $nodes[$k]['child_node'] = $this->where(array('pid' => $v['id']))->order('sort asc')->select();
        }
        return $nodes;
    }

    //获取私有权限节点
    public  function  getAllPriateNodes()
    {
        $nodes = $this->where(array('pid' => 0,'is_public'=>0))->order('sort asc')->select();
        foreach ($nodes as $k => $v) {
            $nodes[$k]['child_node'] = $this->where(array('pid' => $v['id']))->order('sort asc')->select();
        }
        return $nodes;
    }

    //公有菜单节点
    public function getPublicIds(){
        $publicIds = array();
        $nodes = $this->where(array('is_public'=>1))->select();
        foreach($nodes as $k => $v){
            $publicIds[] = $v['id'];
        }
        return $publicIds;
    }

    //获取是菜单的权限节点
    public function getAllMenuNodes()
    {
        $nodes = $this->where(array('pid' => 0,'is_menu'=>1))->order('sort asc')->select();
        foreach ($nodes as $k => $v) {
            $nodes[$k]['child_node'] = $this->where(array('pid' => $v['id'],'is_menu'=>1))->order('sort asc')->select();
        }
        return $nodes;
    }
}