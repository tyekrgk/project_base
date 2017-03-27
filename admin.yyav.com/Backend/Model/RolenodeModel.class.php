<?php
namespace Backend\Model;
use Think\Model;

class RolenodeModel extends Model
{
    protected $tableName = 'rolenode';

	//根据角色编号删除该角色的权限结点
	public function deleteRoleNodeByRoleID($roleID)
	{
		return $this->where(array(
			'role_id'=>$roleID
			))->delete();
	}

    /**
     * 获取角色的权限id
     * @param $roleId
     * @return array
     */
    public function getNodeIdsByRoleID($roleId)
    {
        $nodeIds = array();
        $roleNodes = $this->where(array('role_id'=>$roleId))->select();
        foreach($roleNodes as $v){
            $nodeIds[] = $v['node_id'];
        }
        return $nodeIds;
    }



}