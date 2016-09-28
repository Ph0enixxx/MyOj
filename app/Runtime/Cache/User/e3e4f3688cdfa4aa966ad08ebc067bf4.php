<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Login Page</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="stylesheet" href="/oj2/Public/Bbs/index/amazeui.css"/>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
  </style>
</head>
<body>
<div class="header">
  <div class="am-g">
    <h1>邵英帅帅的BBS</h1>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h3>登录</h3>
    <hr>

    <br>

    <form action="<?php echo U('Login/check');?>" method="post" class="am-form">
      <label for="email">邮箱:</label>
      <input type="email" name="mail" id="email" value="">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="password" id="password" value="">
      <br>
       <label for="password">验证:</label>
      <input type="text" name="verify" style="width:%20;!">
      <img src="<?php echo U('Login/verify');?>" height="30px" width="100px" />

      <br />
      <div class="am-cf">
        <input type="submit" name="" value="登 录" class="am-btn am-btn-success am-btn-sm am-fl">
        <a href="<?php echo U('Signup/index');?>" class="am-btn am-btn-default am-btn-sm am-fr">没有账号？点击注册</a>
      </div>
    </form>
    <hr>

  </div>
</div>
</body>
</html>