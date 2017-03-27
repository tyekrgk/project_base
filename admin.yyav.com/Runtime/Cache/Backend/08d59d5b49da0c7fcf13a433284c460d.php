<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="vshare jeffwang">
    <link rel="stylesheet" type="text/css" href="/Static/admintheme/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/Static/admintheme/stylesheets/theme.css">
    <link rel="stylesheet" href="/Static/admintheme/lib/font-awesome/css/font-awesome.css">
    <script src="/Static/admintheme/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/Static/admintheme/lib/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="/Static/uploadfile/jquery.fileupload.css">


    <!-- Demo page code -->
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
        .btn-radius{border-radius: 3px;}
        .now{color: #101010;font-weight: 600;padding:11px 14px;border: 1px solid #CCC;background-color: #fff}
    </style>
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="lib/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">

  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class="">
  <!--<![endif]-->
    <!-- 内容开始 -->
    <div class="">
        <!-- 内容导航位置 开始-->
        <?php echo ($nav); ?>
        <!-- 内容导航位置 结束-->
        <!-- 正文内容 开始-->
        
	<div class="container-fluid">
    	<div class="row-fluid">
      		<div class="row-fluid">
      			<div class="btn-toolbar">
				    <button id="add-user-group" class="btn btn-info btn-radius"> 添加用户组</button>
				  	<div class="btn-group">
				  	</div>
				</div>
				<div class="well">
				    <table class="table table-hover">
				    	<tr>
				    		<th width="33%">编号</th>
				    		<th width="34%">组名</th>
				    		<th width="33%">操作</th>
				    	</tr>
					    <?php if(is_array($group)): $k = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($k % 2 );++$k;?><tr class="success" style="cursor: pointer" data-id="<?php echo ($one["id"]); ?>">
					    		<td><?php echo ($k); ?></td>
					    		<td><?php echo ($one["role_name"]); ?></td>
					    		<td>
					    			<?php if(($one["is_sys"]) != "1"): ?><a class="do_update" href="<?php echo U('Admin/update_group',array('role_id'=>$one['id']));?>"><i class="icon-pencil"></i></a>&nbsp;&nbsp;
					    			    <a class="do_delete" href="javascript:;" data-id="<?php echo ($one["id"]); ?>" role="button" data-toggle="modal"><i class="icon-remove"></i></a><?php endif; ?>
					    		</td>
					    	</tr>
                            <tr><td colspan="3">
                                <table class="table sub-success-<?php echo ($one["id"]); ?>" style="display: none">
                                    <?php if(is_array($one["child_group"])): $kk = 0; $__LIST__ = $one["child_group"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($kk % 2 );++$kk;?><tr>
                                        <td width="33%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-arrow-right"></i><?php echo ($k); ?>.<?php echo ($kk); ?></td>
                                        <td width="34%"><?php echo ($o["role_name"]); ?></td>
                                        <td width="33%">
                                            <?php if(($one["is_sys"]) != "1"): ?><a class="do_update" href="<?php echo U('/index.php/Admin/update_group',array('role_id'=>$o['id']));?>" alt="编辑"><i class="icon-pencil"></i></a>&nbsp;&nbsp;
                                                <a class="do_delete" href="javascript:;" data-id="<?php echo ($o["id"]); ?>" alt="删除" role="button" data-toggle="modal"><i class="icon-remove"></i></a>&nbsp;&nbsp;
                                                <a class="do_user_node" data-id="<?php echo ($o["id"]); ?>" title="角色权限" href="javascript:;"><i class="icon-flag"></i></a><?php endif; ?>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </table>
                            </td></tr><?php endforeach; endif; else: echo "" ;endif; ?>

				    </table>
				</div>

      		</div>
      	</div>
    </div>

        <!-- 正文内容 结束-->
    </div>
    <!-- 内容结束 -->
    <script src="/Static/admintheme/lib/bootstrap/js/bootstrap.js"></script>
    <script src="/Static/admintheme/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script src="/Static/admintheme/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.zh-CN.js"></script>
    <script src="/Static/js/layer/layer.js"></script>
    <script src="/Static/uploadfile/vendor/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="/Static/uploadfile/jquery.fileupload.js"></script>
    <script type="text/javascript">
        // console.log('加快速度，让代码飞一会儿');
    </script>
    <!-- 自定义js效果 开始 -->
    
	<script type="text/javascript">
		//添加用户组效果
		$('#add-user-group').click(function(){
			layer.open({
			    type: 2,
			    skin: 'layui-layer-rim', //加上边框
			    area: ['420px', '280px'], //宽高
			    content: "<?php echo U('Admin/add_user_group');?>",
			    title:'<strong>新增用户组</strong>',
//			    end:refresh //回调函数
			});
		});

        //编辑组
		$(".do_update ").click(function(){
			var url = $(this).attr('href');
			layer.open({
				type:2,
				skin: 'layui-layer-rim', //加上边框
			    area: ['400px', '260px'], //宽高
			    content: url,
			    title:'<strong>编辑组名</strong>',
			});
			return false;
		});

        //删除
		$('.do_delete').click(function(){
			var id = $(this).attr('data-id');
			layer.confirm('确认删除？', {icon: 3, title:'提示'}, function(index){
			    layer.close(index);
			    deleteRole(id);
			});
		});

		function refresh(){
			window.location.href=window.location.href;
		}

		function deleteRole(roleID){
			$.post('/index.php?m=backend&c=admin&a=delete_group',{role_id:roleID},function(msg){
				layer.msg(msg.des);
				if(msg.error_code == 0){
					$('a[data-id="'+roleID+'"]').parents('tr').remove();
				}
			},'json');
		}

        //权限
        $('.do_user_node').click(function(){
            var id = $(this).data('id');
            var url = '/index.php/backend/admin/role_node/role_id/'+id;
            layer.open({
                type: 2,
                skin: 'layui-layer-rim',//加上边框
                offset:'60px',  //弹框位置
                area: ['600px','520px'],//宽高
                content: url,
                title: '<strong>角色-权限管理</strong>'
            })
        });

        //点击显示/隐藏子列表
        $('tr.success').click(function(){
            var id = $(this).data('id');
            var subObj = $('.sub-success-'+id);
            subObj.toggle();
        });
	</script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>