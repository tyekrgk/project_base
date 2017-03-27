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
	.role-style{padding: 5px;overflow: auto;}
	.top-role-style{font-weight: 700;color:black;font-size: 16px;width:300px;}
	.one-child{float: left;margin-left: 10px;}
	.role{border: 1px solid #ccc;overflow: auto;padding: 3px;}
    .user-style{font-weight: 700;font-size: 20px;color: #003bb3;}
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
        
	<div class="well">
		<form class="form-horizontal" id="user-role-form">
			<label><span class="user-style"><?php echo ($user_nic_name); ?></span>的角色：</label>
            <input type="hidden" name="user_id" value="<?php echo ($user_id); ?>">
			<div class="role">
			<span><input type="checkbox" id="select-all">所有</span>
			<?php if(is_array($roles)): $i = 0; $__LIST__ = $roles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($i % 2 );++$i;?><div class="role-style">
				<div class="checkbox top-role-style"><label>
                    <input data-id="<?php echo ($one["id"]); ?>" name="role_ids[]" value="<?php echo ($one["id"]); ?>" type="checkbox" <?php if(in_array($one['id'],$role_ids)): ?>checked<?php endif; ?>><?php echo ($one["role_name"]); ?>
                </label></div>

				<div class="child-role-style">
					<?php if(is_array($one["child_group"])): $i = 0; $__LIST__ = $one["child_group"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?><div class="checkbox one-child"><label>
                            <input name="role_ids[]" value="<?php echo ($o["id"]); ?>" type="checkbox" <?php if(in_array($o['id'],$role_ids)): ?>checked<?php endif; ?>><?php echo ($o["role_name"]); ?>
                        </label></div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			<div style="clear:both;"></div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
            <br/>
            <div style="text-align: center">
			    <button  type="submit" class="btn btn-info btn-radius" style="width: 120px;">保存</button>
            <div>
		</form>
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
    var index = parent.layer.getFrameIndex(window.name);
    $('#user-role-form').submit(function () {
        var data = $('#user-role-form').serialize();
        $.post('/backend/admin/do_user_role',data, function(msg){
            if(msg.error_code == 0){
                //成功
                layer.msg(msg.des,function(){
                    parent.layer.close(index);
                });
            }else{
                layer.msg(msg.des);
            }
        },'json');
        return false;
    });
	//选中所有
	$('#select-all').click(function(){
		if($(this).attr('checked')=='checked'){
			$('input[name="role_ids[]"]').attr('checked','checked');
		}else{
			$('input[name="role_ids[]"]').removeAttr('checked');
		}
	});

	//点击顶级
	$('.top-role-style').find('input[name="role_ids[]"]').click(function(){
		var child = $(this).parents('.role-style').find('.child-role-style').find('input[name="role_ids[]"]');
		if($(this).attr('checked') == 'checked'){
			child.attr('checked','checked');
			//判断全局是否都选中
			checkAllIsChecked();
		}else{
			child.removeAttr('checked');
			//移除全局选中
			$('#select-all').removeAttr('checked');
		}
	});

	//点击二级角色
	$('.child-role-style').find('input[name="role_ids[]"]').click(function(){
		var parentSelectAll = $(this).parents('.role-style').find('.top-role-style').find('input[name="role_ids[]"]');

        if($(this).attr('checked') == 'checked'){
            //检查所在二级列表是否全选中
            var listCheckedLength = $(this).parents('.child-role-style').find('input').length;
            var listSelectedCheckdedLength = $(this).parents('.child-role-style').find('input:checked').length;
            if(listCheckedLength == listSelectedCheckdedLength){
                parentSelectAll.attr('checked','checked');
                //判断全局是否都选中
                checkAllIsChecked();
            }
        }else{
            //移除上级所有选中
            parentSelectAll.removeAttr('checked');
            //移除全局选中
            $('#select-all').removeAttr('checked');
        }



	});
	//判断全局是否选中
	function checkAllIsChecked(){
		var allCheckedLength = $('input[name="role_ids[]"]').length;
		var allSelectCheckedLength = $('input[name="role_ids[]"]:checked').length;

		if(allCheckedLength == allSelectCheckedLength){
			$("#select-all").attr('checked','checked');
		}else{
			$('#select-all').removeAttr('checked');
		}
	}
</script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>