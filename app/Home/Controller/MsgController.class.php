<?php
namespace Home\Controller;
use Think\Controller;
class MsgController extends Controller {
    public function index()
    {
    	$msg = M('mymsg');
    	$id['id']  = $_SESSION['id'];
    	$data = $msg->where($id)->select();
    	var_dump($data);
    }
}