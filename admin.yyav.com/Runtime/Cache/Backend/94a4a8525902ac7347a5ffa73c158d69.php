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
                <a id="add-new-author" href="javascript:;"  class="btn btn-info btn-radius ">添加编辑</a>&nbsp;&nbsp;&nbsp;
            </div>
            <br/>

            <form class="pull-left form-inline" method="get" action="/backend/pingce/author_list" style="width: 100%">
				关键词匹配：<input type="text" name="keyword" value="<?php echo ($_GET['keyword']); ?>" placeholder="ID或游戏名字" >
                    <button class="btn btn-primary">搜索</button>
            </form>

            <div style="clear: both;margin-top: 28px;"></div>

            <div class="well">
                <table class="table">
                    <tr>
                        <th width="3%">序号</th>
                        <th>ID</th>
                        <th>名称</th>
                        <th>头像</th>
                        <th>介绍</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>

                    <?php if(is_array($author_list)): $k = 0; $__LIST__ = $author_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($k % 2 );++$k;?><tr>
                        <td><?php echo ($k); ?></td>
                        <td><?php echo ($one["id"]); ?></td>
                        <td><?php echo ($one["name"]); ?></td>
                        <td><img height="100" width="100" src="<?php echo C('DIY_AWS_WEB'); echo ($one["head_pic"]); ?>" alt=""></td>
                        <td><?php echo ($one["description"]); ?></td>
                        <td><?php echo (date("Y-m-d",$one["time"])); ?></td>
                        <td><a data-id="<?php echo ($one["id"]); ?>" class="do-update" href="javascript:;"><i class="icon-pencil"></i></a> &nbsp;&nbsp;<a data-id="<?php echo ($one["id"]); ?>" class="do-delete" href="javascript:;"><i class="icon-trash"></i></a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
            
            <?php echo ($page_html); ?>
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
        $('#add-new-author').click(function(){
            layer.open({
                type: 2,
                offset: '10px',
                skin: 'layui-layer-rim',
                area: ['1000px','850px'],
                content: '/backend/pingce/add_author',
                title: '<strong>添加编辑</strong>'
            });
        });

        $('.do-update').click(function(){
            var id = $(this).attr('data-id');
            layer.open({
                type: 2,
                offset: '10px',
                skin: 'layui-layer-rim',
                area: ['1000px','850px'],
                content: '/backend/pingce/update_author/id/'+id,
                title: '<strong>添加编辑</strong>'
            });
        });

        $('.do-delete').click(function(){
            var id = $(this).attr('data-id');
            layer.confirm('确定删除该作者？',{icon:3,title:'提示'},function(index){
                layer.close(index);
                $.post('/backend/pingce/do_delete_author',{id:id},function(msg){
                    layer.msg(msg.des);
                    if(msg.error_code == 0){
                        $('a[data-id='+id+']').parents('tr').remove();
                    }
                })
            });
        });
    });
</script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>