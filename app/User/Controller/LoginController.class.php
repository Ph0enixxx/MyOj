<?php
namespace User\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	//echo session("user");
        //$Verify = new \Think\Verify();
        //$Verify->entry(1);
        $this->display();
    }
    public function verify()
    {
        $Verify = new \Think\Verify();
        $Verify->entry(1);
        //return session('verify_code');
    }
    public function check()
    {
        if(!((new \Think\Verify())->check(I('post.verify'),1)))
        {
            //var_dump(session('verify_code'));
            $this->error("Verify failed!",U("Login/index"));
        }
        $result = $this->login(I("post.mail"),md5(I("post.password")));
        if($result)
        {
            //var_dump($data);
            $this->success("Login success!",U("Bbs/Index/index"),3);
        }
        else
        {
            $this->error("Login failed!",U("Login/index"),3);
        }
    }
    public function login($mail,$pass)
    {
        session('[start]');
        $tmp['mail'] = $mail;
        $tmp['pass'] = $pass;
        $m = M("user");
        $data = $m->where($tmp)->select();
        if($data)
        {
            #var_dump($data);
            #var_dump($data[0]['name']);
            session("id",$data[0]['id']);
            session("user",$data[0]['name']);
            #echo "成功";
            #var_dump(session("user"));
            return true;
        }
        else
        {
            #echo "失败";
            return false;
        }
    }
    public function logOut()
    {
    	if(session_destroy())
    		$this->success("Logout success!",U("Login/index"),3);
    	else
    		$this->error("Logout failed!",U("Login/index"),3);

    }
    public function test($p='')
    {
    	echo "password is: ".md5($p);
    }
    
}