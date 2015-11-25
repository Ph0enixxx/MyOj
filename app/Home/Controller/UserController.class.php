<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index()
    {
    	$this->userInf = UserController::getInf();
    	$this->display('Index/user');
    }
    public static function getInf()
    {
        $tmp['username'] = $_SESSION['username'];
        $data = M('user');
        $userInf = $data->where($tmp)->limit(1)->select();
        $userInf = $userInf[0];
        if(is_null($userInf))
            header("location: ".U('Login/index'));
        return $userInf;
        # code...
    }

}