<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index($id=0)
    {

        $this->display("Index/login");
    }
    public function login()
    {
    	
    	if(is_null(I('get.username'))||is_null(I('get.password')))
    	{
    		echo "<script language='javascript'>\n";
			echo "alert('UserName or Password Wrong!');\n";
			echo "history.go(-1);\n";
			echo "</script>";
    	}
    	$auth = M('user');
    	$tmp['username'] = I('post.username');
    	$tmp['password'] = I('post.password');
    	$data = $auth->where($tmp)->limit(1)->select();
    	#var_dump($tmp);
    	if(is_null($data[0]))
    	{
    		echo "<script language='javascript'>\n";
			echo "alert('UserName or Password Wrong!');\n";
			echo "history.go(-1);\n";
			echo "</script>";
    	}
    	else
    	{
    		$_SESSION['username'] = $tmp['username'];
    		$_SESSION['nick'] = $data[0]['nick'];
    		echo "<script language='javascript'>\n";
			echo "alert('Login success!');\n";
			echo "location.href='".U('Login/index')."'\n";
			echo "</script>";
    	}	
    }
    public function logout()
    {
    	$_SESSION = NULL;

    	session_destroy();
    	echo "<script language='javascript'>\n";
		echo "alert('Logout success!');\n";
		echo "location.href='".U('Login/index')."'\n";
		echo "</script>";
    	# code...
    }
}