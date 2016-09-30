<?php
namespace Problem\Controller;
use Think\Controller;
class IndexController extends ContestController {
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

}