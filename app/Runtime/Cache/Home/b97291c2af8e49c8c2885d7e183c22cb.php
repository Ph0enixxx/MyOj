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
    
<body>
<div class="panel panel-default container" style="width:80%;margin-top:10px;">
<?php if(is_array($data)): foreach($data as $key=>$msg): ?><div class="panel-body" onclick="location.href='<?php echo U('/Home/bbs/view');?>?id=<?php echo ($msg["id"]); ?>'">
  	<h3><?php echo ($msg["title"]); ?></h3><br>
  	<p><?php echo (substr($msg["content"],0,100)); ?>...</p>
  	<h5>作者:<?php echo ($msg["admin"]); ?></h5><h5>最后回复:<?php echo ($msg["admin"]); ?></h5><h5>发帖时间:<?php echo ($msg["last"]); ?></h5><h5>回复数:<?php echo ($msg["re"]); ?></h5>
  </div><?php endforeach; endif; ?>

</div>	
<div class="panel panel-default container" style="width:80%;margin-top:10px;">
<br>
    <div class="input-group">
      <input type="text" class="form-control" placeholder="title" aria-describedby="basic-addon1" name="title">
      <input type="text" class="form-control" placeholder="收件人ID" aria-describedby="basic-addon1" name="to">
    </div><br>
    <textarea name="content" class="form-control" style="width:50%;height:50%" placeholder="内容"></textarea><br>
    <button type="submit" class="btn btn-warning">Submit</button>
</div>