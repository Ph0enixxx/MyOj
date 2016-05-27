<?php
namespace Bbs\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       $m = M('topic');
       $tmp = [];
       $tmp['mainid'] = 0;
       $data = $m->where($tmp)->select();
       $this->list = $data;
       $this->display();
    }
    public function inside($id=1)
    {
    	$m = M('topic');

    	$tmp = [];
    	$tmp['id'] = $id;
    	$data = $m->where($tmp)->select();
		  
      //
      #显示回复帖子
      $tmp2['mainid'] = $id;
      $data2 = $m->where($tmp2)->select();

      //

      $this->list = $data;
      $this->list2 = $data2;
      $this->mainId = $id;
      $this->display();
    }
    public function add()//ok
    {
    	$m = M('topic');

    	$tmp = [];
    	$tmp['title'] 	= I('post.title')?I('post.title'):NULL;
    	$tmp['content'] = I('post.content')?I('post.content'):NULL;
    	$tmp['mainid'] 	= I('post.mainid')?I('post.mainid'):0;
    	$tmp['author'] 	= I('post.author')?I('post.author'):NULL;

      if($tmp['mainid'] == 0)
        $url = U('Index/index');
    	else
        $url = U('Index/inside')."?id=".$tmp['mainid'];
      $result = $m->add($tmp);

      if($result)
        $this->success("发布成功",$url);
      else 
        $this->success("发布失败",$url);

    }
}