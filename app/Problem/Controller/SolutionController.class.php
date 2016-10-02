<?php
namespace Problem\Controller;
use Think\Controller;
class SolutionController extends Controller {
    #问题列表
    public function index() #ok
    {
        $this->display();
    }
    public function getCode()
    {
        $tmp['user_id']      = session('user_id');
        $tmp['language']    = I('language');
        $tmp['pid']     = I('pid');
        $tmp['contest_id']     = I('contest_id');
        $_tmp['code']    = I('post.code');
        $tmp['code_lenth'] = strlen($_tmp['code']); 
        $data = M('solution');
        $data->add($tmp);
        $sid = $data->where($tmp)->limit(1)->field('id')->select();
        var_dump($sid);
        #根据sid向redis存储代码
        //$str = json_encode($tmp);
        //$this->save($str);//#redis list
    }

}