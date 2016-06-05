<?php
namespace Problem\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index()
    {
        #总列表contest表
        $m = M('contest');
        $data = $m->order("start_time desc")->select();
        var_dump($data);
        $this->data = $data;
        $this->display();
    }
    public function inside($cid=0)
    {
    	#一级目录contest_problem表
    	$m = M('contest_problem');
    	$tmp = [];
    	$tmp['contest_id'] = $cid;
        $data = $m->field('problem_id')->select();
        var_dump($data);
        $this->data = $data;
        $this->display();
    }
    public function view($pid='')
    {
    	$m = M('problem');
        $data = $m->select();
        var_dump($data);
        $this->data = $data;
        $this->display();
    	#单个问题probelm表
    }
}