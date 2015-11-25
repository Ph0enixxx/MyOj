<?php
namespace Home\Controller;
use Think\Controller;
class MsgController extends Controller {
    public function index()
    {
    	$msg = M('mymsg');
    	$id['id']  = $_SESSION['id'];
    	$id['read'] = 0;
    	$data = $msg->where($id)->select();
    	foreach ($data as $value) 
    	{
    		$value['read'] = 1;
    		$msg->save($value);
    	}

    	$this->data = $data;//私信内容
    	$_SESSION['msg'] = MsgController::getUnRead();
    	$this->userInf = UserController::getInf();
    	$this->display('Index/msg');
    	#分别显示已读未读
    }
    public function old()
    {
    	$msg = M('mymsg');
    	$id['id']  = $_SESSION['id'];
    	$data = $msg->where($id)->select();
    	$this->data = $data;//私信内容
    	$_SESSION['msg'] = 0;
    	$this->old = 1;
    	$this->userInf = UserController::getInf();
    	$this->display('Index/msg');
    }
    public static function getUnRead()
    {
    	$msg = M('mymsg');
    	$id['id']  = $_SESSION['id'];
    	$id['read'] = 0;
    	$data = $msg->where($id)->select();
    	return count($data);
    	# code...
    }
    public function sendmsg($value='')
    {
    	$this->display('Index/sendmsg');
    	# code...
    }
}