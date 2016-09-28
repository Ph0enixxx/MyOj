<?php
namespace Problem\Controller;
use Think\Controller;
class ContestController extends Controller {
    public function index()
    {
        #总列表contest表
        $m = M('contest');
        $data = $m->order("start_time desc")->select();
        //var_dump($data);
        $this->data = $data;
        $this->display();
        echo "aaaaaaaa";
    }

    public function inside($cid=0)
    {
    	#一级目录contest_problem表
    	$m = M('contest_problem');
    	$tmp = [];
    	$tmp['contest_id'] = $cid;
        $data = $m->where
        ($tmp)->join('RIGHT JOIN oj_problem on problem_id = oj_problem.id')->select();
        //var_dump($data);
        $this->data = $data;
        $this->display();
    }
    public function view($pid=0)
    {
    	$m = M('problem');
    	$tmp = [];
    	$tmp['id'] = $pid;
        $data = $m->where($tmp)->select();
        //var_dump($data);
        $this->data = $data;
        $this->display();
    	#单个问题probelm表
    }
}