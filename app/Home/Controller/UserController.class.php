<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index()
    {
    	$tmp['username'] = $_SESSION['username'];
    	$data = M('user');
    	$userInf = $data->where($tmp)->limit(1)->select();
    	$userInf = $userInf[0];
    	if(is_null($userInf))
    		header("location: ".U('Login/index'));
    	//var_dump($userInf);
    	$this->userInf = $userInf;
    	$this->display('Index/user');
    }

}