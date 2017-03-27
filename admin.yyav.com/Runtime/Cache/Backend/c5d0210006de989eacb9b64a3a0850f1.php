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

                <form class="pull-left form-inline" method="get" action="/backend/www/search" style="width: 100%">
                    <label for="">分类：</label>
                    <select class="span2" name="category" >
                        <option value="0">请选择</option>
                        <?php $_result=C('topic_category');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == $_GET['category']): ?>selected<?php endif; ?>><?php echo ($v); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="">关键词：</label>
                    <input type="text" name="keyword" value="<?php echo trim($_GET['keyword']);?>" placeholder="请输入名称" />&nbsp;&nbsp;
                    <button type="submit" id="search-form" class="btn btn-radius btn-info">搜 索</button>
                </form><br/>
                <div style="clear: both;margin-top: 28px;"></div>

                <div class="well">
                    <table class="table">
                        <tr>
                            <th >序号</th>
                            <th>ID</th>
                            <th>名称</th>
                            <th>图片</th>
                            <?php if($category == 1): ?><th>版本</th>
                                <th>操作</th><?php endif; ?>
                        </tr>
                        <?php if(empty($data)): ?><tr><td colspan="4" style="text-align: center;"><h4>暂无记录</h4></td></tr>
                            <?php else: ?>

                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($i); ?></td>
                                <td><?php echo ($one["id"]); ?></td>
                                <td><?php echo ($one["name"]); ?></td>
                                <td>
                                    <?php if($category == 1): ?><a target="_blank" href="http://android.vshare.com/<?php echo ($one["name_url"]); ?>"><img src="http://androidstatics.s3.amazonaws.com/<?php echo ($one["hash"]); ?>" style="width:100px;height:100px;"/></a>
                                        <?php elseif($category == 2): ?>
                                        <img src="<?php echo ($one["hash"]); ?>" style="width:100px;height:100px;"/>
                                        <?php elseif($category == 3): ?>
                                        <a href="http://webmediacenter.s3.amazonaws.com/<?php echo ($one["hash"]); ?>" target="_blank">点击试听</a>
                                        <?php elseif($category == 4): ?>
                                        <img src="http://webmediacenter.s3.amazonaws.com/<?php echo ($one["hash"]); ?>" style="width:100px;height:100px;"/><?php endif; ?>
                                </td>

                                <?php if($category == 1): ?><td><?php echo ($one["version_name"]); ?></td>
                                    <td>
                                        <?php if($one['is_deleted']): ?>已屏蔽&nbsp;|&nbsp;<a href="javascript:;" data-id="<?php echo ($one["id"]); ?>" data-status="0" class="update-android-status">还原</a>&nbsp;|&nbsp;
                                            <!--<a href="javascript:;" data-id="<?php echo ($one["id"]); ?>" class="delete-android-apps">删除</a>-->
                                        <?php else: ?>
                                            <a href="javascript:;" data-id="<?php echo ($one["id"]); ?>" data-status="1" class="update-android-status">屏蔽此应用</a><?php endif; ?>
                                    </td><?php endif; ?>
                            </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
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
        $('#search-form').click(function(){
            var category = $("select[name='category']").val();
            var keyword = $("input[name='keyword']").val();
            if(category == 0){
                layer.tips('请选择分类',$("select[name='category']"));
                return false;
            }
            if(!keyword){
                layer.tips('请输入关键词',$("input[name='keyword']"));
                return false;
            }
            return true;
        });

        //安卓应用屏蔽
        $('.update-android-status').live('click',function(){
            var id = $(this).data('id');
            var status = $(this).data('status');
            var message = '';
            if(status == 1){
                message = '确定屏蔽该应用？';
            }else{
                message = '确定还原该应用？';
            }
            layer.confirm(message,{icon:3,title:'提示'},function(index){
                layer.close(index);
                $.post('/backend/www/update_android_status',{id:id,is_deleted:status},function(msg){
                    layer.msg(msg.des);
                    if(msg.error_code == 0){
                        var str = '';
                        if(status == 1){
                            str = "已屏蔽&nbsp;|&nbsp;<a href='javascript:;' data-id="+id+" data-status='0' class='update-android-status'>还原</a>&nbsp;";
                        }else{
                            str = "<a href='javascript:;' data-id="+id+" data-status='1' class='update-android-status'>屏蔽此应用</a>";
                        }

                        $('a[data-id='+id+']').parent('td').html(str);
                    }
                });
            })
        });

//        //删除安卓应用
//        $('.delete-android-apps').live('click',function(){
//            var id = $(this).data('id');
//            layer.confirm('确定删除该应用？',{icon:3,title:'提示'},function(index){
//                $.post('/backend/www/delete_android_apps',{id:id},function(msg){
//                    layer.msg(msg.des);
//                    if(msg.error_code == 0){
//                        $('a[data-id='+id+']').parents('tr').remove();
//                    }
//                },'json')
//            });
//        })
    </script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>