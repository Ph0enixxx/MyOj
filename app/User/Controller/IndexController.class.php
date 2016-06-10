<?php
namespace User\Controller;
use Think\Controller;
class IndexController extends AuthController {
    public function index(){
        $this->header();
        echo "<br><a href='".U('/Bbs')."'>访问论坛</a>";
    }
    public function header()
    {
		echo "欢迎".session("user");
        echo "<a href=".U('/User/Login/logOut').">登出</a>";
        //$this->display('User/Index/index');
    }
}