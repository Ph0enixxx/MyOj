<?php
namespace User\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }
    static public function isNew($id=0)
    {
    	# code...
    }
    public function list()
    {
        $this->display();
    }
    public function send()
    {
    	$tmp = [];
    	$tmp['from'] = session('id');
    	$tmp['to']   = I('post.to');
    	$tmp['content'] = I('post.content');
    }
}