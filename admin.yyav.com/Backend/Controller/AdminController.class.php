<?php
namespace Backend\Controller;
use Backend\Controller\AuthController;
use Think\Page;

/**
 * @author sunjinliang@appvv.com
 */
class AdminController extends AuthController
{
    //权限节点
	public function node()
	{

        $nodeModel = D('Node');
        //获取所有节点
        $nodes = $nodeModel->getAllNodes();

        $this->assign('nodes',$nodes);
		$this->display('node');
	}

    //编辑节点页
    public function edit_node()
    {
        $id = I('get.node_id');
        $nodeModel = D('Node');

        $node = $nodeModel->find($id);
        //类型为controller的节点
        $p_nodes = $nodeModel->where(array('pid'=>0))->select();
        $this->assign('p_nodes',$p_nodes);
        $this->assign('node',$node);
        $this->display('edit_node');
    }
    //编辑节点
    public function do_edit_node()
    {
        $id = I('get.node_id');
        $data = I('post.');
        //var_dump($data);exit('xxxxxxxx');

        $nodeModel = D('Node');

        if($id){
            //更新数据
            if($nodeModel->where(array('id'=>$id))->save($data) == false){
                $this->ajaxReturn(array(
                    'error_code' => 1,
                    'des' => '未作修改'
                ));
            }else{
                $this->ajaxReturn(array(
                    'error_code' => 0,
                    'des' => '修改成功'
                ));
            }

        }else{
        	//当节点为控制器时 首字母大写
        	if($data['type'] == 'controller'){
            	$data['name'] = ucfirst(strtolower($data['name']));
            	//检查节点名称name 是否存在
            	if($nodeModel->hasName($data['name'])){
                	$this->ajaxReturn(array(
                    	'error_code' => 1,
                    	'des' => '节点名已存在'
                	));
               	 exit();
           		}
        	}

            if($nodeModel->create($data)){
                //添加节点 并自动给系统管理员添加权限节点
                if($nodeId = $nodeModel->add()){
                    $this->ajaxReturn(array(
                        'error_code' => 0,
                        'des' => '添加成功',
                    ));


                }else{
                    $this->ajaxReturn(array(
                        'error_code' => 1,
                        'des' => '添加失败'
                    ));
                }

            }else{
                $this->ajaxReturn(array(
                    'error_code' => 1,
                    'des' => $nodeModel->getError(),
                ));
            }

        }

    }

    public function delete_node()
    {
        $id = I('post.node_id');
        $nodeModel = D('Node');
        $flag = $nodeModel->where(array('pid'=>$id))->find();
        if($flag){
            $this->ajaxReturn(array(
                'error_code' => 1,
                'des' => '该控制器还有action,不能删除'
            ));
        }else{
            if($nodeModel->delete($id)){
                $this->ajaxReturn(array(
                    'error_code' => 0,
                    'des' => '删除成功'
                ));
            }else{
                $this->ajaxReturn(array(
                    'error_code' => 1,
                    'des' => '系统错误,删除失败'
                ));
            }
        }
    }

    //管理员
    public function admin()
	{
		$keyword = I('get.keyword');
		$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
		$where = array('is_sys'=>0);
		if($keyword){
			if(preg_match($pattern, $keyword)){
				$where['email'] = $keyword;
			}else{
				$where['name'] = array('like','%'.$keyword.'%');
			}

			$pageWhere['keyword'] = $keyword;

		}

		$currentPage = I('get.p');
		if(!$currentPage){
			$currentPage = 1;
		}

		$userModel = D('User');
		$users = $userModel->where($where)->order('last_login_time desc')->page($currentPage.',10')->select();
		$count = $userModel->where($where)->count();
		$Page = new Page($count,10);
		
		$Page->parameter = $pageWhere;
		$show = $Page->show();
		$this->assign('page',$show);
		$this->assign('users',$users);
		$this->display('admin');
	}

    //添加用户
	public function add_admin()
	{
		$roleModel = M('Role');
		$role = $roleModel->where(array('pid'=>0,'is_sys'=>0))->select();
		if($role){
			foreach($role as $k=>$v){
				$role[$k]['child_role'] = $roleModel->where(array('pid'=>$v['id']))->select();
			}
		}
		$this->assign('role',$role);
		$this->display('add_admin');
	}

    //删除用户
	public function do_delete_admin()
	{
		$id = intval(I('post.id'));
		$userModel = M('User');
		$deleteRes =$userModel->where(array('id'=>$id))->delete();
		if($deleteRes){
			//删除该用户对应的角色
			$userRoleModel = D('Userrole');
			$deleteUserRoleRes = $userRoleModel->where(array('user_id'=>$id))->delete();
			if($deleteUserRoleRes){
				$this->ajaxReturn(array(
					'error_code' => 0,
					'des' => '删除成功，并删除该用户对应的角色'
				));
			}else{
				$this->ajaxReturn(array(
					'error_code' => 0,
					'des' => '删除成功，但删除失败该用户对应的角色'
				));
			}
		}else{
			$this->ajaxReturn(array(
				'error_code' => 1,
				'des' => '删除失败，请联系程序'
			));
		}
	}

    //更新用户页
	public function update_admin()
	{
		$id = I('get.id');
		$user = M('User')->where(array('id'=>$id))->find();
		$this->assign('user',$user);
		$this->display('update_admin');
	}

    //更新用户信息
    public function do_update_admin()
    {
        $data = I('post.');
        $userId = I('post.id');
        //删除$data中的空密码和用户id
        if(empty($data['password'])){
            unset ($data['password']);
        }
        unset($data['id']);
        $data['password'] = md5(md5($data['password']).'dou');

        $userModel = M('User');
        $flag = $userModel->where(array('id' => $userId))->setField($data);
        if($flag){
            //更新成功
            $this->ajaxReturn(array(
                'error_code' => 0,
                'des' => '更新成功'
            ));
        }else{
            //失败
            $this->ajaxReturn(array(
                'error_code' => 1,
                'des' => '更新失败'
            ));
        }
    }

	public function do_add_admin()
	{
		$email = I('post.email');
		$password = I('post.password');
		$roleArr = I('post.roleid');
		if(!is_array($roleArr)){
			$this->error('添加用户必须授予一个角色');
		}
		if(!$password){
			$this->error('密码不能为空');
		}

		$userModel = D('User');
		$data = array(
			'email' => $email,
			'password' => md5(md5($password).'dou'),
			'last_login_time' => time(),
			'reg_time' => time(),
			'last_login_ip' => ip2long($_SEVER['REMOTE_ADDR']),
			'nic_name' => 'vshare',
			'name' => '胜远',
			'status' => 1,
			'is_sys' => 0,
		);

		if($userModel->create($data)){
			$addRes = $userModel->add();
			if($addRes){
				//该用户增加角色对应
				foreach($roleArr as $v){
					$userRoleModel = M('Userrole');
					$userRoleModel->role_id = $v;
					$userRoleModel->user_id = $addRes;
					$userRoleModel->add();
				}
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}else{
			$this->error($userModel->getError());
		}
	}

	public function user_group()
	{
		$roleModel = D('Role');
		$topGroup = $roleModel->getAllRole();

		$this->assign('group',$topGroup);
		$this->display('user_group');
	}

	public function update_group()
	{
		$roleID = intval(I('get.role_id'));
		$role = M('Role')->where(array('id'=>$roleID))->find();
		$topGroup = M('Role')->where(array('pid'=>0,'status'=>1,'is_sys'=>0))->select();

		$this->assign('role',$role);
		$this->assign('top_group',$topGroup);
		$this->display('update_group');
	}

	public function do_update_group()
	{
		$roleModel = D('Role');
		$roleModel->create();

		$roleModel->update_time = time();
		if($roleModel->save()){
			$this->success('修改成功');
		}else{
			$this->error($roleModel->getError());
		}
	}

	public function add_user_group()
	{
		$topGroup = M('Role')->where(array('pid'=>0,'status'=>1,'is_sys'=>0))->select();

		$this->assign('top_group',$topGroup);
		$this->display('add_user_group');
	}

	public function do_add_user_group()
	{

		$pid = intval(I('post.pid'));
		$groupName = I('post.group_name');
		$roleModel = D('Role');
		$roleModel->pid = $pid;
		$roleModel->role_name = $groupName;
		$roleModel->status = 1;
		$time = time();
		$roleModel->create_time = $time;
		$roleModel->update_time = $time;
		$roleModel->is_sys = 0;

		$roleModelD = D('Role');
		$hasName = $roleModelD->getRoleByRoleName($groupName);
		if($hasName){
			$this->ajaxReturn(array(
				'error_code' => 1,
				'des' => '名字已经存在'
			));
			exit();
		}

		$addRes = $roleModel->add();
		if($addRes){
			$this->ajaxReturn(array(
				'error_code' => 0,
				'des' => '添加成功',
				'data' => $addRes
			));
		}else{
			$this->ajaxReturn(array(
				'error_code' => 1,
				'des' => '数据插入失败'
			));
		}
		// if($roleModel->create()){
		// 	$addRes = $roleModel->add();
		// 	if($addRes){
		// 		$this->ajaxReturn(array(
		// 			'error_code' => 0,
		// 			'des' => '天假成功',
		// 			'data' => $addRes
		// 		));
		// 	}else{
		// 		$this->ajaxReturn(array(
		// 			'error_code' => 1,
		// 			'des' => '数据插入失败'
		// 		));
		// 	}
		// }else{
		// 	$this->ajaxReturn(array(
		// 		'error_code' => 1,
		// 		'des' => $roleModel->getError()
		// 	));
		// }
	}

	//检查用户组名
	public function check_user_group_name()
	{
		$groupName = I('post.group_name');
		$roleModel = D('Role');
		if($roleModel->getRoleByRoleName($groupName)){
			$error = 1;
			$des = '已经存在';
		}else{
			$error = 0;
			$des = '可以使用';
		}
		$this->ajaxReturn(array(
			'error_code' => $error,
			'des' => $des
		));
	}

	//删除用户组
	public function delete_group()
	{
		$roleID = intval(I('post.role_id'));
		$roleModel = M('Role');
		$role = $roleModel->where(array('id'=>$roleID,'is_sys'=>0))->find();
		if(!$role){
			$this->ajaxReturn(array(
				'error_code' => 1,
				'des' => '该用户组已不存在'
			));
			exit();
		}

		if($role['pid'] != 0){
			//是子分组，直接删除
			$deleteRes = $roleModel->where(array('id'=>$roleID))->delete();
			if($deleteRes){
				//删除该分组对应的权限
				$roleNodeModel = D('Rolenode');
				$roleNodeModel->deleteRoleNodeByRoleID($roleID);
                M('Userrole')->where(array('role_id'=>$roleID))->delete();
				$this->ajaxReturn(array(
					'error_code' => 0,
					'des' => '删除成功'
				));

				exit();
			}else{
				$this->ajaxReturn(array(
					'error_code' => 1,
					'des' => '系统错误,删除失败'
				));
			}
		}else{
			//一级分组，检查其自分组是否为空
			$childRole = $roleModel->where(array('pid'=>$roleID))->select();
			if($childRole){
				$this->ajaxReturn(array(
					'error_code' => 1,
					'des' => '该用户组有子分组不能删除'
				));
			}else{
				//直接删除
				$deleteRes = $roleModel->where(array('id'=>$roleID))->delete();
				if($deleteRes){
					$this->ajaxReturn(array(
						'error_code' => 0,
						'des' => '删除成功'
					));
				}else{
					$this->ajaxReturn(array(
						'error_code' => 1,
						'des' => '系统错误,删除失败'
					));
				}
			}
		}
	}

    //用户角色页
    public function user_role()
    {
        //获取用户的角色roleIds
        $userId = I('get.user_id');
        $userRole = D('Userrole');
        $roleIds = $userRole->getRoleIdsByUserID($userId);
        $userNicName = D('User')->where(array('id'=>$userId))->getField('nic_name');

        //获取全部角色
        $roles = D('Role')->getAllRole();

        $this->assign('user_id',$userId);
        $this->assign('role_ids',$roleIds);
        $this->assign('user_nic_name',$userNicName);
        $this->assign('roles',$roles);

        $this->display('user_role');
    }

    //用户-角色管理
    public function do_user_role()
    {
        $userID = I('post.user_id');
        $roleIDs = I('post.role_ids');

        if(!$roleIDs){
            $this->ajaxReturn(array(
                'error_code'=>1,
                'des'=>'请添加角色'
            ));
            exit();;
        }


        $userRole = D('Userrole');
        $data = array();
        $flag = $userRole->where(array('user_id'=>$userID))->find();
        if($flag){
            //删除用户角色
            if($userRole->where(array('user_id'=>$userID))->delete()){
                //添加角色
                foreach($roleIDs as $v){
                    $data[] = array('role_id'=>$v,'user_id'=>$userID);
                }
                if($userRole->addAll($data)){
                    $this->ajaxReturn(array(
                        'error_code'=>0,
                        'des'=>'保存成功'
                    ));
                }else{
                    $this->ajaxReturn(array(
                        'error_code'=>1,
                        'des'=>'保存失败,数据丢失'
                    ));
                }
            }else{
                $this->ajaxReturn(array(
                    'error_code'=>0,
                    'des'=>'失败,系统错误'
                ));
            }
        }else{
            //添加角色
            foreach($roleIDs as $v){
                $data[] = array('role_id'=>$v,'user_id'=>$userID);
            }
            if($userRole->addAll($data)){
                $this->ajaxReturn(array(
                    'error_code'=>0,
                    'des'=>'保存成功'
                ));
            }else{
                $this->ajaxReturn(array(
                    'error_code'=>1,
                    'des'=>'保存失败'
                ));
            }
        }




    }

    //角色权限页
    public function role_node()
    {
        //获取角色权限node_id
        $roleId = I('get.role_id');
        $roleNode = D('Rolenode');
        $nodeIds = $roleNode->getNodeIdsByRoleID($roleId);
        $roleName = D('Role')->where(array('id'=>$roleId))->getField('role_name');
        //获取全部权限
        $nodeModel = D('Node');
        $nodes = $nodeModel->getAllPriateNodes();
        $this->assign('role_id',$roleId);
        $this->assign('role_name',$roleName);
        $this->assign('node_ids',$nodeIds);
        $this->assign('nodes',$nodes);
        $this->display('role_node');
    }

    //给角色添加权限
    public function do_role_node()
    {
        $roleID = I('post.role_id');
        $nodeIDS = I('post.node_ids');
        if(!$nodeIDS){
            $this->ajaxReturn(array(
                'error_code'=>1,
                'des'=>'请添加权限'
            ));
            exit();;
        }
        $roleNode = D('Rolenode');
        $flag = $roleNode->where(array('role_id'=>$roleID))->find();
        $data = array();

        if($flag){
            //1.清除角色原来的权限
            if($roleNode->where(array('role_id'=>$roleID))->delete()){

                foreach($nodeIDS as $key=>$v){
                    $data[] = array('node_id'=>$v,'role_id'=>$roleID);
                }
                //添加权限
                if($roleNode->addAll($data)){
                    $this->ajaxReturn(array(
                        'error_code'=>0,
                        'des'=>'保存成功'
                    ));
                }else{
                    $this->ajaxReturn(array(
                        'error_code'=>1,
                        'des'=>'保存失败,数据丢失'
                    ));
                }
            }else{
                $this->ajaxReturn(array(
                    'error_code'=>1,
                    'des'=>'失败,系统错误'
                ));
            }
        }else{
            //给角色添加权限
            foreach($nodeIDS as $v){
                $data[] = array('node_id'=>$v,'role_id'=>$roleID);
            }
            if($roleNode->addAll($data)){
                $this->ajaxReturn(array(
                    'error_code'=>0,
                    'des'=>'保存成功'
                ));
            }else{
                $this->ajaxReturn(array(
                    'error_code'=>1,
                    'des'=>'保存失败'
                ));
            }
        }
    }

	//检查管理员邮箱是否唯一
	public function check_user_email()
	{
		$email = I('post.email');
		$user = M('User')->where(array('email'=>$email))->find();
		if($user){
			$this->ajaxReturn(array(
				'error_code' => 1,
				'des' => '邮箱已经被占用',
			));
		}else{
			$this->ajaxReturn(array(
				'error_code' => 0,
				'des' => '邮箱可以使用',
			));
		}
	}
}