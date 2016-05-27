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
    	$tmp['judge_time'] = I('get.judge_time');
    	//分页！
    	//var_dump($tmp);
    	if($tmp['user_id']||$tmp['problem_id']||$tmp['language']||$tmp['judge_time'])
    		$data = $m->where($tmp)->page($page,10)->select();
    	else
    		$data = $m->page($page,10)->select();
    	var_dump($data);
    }
}