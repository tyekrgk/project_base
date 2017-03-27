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
        canvas{position:absolute;top:150px;left:700px;}
        .box{
            width: 540px;
            height: 200px;

        }
        .box li{
            position: relative;
            text-align: center;
            list-style-type: none;
            display: inline-block;
            width: 150px;
            height:160px;
            text-shadow:0 2px 1px #f4f4f4;
            border:1px solid #9fa2ad;
            border-radius: 5px;
            margin-right:10px;
            background: -webkit-gradient(linear,0 0, 0 100%,
            color-stop(.2,rgba(248,248,248,.3)),
            color-stop(.5,rgba(168,173,190,.5)),
            color-stop(.51,rgba(168,173,190,.3)),
            color-stop(.9,rgba(248,248,248,.2)));
            background: -webkit-linear-gradient(top,rgba(248,248,248,.3) 20%,rgba(168,173,190,.5) 50%,rgba(168,173,190,.3) 51%, rgba(248,248,248,.2) 90%);
            background: -moz-linear-gradient(top, rgba(248,248,248,.3) 20%,rgba(168,173,190,.5) 50%,rgba(168,173,190,.3) 51%, rgba(248,248,248,.2) 90%);
            background: -o-linear-gradient(top, rgba(248,248,248,.3) 20%, rgba(168,173,190,.5) 50%, rgba(168,173,190,.3) 51%, rgba(248,248,248,.2) 90%);
            background: -ms-linear-gradient(top, rgba(248,248,248,.3) 20%, rgba(168,173,190,.5) 50%, rgba(168,173,190,.3) 51%, rgba(248,248,248,.2) 90%);
            background: linear-gradient(top, rgba(248,248,248,.3) 20%, rgba(168,173,190,.5) 50%, rgba(168,173,190,.3) 51%, rgba(248,248,248,.2) 90%);
            box-shadow:inset 0 -2px 0 #f1f1f1,0 1px 0 #f1f1f1,0 2px 0 #9fa2ad,0 3px 0 #f1f1f1,0 4px 0 #9fa2ad;
        }
        .box li:before,
        .box li:after{
            display: block;
            content: "";
            position: absolute;
            width: 150px;
        }
        .box li:before{
            top:50%;
            height: 1px;
            box-shadow: 0 1px 0 #868995,0 2px 1px #fff;
        }
        .box li:after{
            bottom: -65px;
            height: 60px;
            border-radius:0 0 5px 5px;
            background: -webkit-gradient(linear,0 0,0 100%,from(rgba(0,0,0,.1)),to(rgba(0,0,0,0)));
            background: -webkit-linear-gradient(top,rgba(0,0,0,.1),rgba(0,0,0,0));
            background: -moz-linear-gradient(top,rgba(0,0,0,.1),rgba(0,0,0,0));
            background: -o-linear-gradient(top,rgba(0,0,0,.1),rgba(0,0,0,0));
            background: -ms-linear-gradient(top,rgba(0,0,0,.1),rgba(0,0,0,0));
            background: linear-gradient(top,rgba(0,0,0,.1),rgba(0,0,0,0));
            z-index: 1
        }
        .box li span:first-child{
            font:68px 'BitstreamVeraSansMonoBold';
            color: #52555a;
            display: block;
            height: 130px;
            line-height: 150px;
        }
        @font-face {
            font-family: 'BitstreamVeraSansMonoBold';
            src: url('VeraMono-Bold-webfont.eot');
            src: url('VeraMono-Bold-webfont.eot?#iefix') format('embedded-opentype'),
            url('VeraMono-Bold-webfont.woff') format('woff'),
            url('VeraMono-Bold-webfont.ttf') format('truetype'),
            url('VeraMono-Bold-webfont.svg#BitstreamVeraSansMonoBold') format('svg');
            font-weight: normal;
            font-style: normal;
        }
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
        
    <canvas id="canvas" width="400" height="400"></canvas>
    <canvas id="p_canvas" width="400" height="400"></canvas>
    <div style="width: 90%;height:580px;margin: 40px auto;">

        <h1 style="font-size:60px;color: #62708B">welcome</h1><br/>
        <br/><br/><br/>

        <div class="box">
            <ul>
                <li ><span id="year"></span ><span>Year</span></li>
                <li><span id="month"></span><span>Month</span></li>
                <li><span id="date"></span><span>Date</span></li>
            </ul>
        </div>
    </div>

    <footer class="navbar-fixed-bottom" style="height: 25%;">
        <hr/>
        <div style="width: 90%;height: 100%;margin: 30px auto;">
            @<a href="javascript:;" style="font-size: 14px;">&nbsp;自定义管理后台</a>
        </div>
    </footer>

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
      //获取绘图对象
      var canvas = document.getElementById('canvas');
      var context = canvas.getContext('2d');

      var p_canvas = document.getElementById('p_canvas');
      var p_context = p_canvas.getContext('2d');

      var height=360,width=360;
      //画大圆
      context.beginPath();
      context.strokeStyle="#009999";
      context.arc(width/2,height/2,width/2-1,0,Math.PI*2,true);
      context.stroke();
      context.closePath();
      //画中间点
      context.beginPath();
      context.fillStyle="#000";
      context.arc(width/2,height/2,3,0,Math.PI*2,true);
      context.fill();
      context.closePath();

      //画小刻度
      var angle = 0,radius = width/2 - 4;
      for(var i=0;i<60;i++){
          context.beginPath();
          context.strokeStyle="#000";
        //确认刻度的起始点
          var x = width/2 + radius*Math.cos(angle),y = height/2 + radius*Math.sin(angle);
          context.moveTo(x,y);
        //这里是用来将刻度的另一点指向中心点，并给予正确的角度
        //PI是180度，正确的角度就是 angle+180度，正好相反方向
          var temp_angle = Math.PI +angle;
          context.lineTo(x +3*Math.cos(temp_angle),y+3*Math.sin(temp_angle));
          context.stroke();
          context.closePath();
          angle+=6/180*Math.PI;
      }
      //大刻度
      angle = 0,radius = width/2 - 4;
      context.textBaseline = 'middle';
      context.textAlign = 'center';
      context.lineWidth = 10;
      for(var i=0;i<12;i++){
          var num = i+3>12? i+3-12:i+3 ;
          context.beginPath();
          context.strokeStyle="#FFD700";
          var x = width/2 + radius*Math.cos(angle),y = height/2 + radius*Math.sin(angle);
          context.moveTo(x,y);
          var temp_angle = Math.PI +angle;
          context.lineTo(x +8*Math.cos(temp_angle),y+8*Math.sin(temp_angle));
          context.stroke();
          context.closePath();
        //大刻度 文字
          context.fillText(num,x+16*Math.cos(temp_angle),y+16*Math.sin(temp_angle));
          angle+=30/180*Math.PI;
      }

      function Pointer(){
          var p_type = [['#000',130,1],['#ccc',110,2],['red',90,3]];
          function drwePointer(type,angle){
              type = p_type[type];
              angle = angle*Math.PI*2 - 90/180*Math.PI;
              var length= type[1];
              p_context.beginPath();
              p_context.lineWidth = type[2];
              p_context.strokeStyle = type[0];
              p_context.moveTo(width/2,height/2);
              p_context.lineTo(width/2 + length*Math.cos(angle),height/2 + length*Math.sin(angle));
              p_context.stroke();
              p_context.closePath();

          }
          setInterval(function (){
              p_context.clearRect(0,0,height,width);
              var time = new Date();
              var h = time.getHours();
              var m = time.getMinutes();
              var s = time.getSeconds();
              h = h>12?h-12:h;
              h = h+m/60;
              h=h/12;
              m=m/60;
              s=s/60;
              drwePointer(0,s);
              drwePointer(1,m);
              drwePointer(2,h);
          },500);
      }
      var p = new Pointer();

      var year=document.getElementById('year');
      var month=document.getElementById('month');
      var date=document.getElementById('date');
      function showTime(){
          var oDate=new Date();
          var iYear=oDate.getFullYear();
          var iMonth=oDate.getMonth()+1;
          var iDate=oDate.getDate();
          year.innerHTML= iYear;
          month.innerHTML= iMonth;
          date.innerHTML= iDate;
      }
      showTime();
  </script>

    <!-- 自定义js效果 结束 -->
  </body>
</html>