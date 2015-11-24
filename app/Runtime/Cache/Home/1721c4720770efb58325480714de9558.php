<?php if (!defined('THINK_PATH')) exit();?><html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>YanTai University coding OnlineJudge</title>
    <!-- Bootstrap core CSS -->
    <link href="/Public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/oj">YTU OnlineJudge</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php if($P == 1): ?>class="active"<?php endif; ?>><a href="/oj">Home</a></li>
            <li <?php if($P == 2): ?>class="active"<?php endif; ?>><a href="#about">BBS</a></li>
            <li <?php if($P == 3): ?>class="active"<?php endif; ?>><a href="#contact">Contest</a></li>
            <li <?php if($P == 4): ?>class="active"<?php endif; ?>><a href="<?php echo U('Index/Problem');?>">ProblemSet</a></li>
            <li <?php if($P == 5): ?>class="active"<?php endif; ?>>
              <a href="<?php echo U('Login');?>"><?php echo ((isset($_SESSION["name"]) && ($_SESSION["name"] !== ""))?($_SESSION["name"]):"Login"); ?></a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

  </head>
<body style="padding-top:50px;">
    
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">OnlineJudge</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="./">首页</a></li>
                  <li><a href="javascript:window.alert('敬请期待')">新特性</a></li>
                  <li><a href="#">联系我们</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Martin Fowler：“任何傻瓜都能写出计算机可以理解的代码。好的程序员能写出人能读懂的代码” </h1>
            <p class="lead">听说，帅的人都在用OJ做题。</p>
            <p class="lead">
              <a href="<?php echo U('/Home/login');?>" class="btn btn-lg btn-default">进入OJ!</a>
            </p>
          </div>

          

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 
  

</body></html>