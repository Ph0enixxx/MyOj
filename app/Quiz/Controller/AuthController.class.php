<?php
#验证登陆！！！
#美化界面 ok
#测试功能 ok
#默认格式！ok
#界面
#嵌入contest
#选择题模板！
#用户文档
#看题的开关！
#提交一道
#尽快
#user -> user_id
#admin administrator
namespace Quiz\Controller;
use Think\Controller;
class AuthController extends Controller {
    public function __construct()
    {
      Controller::__construct();
      session("user_id",123);
      session("user",session("user_id"));
      Controller::__construct();
      if(!session("user"))
        $this->jump();
    }
    public function jump($url='')
    {
        echo "请先登录<script>location.href='/'</script>";
      return ;
    }
}