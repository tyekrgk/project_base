<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>自定义管理后台</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="vshare jeffwang">
    <link rel="stylesheet" type="text/css" href="/Static/admintheme/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/Static/admintheme/stylesheets/theme.css">
    <link rel="stylesheet" href="/Static/admintheme/lib/font-awesome/css/font-awesome.css">
    <script src="/Static/admintheme/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
    
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

        .sidebar-nav {
            overflow-y: scroll;
        }
        
        .content {
            max-height:200;
        }
    </style>

    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
  <body class="">
    <!-- 顶部导航开始 -->
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <li><a href="javascript:;" class="hidden-phone visible-tablet visible-desktop" id="diy-set" role="button">设置</a></li>
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo ($login_user["nic_name"]); ?>
                            <i class="icon-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="/index.php?m=backend&c=main&a=mycount" target="iframepage"><i class="icon-book"></i>我的账户</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="/index.php?m=backend&c=passport&a=logout"><i class="icon-off"></i>登出</a></li>
                        </ul>
                    </li>
                </ul>
                <a class="brand" href="/index.php?m=backend&c=main"> <span class="second">自定义管理后台</span></a>
                <a class="brand" href="javascript:;"><span id="time-show" class="second"></span></a>
        </div>
    </div>
    <!-- 顶部导航结束 -->


    <!-- 左侧菜单开始 -->
    <div class="sidebar-nav">

        <?php if(is_array($menu)): $k = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($k % 2 );++$k;?><a href="#public<?php echo ($one["id"]); ?>" class="nav-header collapsed" data-toggle="collapse">&nbsp;&nbsp;<i class="<?php echo ($one["icon"]); ?>"></i>&nbsp;<?php echo ($one["title"]); ?><i class="icon-chevron-up"></i></a>
            <ul id="public<?php echo ($one["id"]); ?>" class="nav nav-list collapse <?php if(($k) == "1"): ?>in<?php endif; ?> ">
                <?php if(is_array($one["child"])): $i = 0; $__LIST__ = $one["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?><li style="background:white;" class="left-menu"><a href="/index.php?m=backend&c=<?php echo ($one["name"]); ?>&a=<?php echo ($o["name"]); ?>" target="iframepage">&nbsp;&nbsp;<i class="<?php echo ($o["icon"]); ?>"></i>&nbsp;<?php echo ($o["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul><?php endforeach; endif; else: echo "" ;endif; ?> 
    </div>
    <!-- 左侧菜单结束 -->

    <!-- 内容开始 -->
    <div class="content">
        <iframe src="/index.php?m=backend&c=main&a=welcome" id="iframepage" name="iframepage" frameBorder=0 scrolling=yes width="100%" ></iframe>
    </div>
    <!-- 内容结束 -->


    <script src="/Static/admintheme/lib/bootstrap/js/bootstrap.js"></script>
    <script src="/Static/js/layer/layer.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {

            //初始窗口
            setWindow();
            
            $(window).resize(function(){
                setWindow();
            });

            function setWindow(){
                //获取屏幕高度
                var height = $(window).height();
                height = height - $('.navbar').height();
                $('.content').css('minHeight',height);
                $('#iframepage').css('height',height-5);
            }

            //自定义设置
            $('#diy-set').click(function(){
                layer.open({
                type: 2,
                skin: 'layui-layer-rim', //加上边框
                area: ['620px', '440px'], //宽高
                content: "<?php echo U('Admin/diy_menu_show');?>",
                title:'左侧菜单显示定制'
            });
            });

            //给当前选项添加active
            var leftLi = $('li.left-menu');
            leftLi.click(function(){
                leftLi.removeClass('active');
                $(this).addClass('active');
            });

            var side = $('.sidebar-nav');

            //左侧侧边滚动条
            function sideScrollChange(){
                console.log('正在改变...');
                var sideHeight = side.height();
                var windowHeight = $(window).height()-$('.navbar').height();

                console.log(sideHeight+'---'+windowHeight);

                if(sideHeight >= windowHeight){
                    side.css({
                        'overflowY':'scroll',
                        'height':windowHeight,
                    });
                }else{
                    side.css({
                        // 'overflowY':'visible',
                        'height':'auto',
                    });


                    if($(window).width >= 728){
                        side.css({
                            'width':'240px',
                        });
                    }
                }
            }

            //侧边单击高度改变时
            $('.collapsed').click(function(e){
                sideScrollChange();
            });

            //窗口高度改变时
            $(window).resize(function(){
                sideScrollChange();
            });

            side.css({
                height:$(window).height() - $('.navbar').height() + 1,
            });
        });
    </script>
    
  </body>
</html>