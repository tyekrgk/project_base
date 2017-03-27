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
                    <a href="javascript:;"  class="btn btn-info btn-radius add-topic">创建专题</a>&nbsp;&nbsp;&nbsp;
                    <a href="javascript:;" data-key="backend_www_app" class="btn btn-warning btn-radius refresh-cache">更新应用缓存</a>&nbsp;&nbsp;&nbsp;
                    <a href="javascript:;" data-key="backend_www_ring" class="btn btn-warning btn-radius refresh-cache">更新铃声缓存</a>&nbsp;&nbsp;&nbsp;
                    <a href="javascript:;" data-key="backend_www_wallpaper" class="btn btn-warning btn-radius refresh-cache">更新壁纸缓存</a>
                </div>
                <br/>
                <form class="pull-left form-inline" method="get" action="/backend/www/topic" style="width: 100%">
                    <label for="">语言:</label>
                    <select class="span2" name="language" >
                        <option value="">所有</option>
                        <?php $_result=C('language');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == $_GET['language']): ?>selected<?php endif; ?>><?php echo ($v); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>&nbsp;&nbsp;
                    <label for="">大分类:</label>
                    <select class="span2" name="category" >
                        <option value="">所有</option>
                        <?php $_result=C('topic_category');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == $_GET['category']): ?>selected<?php endif; ?>><?php echo ($v); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>&nbsp;&nbsp;

                    <label for="">更新：</label>
                    <div class="input-append date form_datetime">
                        <input type="text" value="<?php echo trim(I('get.start_time'));?>"  name="start_time" class="datetimepicker1" placeholder="请选择">
                        <span class="add-on"><i class="icon-remove"></i></span>
                    </div>&nbsp;-&nbsp;
                    <div class="input-append date form_datetime">
                        <input name="end_time" value="<?php echo trim(I('get.end_time'));?>" class="datetimepicker2" type="text" placeholder="请选择">
                        <span class="add-on"><i class="icon-remove"></i></span>
                    </div>&nbsp;&nbsp;
                    标题匹配：<input type="text" placeholder="标题关键字" name="keyword"  value="<?php echo I('get.keyword');?>"/>
                    <button type="submit" id="search-form" class="btn btn-info btn-radius">搜 索</button>
                </form><br/>

                <div style="clear: both;margin-top: 28px;"></div>


                <div class="well">
                    <table class="table">
                        <tr>
                            <th width="3%">序号</th>
                            <th>ID</th>
                            <th>图片</th>
                            <th>名称</th>
                            <th>位置</th>
                            <th>大分类</th>
                            <th>小分类</th>
                            <th>语言</th>
                            <th>排序</th>
                            <th>发布</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($topics)): $i = 0; $__LIST__ = $topics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($i); ?></td>
                                <td><?php echo ($one["id"]); ?></td>
                                <td><img src="<?php echo C('DIY_AWS_WEB'); echo ($one["hash"]); ?>" style="width: 80px;height:80px;"></td>
                                <td><?php echo ($one["title"]); ?></td>
                                <td><?php echo C('topic_position')[$one['position']];?></td>
                                <td><?php echo C('topic_category')[$one['category']];?></td>
                                <td><?php echo ($one["type"]); ?></td>
                                <td><?php echo C('language')[$one['language']];?></td>
                                <td><?php echo ($one["sort"]); ?></td>
                                <td><?php if($one["status"] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
                                <td><?php echo (date("Y-m-d",$one["time"])); ?></td>
                                <td><a  data-id="<?php echo ($one["id"]); ?>" title="编辑" href="javascript:;" class="edit-topic"><i class="icon-pencil"></i></a> &nbsp;
                                    <a title="删除" data-id="<?php echo ($one["id"]); ?>" class="delete-topic" href="javascript:;"><i class="icon-trash"></i></a>
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
        //添加专题
        $('a.add-topic').click(function(){
            layer.open({
                type: 2,
                offset: '10px',
                skin: 'layui-layer-rim',
                area: ['1100px','850px'],
                content: '/backend/www/add_topic',
                title: '<strong>添加专题</strong>'
            });
        });

        //编辑专题
        $('a.edit-topic').click(function(){
            var id = $(this).data('id');
            var url = '/backend/www/update_topic/topic_id/'+id;
            layer.open({
                type: 2,
                offset: '10px',
                skin: 'layui-layer-rim',
                area: ['1100px','850px'],
                content: url,
                title: '<strong>编辑专题</strong>'
            });
        });

        //删除专题
        $("a.delete-topic").click(function(){
            var id = $(this).data('id');
            layer.confirm('删除专题,将删除其下所有应用!',{icon:3,tittle:'提示'},function(){
                var url = '/backend/www/delete_topic/topic_id/'+id;
                $.get(url,function(msg){
                    layer.msg(msg.des);
                    if(msg.error_code == 0){
                        $("a[data-id='"+id+"']").parents('tr').remove();
                    }
                })
            });
        });

        //搜索时间判断
        $('#search-form').click(function(){
            var start_time = $("input[name='start_time']").val();
            var end_time = $("input[name='end_time']").val();
            start_time = get_unix_time(start_time);
            end_time = get_unix_time(end_time);
            if(!(isNaN(start_time) || isNaN(end_time))){
                if(start_time>end_time){
                    layer.msg('结束时间必须大于开始时间');
                    return false;
                }else{
                    return true;
                }
            }

            return true;

        });

        //将时间转化时间戳
        function get_unix_time(dateStr)
        {
            var newstr = dateStr.replace(/-/g,'/');
            var date =  new Date(newstr);
            var time_str = date.getTime().toString();
            return time_str.substr(0, 10);
        }

        //日期插件
        $('input.datetimepicker1').datetimepicker({
            format: 'yyyy-mm-dd',
            language: 'zh-CN',
            minView: 2,
            todayHighlight: true,
            autoclose: true
        });
        //日期插件
        $('input.datetimepicker2').datetimepicker({
            format: 'yyyy-mm-dd',
            language: 'zh-CN',
            minView: 2,
            todayHighlight: true,
            autoclose: true
        });


        //更新缓存
        $('.refresh-cache').click(function(){
            var key = $(this).data('key');
            $.post('/backend/refresh/refresh_cache',{key:key},function(msg){
               layer.msg(msg.des);
            });
        });

        //置空时间
        $('.add-on').click(function(){
            $(this).parent('div').find('input').val('');
        });


    </script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>