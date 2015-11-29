<?php
namespace Home\Controller;
use Think\Controller;
class BbsController extends Controller {
    public function index()
    {
    	#分页
    	$page = (int)I('get.page');
    	#发帖
    	if($page == 0)$page = 1;
    	$list = M('bbslist');
    	$data = $list->order('last desc')->page($page.',10')->select();
        $this->data = $data;
        //var_dump($data); 
        $this->display('index/bbs');
    }
    public function view($id=0)
    {
    	$tmp['id'] = (int)$id;
    	$list = M('bbslist');
    	$data = $list->where($tmp)->select();

    }
}