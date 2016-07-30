<?php
namespace User\Controller;
use Think\Controller;
class SignupController extends LoginController {

    public function check(){
        session_start();

        if(!((new \Think\Verify())->check(I('post.verify'),1)))
        {
            //var_dump(session('verify_code'));
            $this->error("Verify failed!",U("Login/index"));
        }
        #查重！！！
    	$tmp['mail'] = I('post.email');
        if($this->isExist($tmp,"user"))
        {
            $this->error("邮箱已被注册",U('Signup/index'));
            exit(1);
        }
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$tmp['mail'])) {
            $this->error("无效的 email 格式！",U('Signup/index'));
            exit(1);
        }
        $tmp['name'] = I('post.username');
        $tmp2['name']= I('post.username');
        if($this->isExist($tmp2,"user"))
        {
            $this->error("用户名已被注册",U('Signup/index'));
            exit(1);

        }

    	$tmp['pass'] = md5(I('post.password'));
    	$m = M('user');




    	if(!$tmp['name']||!$tmp['pass']||!$tmp['mail'])
    		$this->error("不能为空！",U('Signup/index'));
    	else{
    		$result = $m->add($tmp);
    		if($result){

                $res = LoginController::login($tmp['mail'],$tmp['pass']);
                //var_dump($res);
                //echo "asasd";
    			$this->success("注册成功",U('/Bbs/Index/Index'));
            }
    		else
    			$this->error("注册失败",U('Signup/Index'));

    	}
        
    }
    public function isExist($condition,$db)
    {
        if(M($db)->where($condition)->select())
            return true;
        else
            return false;
    }
    
}