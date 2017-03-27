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
            <table style="width: 100%">
               <input type="hidden" name="node_id" value="<?php if($node): echo ($node["id"]); else: ?>0<?php endif; ?>" />
                <tr>
                    <td><label>节点名</label><input type="text" name="name" value="<?php if($node): echo ($node["name"]); endif; ?>"  /></td>
                    <td><label>中文名称</label><input type="text" name="title" value="<?php if($node): echo ($node["title"]); endif; ?>"   /></td>
                </tr>
                <tr>
                    <td><label>排序:</label><input type="text" name="sort" value="<?php if($node): echo ($node["sort"]); endif; ?>" ></td>
                    <td><label>层级</label><input type="text" name="level" value="<?php if($node): echo ($node["level"]); endif; ?>" ></td>
                </tr>
                <tr>
                    <td>
                        <label>图标</label>
                        <input type="text" name="icon" value="<?php if($node): echo ($node["icon"]); endif; ?>"/>
                    </td>

                    <td>
                        <label>状态</label>
                        <select name="status">
                            <option value="1">激活</option>
                            <option value="0" <?php if($node): if(($node["status"]) == "0"): ?>selected<?php endif; endif; ?>>禁用</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>类型</label>
                        <select name="type">
                            <option value="controller" <?php if($node): if(($node["type"]) == "controller"): ?>selected<?php endif; endif; ?>>controller</option>
                            <option value="action" <?php if($node): if(($node["type"]) == "action"): ?>selected<?php endif; endif; ?> >action</option>
                        </select>
                    </td>
                    <td>
                        <label>父级</label>
                        <select name="pid">
                            <option value="0" <?php if($node): if(($node["pid"]) == "0"): ?>selected<?php endif; endif; ?>>顶级</option>
                            <?php if(is_array($p_nodes)): $i = 0; $__LIST__ = $p_nodes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>" <?php if($node): if(($node["pid"]) == $vo['id']): ?>selected<?php endif; endif; ?>><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                </tr>
                <tr><td >
                    <label>菜单栏</label>
                    <select name="is_menu">
                        <option value="0" <?php if($node): if(($node["is_menu"]) == "0"): ?>selected<?php endif; endif; ?>>否</option>
                        <option value="1" <?php if($node): if(($node["is_menu"]) == "1"): ?>selected<?php endif; endif; ?>>是</option>

                    </select>
                </td>
                    <td >
                        <label>公共节点</label>
                        <select name="is_public">
                            <option value="0" <?php if($node): if(($node["is_public"]) == "0"): ?>selected<?php endif; endif; ?>>否</option>
                            <option value="1" <?php if($node): if(($node["is_public"]) == "1"): ?>selected<?php endif; endif; ?>>是</option>
                        </select>
                    </td>
                </tr>
                <tr><td colspan="2" align="center">
                    <br/><p><button id="btn-form" class="btn btn-info btn-radius" style="width: 120px;">提交</button></p>
                </td></tr>
            </table>

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
    //添加节点
    var index= parent.layer.getFrameIndex(window.name);

	$('#btn-form').on('click',function(){
        var id =$("input[name='node_id']").val();
        var name = $("input[name='name']").val();
        var title = $("input[name='title']").val();
        var sort = $("input[name='sort']").val();
        var level = $("input[name='level']").val();
        var status = $("select[name='status']").val();
        var is_menu = $("select[name='is_menu']").val();
        var type = $("select[name='type']").val();
        var pid = $("select[name='pid']").val();
        var icon = $("input[name='icon']").val();
        var is_public = $("select[name='is_public']").val();
        //alert(sort);return;
        //alert(is_menu);alert(is_public);alert(status);alert(type);return;
        if(name == ''|| title == ''|| sort == ''|| level == ''){
            layer.msg('数据不能为空');
            return false;
        }
        var url='/backend/admin/do_edit_node';
        if(id != 0){
            url = '/backend/admin/do_edit_node/node_id/'+id;
        }

        if(isNum(sort)&&isNum(level)){
            $.post(url, {name:name,title:title,sort:sort,icon:icon,level:level,is_menu:is_menu,status:status,type:type,pid:pid,is_public:is_public},
                    function(msg){

                        if(msg.error_code == 0){ //成功
                            layer.msg(msg.des,function(){
                                parent.layer.close(index);
                            });
                        }else{
                            layer.msg(msg.des);
                        }
                    },'json'
            );
        }else{
            layer.msg('排序、层级均为数字');
            return false;
        }



    });

    function isNum(num){
        var reg = /^\d*$/;
        return reg.test(num);
    }
</script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>