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
				    <button id="add-node" class="btn btn-info btn-radius">添加节点</button>
				  	<div class="btn-group">
				  	</div>
				</div>
				<div class="well">
				    <table class="table table-hover">
				    	<tr>
				    		<th width="8%">编号</th>
                            <th width="6%">ID</th>
				    		<th width="15%">节点名</th>
                            <th width="15%">中文名称</th>
                            <th width="8%">类型</th>
                            <th width="8%">图标</th>
                            <th width="8%">菜单栏</th>
                            <th width="8%">状态</th>
                            <th width="8%">公共节点</th>
                            <th width="8%">排序</th>
				    		<th width="8%">操作</th>
				    	</tr>

                        <?php if(is_array($nodes)): $i = 0; $__LIST__ = $nodes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="success" data-id="<?php echo ($vo["id"]); ?>" style="cursor: pointer">
                            <td><?php echo ($i); ?></td>
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ($vo["name"]); ?></td>
                            <td><?php echo ($vo["title"]); ?></td>
                            <td><?php echo ($vo["type"]); ?></td>
                            <td><?php if($vo.icon): ?><i class="<?php echo ($vo["icon"]); ?>"></i><?php else: ?>无<?php endif; ?></td>

                            <td>
                                <?php if($vo["is_menu"] == 1 ): ?>是
                                    <?php else: ?> 否<?php endif; ?>

                            </td>
                            <td>
                                <?php if($vo["status"] == 1 ): ?>激活
                                    <?php else: ?> 禁用<?php endif; ?>
                            </td>
                            <td>
                                <?php if($vo["is_public"] == 1 ): ?>是
                                    <?php else: ?> 否<?php endif; ?>
                            </td>
                            <td><?php echo ($vo["sort"]); ?></td>

                            <td>
                                <a class="do_update" href="/index.php/backend/admin/edit_node/node_id/<?php echo ($vo["id"]); ?>" alt="编辑"><i class="icon-pencil"></i></a>&nbsp;&nbsp;
                                <a class="do_delete" href="javascript:;" data-id="<?php echo ($vo["id"]); ?>" alt="删除" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                            </td>

                        </tr>
                            <tr><td colspan="11">
                            <table class="table sub-success-<?php echo ($vo["id"]); ?>" style="display: none">
                            <?php if(is_array($vo["child_node"])): $k = 0; $__LIST__ = $vo["child_node"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($k % 2 );++$k;?><tr  class="sub-tr">
                                    <td width="8%">&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-arrow-right"></i><?php echo ($i); ?>.<?php echo ($k); ?></td>
                                    <td width="6%"><?php echo ($o["id"]); ?></td>
                                    <td width="15%"></i><?php echo ($o["name"]); ?></td>
                                    <td width="15%"></i><?php echo ($o["title"]); ?></td>
                                    <td width="8%"><?php echo ($o["type"]); ?></td>
                                    <td width="8%"><?php if($o.icon): ?><i class="<?php echo ($o["icon"]); ?>"></i><?php else: ?>无<?php endif; ?></td>
                                    <td width="8%">
                                        <?php if($o["is_menu"] == 1 ): ?>是
                                            <?php else: ?> 否<?php endif; ?>

                                    </td>
                                    <td width="8%">
                                        <?php if($o["status"] == 1 ): ?>激活
                                            <?php else: ?> 禁用<?php endif; ?>
                                    </td>
                                    <td width="8%">
                                        <?php if($o["is_public"] == 1 ): ?>是
                                            <?php else: ?> 否<?php endif; ?>
                                    </td>
                                    <td width="8%"><?php echo ($o["sort"]); ?></td>
                                    <td width="8%">
                                        <a class="do_update" href="/backend/admin/edit_node/node_id/<?php echo ($o["id"]); ?>" alt="编辑"><i class="icon-pencil"></i></a>&nbsp;&nbsp;
                                        <a class="do_delete" href="javascript:;" data-id="<?php echo ($o["id"]); ?>" alt="删除" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
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
		$('#add-node').click(function(){
			layer.open({
			    type: 2,
			    skin: 'layui-layer-rim', //加上边框
                offset: '50px',
			    area: ['510px', '500px'], //宽高
			    content: "/backend/admin/edit_node",
			    title:'<strong>新增权限节点</strong>',
			    //end:refresh //回调函数
			});
		});

		$(".do_update ").click(function(){
			var url = $(this).attr('href');
            layer.open({
                type: 2,
                skin: 'layui-layer-rim', //加上边框
                offset: '50px',
                area: ['510px', '500px'], //宽高
                content: url,
                title:'<strong>更新权限节点</strong>',
                //end:refresh //回调函数
            });
			return false;
		});

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

		function deleteRole(nodeID){
			$.post('/index.php/backend/admin/delete_node',{node_id:nodeID},function(msg){
				layer.msg(msg.des);
				if(msg.error_code == 0){
					$('a[data-id="'+nodeID+'"]').parents('tr.sub-tr').remove();
				}
			},'json');
		}

        //添加点击隐藏/显示 子节点
        $('tr.success').click(function(){
            var id = $(this).data('id');
            var subObj = $(".sub-success-"+id);
            subObj.toggle();
        });
	</script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>