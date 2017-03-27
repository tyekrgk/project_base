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
				    <button id="add-user-group" class="btn btn-info btn-radius">添加管理员</button>
				</div>
				<div>
					<form class="form-inline" method="get" action="/index.php/Backend/admin/admin" >
						<input type="text" name="keyword" placeholder="管理员真实名字/邮箱" value="<?php echo I('get.keyword');?>" > <button class="btn btn-info">搜索</button>
					</form>
				</div>
				
				<div class="well">
					<table class="table">
						<tr>
							<th>序号</th>
							<th>ID</th>
							<th>昵称</th>
							<th>真实名字</th>
							<th>登陆邮箱</th>
							<th>角色</th>
							<th>最后登陆时间</th>
							<th>最后登陆IP</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
						<?php if(is_array($users)): $k = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($k % 2 );++$k;?><tr>
								<td><?php echo ($k); ?></td>
								<td><?php echo ($one["id"]); ?></td>
								<td><?php echo ($one["nic_name"]); ?></td>
								<td><?php echo ($one["name"]); ?></td>
								<td><?php echo ($one["email"]); ?></td>
								<td>管理员</td>
								<td><?php echo (date('Y-m-d H:i:s',$one["last_login_time"])); ?></td>
								<td><?php echo (long2ip($one["last_login_ip"])); ?></td>
								<td>正常</td>
								<td>
                                                                    <a class="update-user" data-id="<?php echo ($one["id"]); ?>" title="编辑" href="javascript:;"><i class="icon-pencil"></i></a> | 
                                                                    <a title="删除" data-id="<?php echo ($one["id"]); ?>" class="delete-user" href="javascript:;"><i class="icon-trash"></i></a> | 
                                                                    <a title="角色" class="do-user-role" data-id="<?php echo ($one["id"]); ?>" href="javascript:;"><i class="icon-align-justify"></i></a>
                                                                </td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table>
				</div>
				<?php echo ($page); ?>
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

	//新增管理员
	$('#add-user-group').click(function(){
		layer.open({
		    type: 2,
		    skin: 'layui-layer-rim', //加上边框
		    area: ['620px', '540px'], //宽高
		    content: "<?php echo U('Admin/add_admin');?>",
		    title:'<strong>新增管理员</strong>',
		    shift: 5
		    // end:refresh //回调函数
		});
	});

	//删除管理员
	$('.delete-user').click(function(){
		var id = $(this).attr('data-id');
		layer.confirm('确认删除？',{icon: 3, title:'提示'}, function(index){
		    layer.close(index);
		    deleteUser(id);
		});
	});

	//执行删除函数
	function deleteUser(id){
		$.post('<?php echo U("/index.php/Admin/do_delete_admin");?>',{id:id},function(msg){
			layer.msg(msg.des);
			if(msg.error_code == 0){
				$('a[data-id="'+id+'"]').parents('tr').remove();
			}
		},'json');
	}

	//编辑管理员
	$('.update-user').click(function(){
		var id = $(this).attr('data-id');
		var url = '/index.php?m=backend&c=admin&a=update_admin'+'&id='+id;
		layer.open({
			type:2,
			skin: 'layui-layer-rim', //加上边框
		    area: ['420px', '240px'], //宽高
		    content: url,
		    title:'<strong>编辑管理员</strong>',
		    shift: 5,
//		    end:refresh
		});
	});

    //用户角色编辑
    $('.do-user-role').click(function(){
        var id = $(this).data('id');
        var url = '/index.php/backend/admin/user_role/user_id/'+id;
        layer.open({
            type: 2,
            skin: 'layui-layer-rim',//加上边框
            offset:'60px',  //弹框位置
            area: ['600px','520px'],//宽高
            content: url,
            title: '<strong>用户-角色管理</strong>'
        })
    });

	function refresh(){
		window.location.reload();
	}
</script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>