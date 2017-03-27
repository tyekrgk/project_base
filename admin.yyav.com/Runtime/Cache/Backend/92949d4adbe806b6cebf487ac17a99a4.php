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
      			<div class="well">
      				<form class="form-horizontal" id="update-admin-form">
      					<input type="hidden" name="id" value="<?php echo ($user["id"]); ?>">
						<label>邮箱</label>
						
						<input type="text" name="email" placeholder="hr@vshare.com" value="<?php echo ($user["email"]); ?>">
						<label>密码</label>
						<input type="password" name="password" placeholder="为空代表密码不作修改">
						<button type="submit" class="btn btn-primary">提交</button>
					</form>
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
         //邮箱
         var emailObj = $('input[name="email"]');
         emailObj.focus(function(){
             if(!$(this).val()){
                 layer.tips('可填写企业邮箱',$(this));
             }
         });


         //检查邮箱
         function checkEmail(email){
            var tag=false;
             if(!email){
                 layer.tips('邮箱不能为空',emailObj);
                 tag = false;
             }
             var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
             if(!pattern.test(email)){
                 layer.tips('邮箱格式错误',emailObj);
                 tag = false;
             }else{
                 //同步验证
                 $.ajax({
                     url:'/backend/admin/check_user_email',
                     data:{email:email},
                     async:false,
                     type:'post',
                     success:function(msg){
                         if(msg.error_code == 1){
                             tag = true;
                         }else{
                             layer.tips('邮箱不存在',emailObj);
                             tag = false;
                         }
                     }
                 });
             }
            return tag;
         }

         var index = parent.layer.getFrameIndex(window.name);
         //表单提交
         $('#update-admin-form').submit(function(){
             var email = emailObj.val();
             var data = $('#update-admin-form').serialize();
             $flag = checkEmail(email);
             if($flag){  //邮箱合法
                 $.post('/backend/admin/do_update_admin',data,function(msg){
                     if(msg.error_code == 0){
                         layer.msg(msg.des,function(){
                             parent.layer.close(index);
                         })
                     }else{
                         layer.msg(msg.des);
                     }
                 },'json');

                return false;
             }else{
                 return false;
             }

         });


     </script>
 
    <!-- 自定义js效果 结束 -->
  </body>
</html>