<?php
namespace Backend\Controller;
use Backend\Controller\AuthController;


class MainController extends AuthController
{
	public function index()
	{
        $this->assign('login_user',$this->_get_login_user());
        $this->assign('menu',$this->_get_menu());
		$this->display('index');
	}

    //获取当前登录用户
    private function _get_login_user()
    {
        $userID = json_decode(cookie('adminLoginUser'),true)['id'];
        $userModel = D('User');
        $loginUser = $userModel->where(array('id'=>$userID))->find();
        return $loginUser;
    }

    //获取左侧菜单
    private function _get_menu()
    {
        $loginUser = $this->_get_login_user();
        $userID = $loginUser['id'];

        $userModel = D('User');
        $loginUser = $userModel->where(array('id'=>$userID))->find();

        $nodeModel = D('Node');
        $nodeIds = array();
        if($loginUser['is_sys']){
            //系统用户，拥有所有权限节点action
            $nodes = $nodeModel->where(array('is_public'=>0,'is_menu'=>1,'type'=>'action'))->select();
            
            foreach($nodes as $v){
                $nodeIds[] = $v['id'];
            }
        }else{
            //非系统用户，读取角色ID
            $roles = M('Userrole')->where(array('user_id'=>$loginUser['id']))->select();

            if($roles){
                $roleIds = array();

                foreach($roles as $k=>$v){
                    $roleIds[] = $v['role_id'];
                }
     
                if($roleIds){
                    //该用户所属角色拥有的权限节点
                    $hasNode = M('Rolenode')->where(array('role_id'=>array('in',$roleIds)))->select();

                    if($hasNode){
                        foreach($hasNode as $v){
                            $tempNode = M('Node')->find($v['node_id']);
                            if($tempNode['is_menu'] == 1){
                                $nodeIds[] = $v['node_id'];
                            }
                        }
                    }
                }
                
            }
        }
        
        //生成菜单
        $menu = array();
        if($nodeIds){
            foreach($nodeIds as $v){
                $nodeDetail = $nodeModel->find($v);
                $menu[] = $nodeDetail['pid'];
                $menu[] = $v;
            }
        }

        //去重
        $menu = array_unique($menu);

        $allNode = $nodeModel->getAllMenuNodes();

        $menuHtmlArr = array();
        foreach($allNode as $k=>$v){
            //开始生成
            if($v['is_public'] == 1){
                $menuHtmlArr[$k]['title'] = $v['title'];
                $menuHtmlArr[$k]['icon'] = $v['icon'];
                $menuHtmlArr[$k]['name'] = $v['name'];
                $menuHtmlArr[$k]['id'] = $v['id'];
            }else{
                if(in_array($v['id'],$menu)){
                    $menuHtmlArr[$k]['title'] = $v['title'];
                    $menuHtmlArr[$k]['icon'] = $v['icon'];
                    $menuHtmlArr[$k]['name'] = $v['name'];
                    $menuHtmlArr[$k]['id'] = $v['id'];
                }
            }
            
            foreach($v['child_node'] as $kk=>$vv){
                if($vv['is_public'] == 1){
                    $menuHtmlArr[$k]['child'][$kk]['title'] = $vv['title'];
                    $menuHtmlArr[$k]['child'][$kk]['icon'] = $vv['icon'];
                    $menuHtmlArr[$k]['child'][$kk]['name'] = $vv['name'];
                }else{
                    if(in_array($vv['id'],$menu)){
                        $menuHtmlArr[$k]['child'][$kk]['title'] = $vv['title'];
                        $menuHtmlArr[$k]['child'][$kk]['icon'] = $vv['icon'];
                        $menuHtmlArr[$k]['child'][$kk]['name'] = $vv['name'];
                    }
                }
            }
            
        }

        return $menuHtmlArr;
    }
    //欢迎页面
    public function welcome()
    {
        $this->display('welcome');
    }

    //账户信息
    public function mycount()
    {
        $this->assign('my_count',$this->_get_login_user());
        $this->display('mycount');
    }

    //修改密码页
    public function update_password()
    {
        $this->assign('user',$this->_get_login_user());
        $this->display('update_password');
    }

    //修改密码
    public function do_update_password()
    {
        $id = I('post.id');
        $data['nic_name'] = I('post.nic_name');
        $password = I('post.password');
        if($password){
            $data['password'] = md5(md5($password).'dou');
        }
        $userModel = D('User');
        $flag = $userModel->where(array('id'=>$id))->setField($data);
        if($flag){
            $this->ajaxReturn(array(
                'error_code' => 0,
                'des' => '修改成功'
            ));
        }else{
            $this->ajaxReturn(array(
                'error_code' => 1,
                'des' => '修改失败'
            ));
        }
    }

}