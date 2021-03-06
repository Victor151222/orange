<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>orange</title>

    <!-- Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/orange/Public/Home/css/step.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
      <!--引入echarts文件-->
    <script src="https://cdn.bootcss.com/echarts/3.5.0/echarts.min.js"></script>
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10" style="width:100%;height:400px">
          <!-- 为 ECharts 准备一个具备大小（宽高）的 DOM -->
          <div id="main"></div>
        </div>
        <div class="col-md-1"></div>
      </div>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <!--纸币控制按钮-->
          <a href="#" class="btn btn-primary" id="paper" target="_self" role="button">
            15元
          </a>
          <a href="#" class="btn btn-primary" id="delete" target="_self" role="button">
            测试
          </a>
          <!--<button type="button" class="btn btn-danger" id="paper">start</button>-->
        </div>
        <div class="col-md-1"></div>
      </div>

      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <img src="/orange/Public/Home/images/victor.jpg" class="img-responsive" id="victor" alt="微信支付">
        </div>
      </div>
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.bootcss.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

    <script>
        var ajaxurl = "<?php echo U('Stepline/getpayajax'); ?>";
        var ajaxpaper = "<?php echo U('Stepline/getPaper'); ?>";
    </script>

    <!--引入echarts操作文件-->
    <script src="/orange/Public/Home/js/step.js"></script>

  </body>
</html>