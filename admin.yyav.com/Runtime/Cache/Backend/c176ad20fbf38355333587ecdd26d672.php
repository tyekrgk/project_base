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
    
    <style type="text/css">
         .form-inline{margin-top:35px;}
         .form-inline label{font-size:16px;color:#333;font-weight:700;}
         .form-inline div input{margin-left:50px;}
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

                <form class="form-inline" method="post" action="/Backend/Sodo/show_search" >
                    <label for="">应用渠道：</label></br>
                    <div>
                    	<input <?php if(($_POST['type']) == "ios"): ?>checked="checked"<?php endif; ?>  type="radio" name="type"
                         value="ios" />ios
                    	<input <?php if(($_POST['type']) == "windows"): ?>checked="checked"<?php endif; ?>  type="radio" name="type" value="windows" />wp
                    	<input <?php if(($_POST['type']) == "android"): ?>checked="checked"<?php endif; ?>  type="radio" name="type" value="android" />android
                    </div>

                    </br>

                    <label for="">id：</label></br>
                    <div>
                    	<input type="text" name="id"  value="<?php echo ($_POST['id']); ?>" />
                    </div>

                    </br>

                    <div class="form-group" style="text-align:center;">
                        <button type="submit" class="btn btn-info btn-radius" style="width: 100px;">提交</button>
                    </div>

                </form>
               
                <?php if(!empty($app)): ?><div class="well">
                    <div class="well">
					    <table class="table">
						    <tr>
							    <th>图片</th>
							    <th>ID</th>
							    <th>名称</th>
						    </tr>
						    <tr> 
							    <td>
                                    <a href="http://www.appsodo.com/<?php echo ($app["src"]); ?>" target="_blank" >
                                        <img src="<?php echo ($app["icon"]); ?>" />
                                    </a>
                                </td>
							    <td><?php echo ($app["trackId"]); ?></td>
							    <td><?php echo ($app["trackName"]); ?></td>
						    </tr>
					    </table>
				    </div>
                </div><?php endif; ?>

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

  
</script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>