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
            <li <?php if($P == 1): ?>class="active"<?php endif; ?>><a href="<?php echo U('Home/bbs/index');?>">BBS</a></li>
            <li <?php if($P == 2): ?>class="active"<?php endif; ?>><a href="#about">Status</a></li>
            <li <?php if($P == 3): ?>class="active"<?php endif; ?>><a href="#contact">Contest</a></li>
            <li <?php if($P == 4): ?>class="active"<?php endif; ?>><a href="<?php echo U('Index/Problem');?>">ProblemSet</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php if(empty($_SESSION['nick'])): ?><li><a href="<?php echo U('Login/index');?>">Login</a></li>
          <?php else: ?> 
            <li class="dropdown">
            <a href="<?php echo U('Login');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ((isset($_SESSION["nick"]) && ($_SESSION["nick"] !== ""))?($_SESSION["nick"]):"Login"); ?><span class="caret"></span></a> 
            <ul class="dropdown-menu">
              <li><a href="<?php echo U('User/Index');?>">个人中心</a></li>
              <li><a href="#">修改资料</a></li>
              <li><a href="<?php echo U('Msg/index');?>">私信

              <?php if(!empty($_SESSION['msg'])): ?><span class="badge"><?php echo (session('msg')); ?></span><?php endif; ?>
              </a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo U('login/logout');?>">登出</a></li>
            </ul>
            </li><?php endif; ?> 

<style>
h5
{
  padding-right:15px;
  float: left; 
  color: #AAA;
}
</style>

          


        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <script src="/Public/bootstrap/js/jquery.js"></script>
    <script src="/Public/bootstrap/js/bootstrap.min.js"></script>

  </head>
<body style="padding-top:50px;">
    
<div class="jumbotron" style="text-align:center;background-image:url('/Public/img/head.jpg')">
  <h1 style="color:white;">ProblemSet</h1>
  <form class="form-inline">
  <input type="text" class="form-control"  style="width:360px">
<button type="button" class="btn btn-success">查找</button></form>
</div>
<body>
  <div class="container">
    <table class="table table-striped container">
      <tbody>
          <tr>
             <td>ID</td>
             <td>标题</td>
             <td>来源</td>
             <td>AC</td>
             <td>提交数</td>
          </tr>
      <?php if(is_array($problemList)): foreach($problemList as $key=>$data): ?><tr>
             <td><?php echo ($data["id"]); ?></td>
             <td><?php echo ($data["title"]); ?></td>
             <td><?php echo ($data["source"]); ?></td>
             <td><?php echo ($data["AC"]); ?></td>
             <td><?php echo ($data["submit"]); ?></td>
          </tr><?php endforeach; endif; ?> 
      </tbody> 
    </table>
  </div>
</body>