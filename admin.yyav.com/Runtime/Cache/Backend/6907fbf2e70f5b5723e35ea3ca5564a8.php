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
                    <a id="add-new-category" href="javascript:;"  class="btn btn-info btn-radius add-topic">新增分类</a>&nbsp;&nbsp;&nbsp;
                    <a id="refresh-category" href="javascript:;"  class="btn btn-info btn-radius add-topic">刷新分类</a>
                </div>
                <br/>
				
				<form class="pull-left form-inline" method="get" action="/backend/game/category_list" style="width: 100%">
                    <label for="">一级分类筛选:</label>
                    <select class="span2" name="pid" >
                        <option <?php if(($_GET['pid']) == "all"): ?>selected<?php endif; ?> value="all">所有</option>
                        <option <?php if(($_GET['pid']) == "0"): ?>selected<?php endif; ?> value="0">所有一级分类</option>
                        <?php if(is_array($top_category_list)): $i = 0; $__LIST__ = $top_category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($i % 2 );++$i;?><option <?php if(($_GET['pid']) == $one['id']): ?>selected<?php endif; ?> value="<?php echo ($one["id"]); ?>"><?php echo ($one["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>&nbsp;&nbsp;
                    <label class="btn btn-default btn-radius">
                        <input type="radio" <?php if($_GET['is_deleted'] != 1): ?>checked<?php endif; ?> class="toggle" name="is_deleted" value="0" />未删除
                    </label>
                    <label class="btn btn-default btn-radius ">
                        <input type="radio"  <?php if($_GET['is_deleted'] == 1): ?>checked<?php endif; ?> class="toggle" name="is_deleted" value="1" /> 已删除
                    </label>&nbsp;
                    <button type="submit" id="search-form" class="btn btn-info btn-radius">搜 索</button>
                </form><br/>
				
				<div style="clear: both;margin-top: 28px;"></div>

                <div class="well">
                    <table class="table">
                        <tr>
                            <th width="3%">序号</th>
                            <th>ID</th>
                            <th>名称</th>
                            <th>Seo URL</th>
                            <th>所属分类</th>
                            <th>排序号</th>
                            <th>添加时间</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($category_list)): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($key+1); ?></td>
							<td><?php echo ($one["id"]); ?></td>
							<td><?php echo ($one["name"]); ?></td>
							<td><?php echo ($one["name_url"]); ?></td>
							<td><?php echo ($one["parent_name"]); ?></td>
							<td><?php echo ($one["sort"]); ?></td>
							<td><?php echo (date("Y-m-d",$one["time"])); ?></td>
							<td>
								<a class="edit-category" href="/backend/game/update_category?id=<?php echo ($one["id"]); ?>" title="编辑"><i class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp; 

								<a class="delete-category" data-do-type="<?php if(($one["is_deleted"]) == "0"): ?>delete<?php else: ?>canceldelete<?php endif; ?>" data-id="<?php echo ($one["id"]); ?>" href="javascript:;" title="删除"><?php if(($one["is_deleted"]) == "0"): ?><i class="icon-trash"></i><?php else: ?>恢复<?php endif; ?></a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
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
    
<script>
	$(function(){

		$('#add-new-category').click(function(){
			// alert('xxxx');
			layer.open({
                type: 2,
                offset: '10px',
                skin: 'layui-layer-rim',
                area: ['800px','550px'],
                content: '/backend/game/add_category',
                title: '<strong>新增游戏分类</strong>'
            });
		});

		$('.edit-category').click(function(){
			var url = $(this).attr('href');

			layer.open({
                type: 2,
                offset: '10px',
                skin: 'layui-layer-rim',
                area: ['800px','550px'],
                content: url,
                title: '<strong>编辑游戏分类</strong>'
            });
			return false;
		});

		$('.delete-category').click(function(){
			var id = $(this).attr('data-id');
			var doType = $(this).attr('data-do-type');
			var t = $(this);

			var doStr = ''
			if(doType == 'delete'){
				doStr = '删除';
			}else{
				doStr = '恢复';
			}
			layer.confirm('确定'+doStr+'？但该分类会记录在数据库保存!',{icon:3,tittle:'提示'},function(){
				$.post('/backend/game/do_delete_category',{id:id,do_type:doType},function(msg){
					if(msg == 1){
						console.log(msg);
						layer.msg(doStr+'成功');
						t.parents('tr').remove();
					}else{
						layer.msg(doStr+'失败');
					}
				},'json');
			});
		});
        
        $('#refresh-category').click(function(){
            $.post('/backend/refresh/refresh_cache',{key:'game_category_key'},function(msg){
                layer.msg(msg.des);
            });
        });
	});
</script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>