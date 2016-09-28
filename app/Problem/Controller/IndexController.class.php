<?php
namespace Problem\Controller;
use Think\Controller;
class IndexController extends Controller {
    #问题列表
    public function index() #ok
    {
        #总列表contest表
        $m = M('problem');
        $data = $m->order("id")->select();
        var_dump($data);
        $this->data = $data;
        $this->display();
    }
    public function view($pid=0)
    {
    	$m = M('problem');
    	$tmp = [];
    	$tmp['id'] = $pid;
        $data = $m->where($tmp)->select();
//        var_dump($data);
        $this->data = $data;
        $this->display();
    	#单个问题probelm表
    }
}