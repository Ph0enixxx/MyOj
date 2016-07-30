<?php
#验证登陆！！！
#美化界面 ok
#测试功能 ok
#默认格式！ok
#user -> user_id
#admin administrator
namespace Quiz\Controller;
use Think\Controller;
class Authw2Controller extends AuthController {
    public function __construct()
    {
      Controller::__construct();
      session("administrator",1);
      if(!session("administrator"))
        $this->jump();
    }
}