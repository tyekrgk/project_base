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
        
    <div>

        <div class="well" style="width: 50%;margin: 50px auto;">
            <table class="table table-bordered" >
                <caption><h2><?php echo ($my_count['name']); ?>的基本信息</h2></caption>
                <tr>
                    <td style="text-align: right">昵称:</td><td><?php echo ($my_count['nic_name']); ?></td>
                    <td style="text-align: right">邮箱:</td><td><?php echo ($my_count['email']); ?></td>
                </tr>
                <tr>
                    <td style="text-align: right">角色:</td>
                    <td >
                        <?php if($my_count['is_sys'] == 1): ?>系统用户
                        <?php else: ?>普通用户<?php endif; ?>
                    </td>
                    <td style="text-align: right">状态:</td>
                    <td>
                        <?php if($my_count['status'] == 1): ?>正常
                            <?php else: ?>异常<?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right">注册时间:</td><td><?php echo (date('Y-m-d H:i:s',$my_count['reg_time'])); ?></td>
                    <td style="text-align: right">上次登录时间:</td><td><?php echo cookie('last_time');?></td>
                </tr>
                <tr><td style="text-align: right">上次登录IP:</td><td colspan="3"><?php echo cookie('last_ip');?></td></tr>

            </table>
            <div style="text-align: center;">
                <button id="update-password" class="btn btn-info btn-radius"><i class="icon-pencil"></i>修改基本信息</button>
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
        $('#update-password').click(function(){
            layer.open({
                type: 2,
                skin: 'layui-layer-rim',//加上边框
                area: ['380px','300px'],
                offset: '170px',
                content: "/backend/main/update_password",
                title:'<strong>修改基本信息</strong>',
                shift: 5,
//                end: refresh
            });
        });

        function refresh(){
            window.location.href=window.location.href;
        }
    </script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>