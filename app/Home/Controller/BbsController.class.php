<?php
namespace Home\Controller;
use Think\Controller;
class BbsController extends Controller {
    public function index()
    {
    	#分页
    	$page = (int)I('get.page');
    	#发帖
    	$this->P = 1;
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
    	$this->msg = $data[0];
    	$this->P = 1;
    	
    	$comment = M('bbsmsg');
    	$res = $comment->where($tmp)->select();
    	
    	$user = M('user');
    	$users = [];
    	$count = 0;
    	foreach ($res as $key) 
    	{
       		$tmp['id'] = $key['id'];
       		$userImg = $user->where($tmp)->limit(1)->select();
       		$users[$count]['nick'] = $userImg[0]['nick'];
       		$users[$count++]['img'] = $userImg[0]['img'];
       	}
       	//var_dump($res);
       	$this->users = $users;
       	$this->count = 0;
    	$this->res = $res;
    	$this->display('index/view');
    	//数组来承载名字

    }
    public function writeB()
    {
        if(!$_SESSON['id'])
            return;
        
    }
    public function write($value='')
    {
        $this->display('index/write');
    }
    public function writeComment()
    {
        $this->display('index/writeComment');
    }
    public function writeCommentB()
    {
        if(!$_SESSON['id'])
            return;
    }
}