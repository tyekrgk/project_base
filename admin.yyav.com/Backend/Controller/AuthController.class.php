<?php
namespace Backend\Controller;
use Backend\Controller\BaseController;

class AuthController extends BaseController
{
    public $zhController;
    public $zhAction;
    public $nav;
	public function _initialize()
    {

        if(!cookie('jeffbackendhaslogin')){
            echo "<script>window.parent.location.href='/backend/passport/login'</script>";
            exit();
        }
        
        $loginUser = json_decode(cookie('adminLoginUser'),true);

        $controllerName = CONTROLLER_NAME;
        $actionName = ACTION_NAME;
        
        //自动注册当前的操作方法到节点表
        $nodeModelM = M('Node');
        $currentController = $nodeModelM->where(array('name'=>$controllerName))->find();
        $controller = '';
        $action = '';
        // echo 'xxxx';
        // echo $currentController;exit();
        if(!$currentController){
            //不存在则新增(注册控制器controller)
            $nodeModelM->name = $controllerName;
            $nodeModelM->status = 0;
            $nodeModelM->sort = 0;
            $nodeModelM->title = "新增未编辑";
            $nodeModelM->is_public = 0;
            $nodeModelM->is_menu = 0;
            $nodeModelM->type = 'controller';
            $nodeModelM->icon = '';
            $nodeModelM->level = 1;
            $nodeModelM->pid = 0;
            $addRes = $nodeModelM->add();
            
            //注册方法（action）
            if($addRes){
                $nodeModelM->name = $actionName;
                $nodeModelM->status = 0;
                $nodeModelM->sort = 0;
                $nodeModelM->title = "新增未编辑";
                $nodeModelM->is_public = 0;
                $nodeModelM->is_menu = 0;
                $nodeModelM->type = 'action';
                $nodeModelM->icon = '';
                $nodeModelM->level = 2;
                $nodeModelM->pid = $addRes;
                $addRes = $nodeModelM->add();
            }
        }else{
            //存在再检查当前方法是否存在
            $currentAction = $nodeModelM->where(array('pid'=>$currentController['id'],'name'=>$actionName))->find();
            if(!$currentAction){
                unset($nodeModelM->id);
                $nodeModelMn = M('Node');
                $nodeModelMn->name = $actionName;
                $nodeModelMn->status = 0;
                $nodeModelMn->sort = 0;
                $nodeModelMn->title = "新增未编辑";
                $nodeModelMn->is_public = 0;
                $nodeModelMn->is_menu = 0;
                $nodeModelMn->type = 'action';
                $nodeModelMn->icon = '';
                $nodeModelMn->level = 2;
                $nodeModelMn->pid = $currentController['id'];
                $addRes = $nodeModelMn->add();
                exit();
            }
            $controller = $currentController;
            $action = $currentAction;
        }


        //系统管理员或开启调式模式 则不需要验证
        if(!$loginUser['is_sys'] && C('CHECK_ACTION')){

            $nodeModel = D('Node');
            $controllerId = $nodeModel->where(array('name'=>$controllerName,'type'=>'controller'))->getField('id');

            $actionId = $nodeModel->where(array('pid'=>$controllerId,'name'=>$actionName))->getField('id');

            if(!($controllerId && $actionId)){
                echo json_encode(array(
                    'error_code' => 1,
                    'des' => "request controller {$controllerName} or action {$actionName} is not exist"
                ));
                exit;
            }

            //验证是否公共权限
            $publicIds = $nodeModel->getPublicIds();
            if(in_array($controllerId,$publicIds)){
                return ;
            }

            //获取用户角色ids
            $roleIds = D('Userrole')->getRoleIdsByUserID($loginUser['id']);
            $flag = D('Rolenode')->where(array('role_id'=>array('in',$roleIds),'node_id'=>$actionId))->find();

            if(!$flag){
                echo json_encode(array(
                    'error_code' => 1,
                    'des' => 'you dont hava the power to do it,ps=>'.$controllerName.'-'.$actionName,
                ));
                exit;
            }
        }

        $this->zhController = $controller['title'];
        $this->zhAction = $action['title'];
        if($action['is_menu']==1 && $controller['is_menu'] == 1){
            
            $mymj = array(
                '世上没有绝望的处境，只有对处境绝望的人。',
                '第一个青春是上帝给的；第二个青春是靠自己努力的。',
                '每个人都会累，没人能为你承担所有悲伤，人总有一段时间要学会自己长大。',
                '不要生气要争气，不要看破要突破，不要嫉妒要欣赏，不要拖延要积极，不要心动要行动。',
                '别想一下造出大海，必须先由小河川开始。',
                '微笑比皱眉好看，请求比呵斥自然。',
                '少说多做，句句都会得到别人的重视；多说少做，句句都会受到别人的忽视。',
                '因为年轻我们一无所有，也正因为年轻我们将拥有一切。',
                '每天晚上疲惫地坐到椅子上时，才觉得真真切切地过了一天。',
                '世上最重要的事，不在于我们在何处，而在于我们朝着什么方向走。',
                '人生的奋斗可以分五个阶段：1、为了生存下来，立足社会。2、改善生活，提高品质。3、有点成就，需要炫耀，让更多人知道自己的成功。4、阅历多了，开始追求感觉的东西。5、归朴还真，上升到精神的境界。',
                '爱上一个人容易，等平淡了后，还坚守那份诺言，就不容易了。',
                '宝剑锋从磨砺出，梅花香自苦寒来。',
            );
            $index = array_rand($mymj);
            $this->nav = '<ul class="breadcrumb"><li><a href="javascript:;">'.$this->zhController.'</a> <span class="divider">/</span></li><li class="active">'.$this->zhAction.'<a title="刷新" href=""><i class="icon-refresh"></i></a></li><li>'.$mymj[$index].'</li></ul>';
            $this->assign('nav',$this->nav);
        }
    }
}