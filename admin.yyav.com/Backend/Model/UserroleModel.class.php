<?php
namespace Backend\Model;
use Think\Model;

class UserroleModel extends Model
{

    protected $tableName = 'userrole';
	//根据用户编号删除该用户的角色结点
	public function deleteUserRoleByUserID($userID)
	{
		return $this->where(array(
			'user_id'=>$userID
			))->delete();
	}

    /**
     * 获取用户的角色id
     * @param $userId
     * @return array
     */
    public function getRoleIdsByUserID($userId)
    {
        $roleIds = array();
        $userRoles = $this->where(array('user_id'=>$userId))->select();
        foreach($userRoles as $v){
            $roleIds[] = $v['role_id'];
        }
        return $roleIds;
    }
}