<?php if (!defined('THINK_PATH')) exit();?>登陆<br><form method="post" action="<?php echo U('Login/check');?>">
邮箱：<input name="mail"/><br>
密码：<input name="password" type="password"/>
<input type="submit"/><a href="<?php echo U('Signup/index');?>">没有账号？点击注册</a>
</form>