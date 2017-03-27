<?php
namespace Backend\Model;
use Think\Model;

/**
 * @author 754368@qq.com
 */

class RoleModel extends Model
{
	protected $tableName = 'role';

	protected $_validate = array(
		// array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
		array('role_name','','用户组已经存在!',0,'unique',1),
		array('role_name','require','组名必填'),
	);

	//根据角色名字获取角色
	public function getRoleByRoleName($roleName)
	{
		return $this->where(array('role_name'=>$roleName))->find();
	}
    //获取全部角色
    public function getAllRole(){
        $roles = $this->where(array('pid'=>0,'is_sys'=>array('neq',1)))->order('create_time desc')->select();
        foreach($roles as $k=>$v){
            $roles[$k]['child_group'] = $this->where(array('pid'=>$v['id'],'is_sys'=>array('neq',1)))->order('create_time desc')->select();
        }
        return $roles;
    }


    //获取系统管理员id,用于自动添加权限节点
    public function getSystemRoleId(){
        $systemRole = $this->where(array('is_sys' => 1,'pid' =>array('neq',0)))->find();
        return $systemRole['id'];
    }
}