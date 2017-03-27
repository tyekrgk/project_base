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
                    <a id="add-new-top-content" href="javascript:;"  class="btn btn-info btn-radius ">添加榜单内容</a>&nbsp;&nbsp;&nbsp;
                    <a id="refresh-top-content" href="javascript:;"  class="btn btn-info btn-radius ">刷新榜单缓存</a>&nbsp;&nbsp;&nbsp;
                </div>
                <br/>

	            <form class="pull-left form-inline" method="get" action="/backend/game/top_content" style="width: 100%">
	                筛选：<select name="top_type" >
	                		<option <?php if(($_GET['top_type']) == ""): ?>selected<?php endif; ?> value="0">所有</option>
	                		<?php if(is_array($top_type)): $i = 0; $__LIST__ = $top_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($i % 2 );++$i;?><option <?php if(($_GET['top_type']) == $key): ?>selected<?php endif; ?> value="<?php echo ($key); ?>"><?php echo ($one); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>	                    
	                <button class="btn btn-primary">查看</button>
	            </form>
                <div style="clear: both;margin-top: 28px;"></div>
                
                <div class="well">
                    <table class="table">
                        <tr class="head-table">
                            <th>自增序号</th>
                            <th>游戏ID</th>
                            <th>游戏名称</th>
                            <th>游戏图标</th>
                            <th>所属榜单</th>
                            <th>排序号</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($top_list)): $k = 0; $__LIST__ = $top_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($k % 2 );++$k;?><tr>
                            <td><?php echo ($one["id"]); ?></td>
                            <td><?php echo ($one["game_id"]); ?></td>
                            <td><?php echo ($one["game_info"]["name"]); ?></td>
                            <td><img width="50" height="50" src="<?php echo C('DIY_AWS_WEB'); echo ($one["game_info"]["icon"]); ?>" alt=""></td>
                            <td><?php echo ($one["type_name"]); ?></td>
                            <td><input class="sort" type="text" value="<?php echo ($one["sort"]); ?>"></td>
                            <td><a data-type="<?php echo ($one["type"]); ?>" data-game-id="<?php echo ($one["game_id"]); ?>" class="remove-game" href="javascript:;"><i class="icon-trash"></i></a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <?php echo ($page_html); ?>
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
		$('#add-new-top-content').click(function(){
            layer.open({
                type: 2,
                offset: '10px',
                skin: 'layui-layer-rim',
                area: ['1000px','850px'],
                content: '/backend/game/add_top_content',
                title: '<strong>添加榜单内容</strong>'
            }); 
        });

        
        //监控顺序值改变时
        $(document).on('blur','.sort',function(){
            var dataObj = $(this).parents('tr').find('.remove-game');
            var gameId = dataObj.attr('data-game-id');
            var type = dataObj.attr('data-type');
            var sort = $(this).val();
            if(!isNaN(sort)){
                $.post('/backend/game/update_top_sort',{game_id:gameId,type:type,sort:sort},function(msg){
                    layer.msg(msg.des);
                },'json');
            }else{
                layer.msg('需填写数字值');
            }
        });
        
        //从排行榜里移除
        $(document).on('click','.remove-game',function(){
            var gameId = $(this).attr('data-game-id');
            var type = $(this).attr('data-type');
            var obj = $(this);
            layer.confirm('确定移除？',{icon:3,tittle:'提示'},function(){
                $.post('/backend/game/do_delete_top',{type:type,game_id:gameId},function(msg){
                    layer.msg(msg.des);
                    if(msg.error_code == 0){
                        //删除节点
                        obj.parents('tr').remove();                   
                    }
                },'json');
            });
        });

        $('#refresh-top-content').click(function(){
            $.post('/backend/refresh/refresh_cache',{key:'game_top_key'},function(msg){
                layer.msg(msg.des);
            });
        });
	});
</script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>