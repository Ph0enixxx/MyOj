<?php if (!defined('THINK_PATH')) exit();?>注册<br><form method="post" action="<?php echo U('Signup/check');?>">
邮箱：<input name="email"/><br>
昵称：<input name="username"/><br>
密码：<input name="password" type="password"/>
<input type="submit"/><a href="<?php echo U('Login/index');?>">已有账号？点击登陆</a>
</form>