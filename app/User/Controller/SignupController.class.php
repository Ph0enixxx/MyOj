<?php
namespace User\Controller;
use Think\Controller;
class SignupController extends LoginController {

    public function check(){
        session_start();
    	$tmp = [];
    	$tmp['name'] = I('post.username');
    	$tmp['pass'] = md5(I('post.password'));
    	$tmp['mail'] = I('post.email');
    	$m = M('user');
    	if(!$tmp['name']||!$tmp['pass']||!$tmp['mail'])
    		$this->error("不能为空！",U('Signup/Index'));
    	else{
    		$result = $m->add($tmp);
    		if($result){

                $res = LoginController::login($tmp['mail'],$tmp['pass']);
                //var_dump($res);
                //echo "asasd";
    			$this->success("注册成功",U('Index/Index'));
            }
    		else
    			$this->error("注册失败",U('Signup/Index'));


    	}
    }
    
}