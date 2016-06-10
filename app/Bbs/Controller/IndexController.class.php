<?php
namespace Bbs\Controller;
use Think\Controller;
class IndexController extends AuthController {
    public function index(){
       $m = M('topic');
       $tmp = [];
       $tmp['mainid'] = 0;
       $data = $m->field("oj_topic.*,oj_user.name")->join("Left join oj_user on oj_topic.author = oj_user.id")->where($tmp)->order("time desc")->select();

       $this->list = $data;
       //var_dump($data);
       $this->display();
    }
    public function inside($id=1)
    {
    	$m = M('topic');

    	$tmp = [];
    	$tmp['oj_topic.id'] = $id;
      $data = $m->where($tmp)->select();
      //var_dump($data);
    	//$data = $m->where($tmp)->select();
		  
      //
      #显示回复帖子
      $tmp2['mainid'] = $id;
      $data2 = $m->field("oj_topic.*,oj_user.name")->join("Left join oj_user on oj_topic.author = oj_user.id")->where($tmp2)->select();

      //
      $this->inside = 1;
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
    	$tmp['author'] 	= session("id");//I('post.author')?I('post.author'):NULL;
      $tmp['reid'] = I('post.reid')?I('post.reid'):0;

      if(!$tmp['mainid'] && !$tmp['title'])
        $this->error("标题不能为空！",U("Index/index"));
      if(!$tmp['author'])
        $this->error("登陆超时",U("/User/Login/index"));

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