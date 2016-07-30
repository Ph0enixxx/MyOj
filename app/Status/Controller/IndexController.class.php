<?php
namespace Status\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($page=1){
    	$m = M('solution');
    	//按条件查找 
    	$tmp = [];
    	$tmp['user_id'] = I('get.user_id');
    	$tmp['problem_id'] = I('get.problem_id');
    	$tmp['language'] = I('get.language');
    	$tmp['solution_id'] = I('get.solution_id');
    	//分页！
        $cnt = $m->count();

    	if($tmp['user_id']||$tmp['problem_id']||$tmp['language']||$tmp['solution_id'])
    		$data = $m->where($tmp)->page($page,10)->select();
    	else
    		$data = $m->page($page,10)->select();
        //分页！	
        $this->cnt  = $cnt;
        $this->page = $page;
        $this->data = $data;
        $this->display();
    }
}