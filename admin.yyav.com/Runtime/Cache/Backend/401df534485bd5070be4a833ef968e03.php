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
        .operation-one{border: 1px solid#e0e0e0;width:32px;padding:3px;position: relative;left: 32px;top:-22px;background-color: #e0e0e0}
        a.update-status:hover{ font-weight: 600;}
        label{font-size: 15px;font-weight: 600;}
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

                <form class="form-inline" method="get" action="/Backend/Sodo/crawl_list" style="margin-left:20px;margin-top:15px;float:left;" >
                    <label>平台类型:</label>
                    <select name="type" style="margin-left:5px;width:100px;">
                        <option value="" readonly>不选</option>
                        <option <?php if(($_GET['type']) == "ios"): ?>selected<?php endif; ?> value="ios">ios</option>
                        <option <?php if(($_GET['type']) == "android"): ?>selected<?php endif; ?> value="android">android</option>
                        <option <?php if(($_GET['type']) == "wp"): ?>selected<?php endif; ?> value="wp">wp</option>
                    </select>
                    <label>接口返回结果</label>
                    <select name="result" style="margin-left:5px;width:180px;">
                        <option value="" readonly>不选</option>
                        <option <?php if(($_GET['result']) == "ok"): ?>selected<?php endif; ?> value="ok">ok</option>
                        <option <?php if(($_GET['result']) == "Insert app exception"): ?>selected<?php endif; ?> value="Insert app exception">Insert app exception</option>
                        <option <?php if(($_GET['result']) == "Item already in db"): ?>selected<?php endif; ?>  value="Item already in db">Item already in db</option>
                    </select>
                    <input type="submit" value="提交筛选" />
                </form>
                
                <div class="btn-toolbar" style="width:115px;float:left;margin-left:20px;margin-top:15px;">
                    <a id="bt-add-topic" href="javascript:;" class="btn btn-info btn-radius">提交爬取任务</a>
                </div>          
               
				<div class="well">
					<table class="table">
						<tr>
							<th>序号</th>
							<th>ID</th>
							<th>接口地址</th>
							<th>传递方式</th>
							<th>语言类型</th>
							<th>bundleId</th>
							<th>平台类型</th>
							<th>接口返回结果</th>
							<th>添加时间</th>
							<th>操作</th>
						</tr>
						<?php if(is_array($tasks)): $k = 0; $__LIST__ = $tasks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($k % 2 );++$k;?><tr>
							<td><?php echo ($k); ?></td>
							<td><?php echo ($one["id"]); ?></td>
							<td><?php echo ($one["addr"]); ?></td>
							<td>
								<?php if($one["type"] == 0): ?>post
								<?php else: ?>
                                    get<?php endif; ?>
							</td>
							<td><?php echo ($one["lang"]); ?></td>
							<td><?php echo ($one["bundleid"]); ?></td>
							<td><?php echo ($one["platform"]); ?></td>
							<td><?php echo ($one["result"]); ?></td>
                            <td><?php echo (date("Y-m-d",$one["time"])); ?></td>
							<td><a title="删除" href="javascript:;" class="delete-icon" data-id="<?php echo ($one["id"]); ?>"><i class="icon-trash"></i></a></td>

						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table>
					<?php echo ($page); ?>
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
    //创建专题
	$('#bt-add-topic').click(function(){
		layer.open({
			type: 2,
		    skin: 'layui-layer-rim', //加上边框
            offset: '20px',
		    area: ['860px', '420px'], //宽高
		    content: '/backend/Sodo/show_add_crawl',
		    title:'<strong>提交爬取任务</strong>',
		});
	});

    //删除
    $('a.delete-icon').click(function(){
        var id = $(this).data('id');
        layer.confirm('确定删除？',{title:'提示'},function(index){
        	layer.close(index);
            $.post('backend/Sodo/do_del_crawl',{id:id},function(msg){
            	layer.msg(msg.des);
            	if(msg.err_code == 0){
                    $("a[data-id='"+id+"']").parents('tr').remove();
                }
            })
        })
    })
  
</script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>