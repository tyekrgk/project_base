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
		.well{overflow: auto;}
    	.well a{margin-left: 10px;margin-top: 5px;float: left;display: block;width:150px;height: 150px;}
    	.well a img{width:100px;height: 100px;float: left;}
    	.well a span{float: left;}
    	.well .ringtone{float: left;width: 110px;height: 110px;margin-left: 5px;margin-top: 5px;}
    	.well .ringtone img{height: 100px;width: 100px;}
    	.well .ringtonetop {float: left;margin-left: 5px;margin-top: 5px;width:200px;height: 200px;}
    	.well .ringtonetop img{height: 100px;width: 100px;}

    	.well .wallpaper {width: 150px;height: 300px;float: left;margin-left: 3px;margin-top: 3px;}
    	.well .wallpaper img {width: 150px;height: 300px;}
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
					<a class="btn btn-info refresh-static-data" id="androidtoptopic">更新Android顶部专题</a>
					<a class="btn btn-info refresh-static-data" id="androidad">更新Android广告</a>
					<a class="btn btn-info refresh-static-data" id="iostoptopic">更新iOS顶部专题</a>
					<a class="btn btn-info refresh-static-data" id="iosad">更新iOS广告</a>
					<a class="btn btn-info refresh-static-data" id="ringtonetopic">更新ringtone专题</a>
					<a class="btn btn-info refresh-static-data" id="ringtonetop">更新ringtone排行榜</a>
					<a class="btn btn-info refresh-static-data" id="wallpapertop">更新wallpaper排行榜</a>
					<a class="btn btn-info refresh-static-data" id="newgamestopic">更新最新游戏专题</a>
					<br />
					<br />
					<form action="/backend/www/static_data" class="form-inline" method="get">
						内容：
						<select name="data" id="">
							<option <?php if(($_GET['data']) == "androidtoptopic"): ?>selected<?php endif; ?> value="androidtoptopic">Android顶部专题</option>
							<option <?php if(($_GET['data']) == "androidtopic"): ?>selected<?php endif; ?> value="androidtopic">Android专题列表</option>
							<option <?php if(($_GET['data']) == "androidad"): ?>selected<?php endif; ?> value="androidad">Android广告</option>
							<option <?php if(($_GET['data']) == "iostoptopic"): ?>selected<?php endif; ?> value="iostoptopic">iOS顶部专题</option>
							<option <?php if(($_GET['data']) == "iostopic"): ?>selected<?php endif; ?> value="iostopic">iOS专题列表</option>
							<option <?php if(($_GET['data']) == "iosad"): ?>selected<?php endif; ?> value="iosad">iOS广告</option>
							<option <?php if(($_GET['data']) == "ringtonetopic"): ?>selected<?php endif; ?> value="ringtonetopic">ringtone专题</option>
							<option <?php if(($_GET['data']) == "ringtonetop"): ?>selected<?php endif; ?> value="ringtonetop">ringtone排行榜</option>
							<option <?php if(($_GET['data']) == "wallpapertop"): ?>selected<?php endif; ?> value="wallpapertop">wallpaper排行榜</option>
							<option <?php if(($_GET['data']) == "newgamestopic"): ?>selected<?php endif; ?> value="newgamestopic">wap版最新游戏专题</option>
						</select>

						&nbsp;&nbsp;<button class="btn btn-default btn-radius">预览</button>
					</form>
					
				</div>
				<div class="well">
	            	<?php echo ($str); ?>
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
	$('.refresh-static-data').click(function(){
		var id = $(this).attr('id');
		$.post('/backend/www/write_static_data',{id:id},function(msg){
			alert(msg.des);
		},'json');
	});
	</script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>