<?php
#验证登陆！！！
#美化界面 ok
#测试功能 ok
#默认格式！ok
#user -> user_id
#admin administrator
namespace Quiz\Controller;
use Think\Controller;
class AdminController extends Authw2Controller {
    public function index()
    { 
        $data = M('quiz_log')->order('time desc')->select();
        $this->data = $data;
        $data = M('quiz_problem')->field('content,answer,id')->select();
        $this->data_p = $data;
        $data = M('quiz_answered')->select();
        $this->data_r = $data;
        $data = M('quiz_msg')->select();
        $this->data_c = $data;
        #var_dump($data);
        $this->display();
    }
    public function unlock($id)
    {
        if($this->_lock($id,0))
            $this->success("解锁成功",U('Admin/index'));
        else
            $this->error("解锁失败",U('Admin/index'));
    }
    public function lock($id)
    {
        if($this->_lock($id,1))
            $this->success("加锁成功",U('Admin/index'));
        else
            $this->error("加锁失败",U('Admin/index'));
    }
    private function _lock($id,$state = 0)
    {
        $tmp['id'] = $id;
        $_tmp['locked'] = $state;
        if(M('quiz_msg')->where($tmp)->save($_tmp))
            return true;
        return false;
    }
    public function addQuiz()
    {
        $m = M('quiz');
        $tmp['quiz'] = I('post.quiz_id');
        $tmp['problem_id'] = I('post.problem_id');
        $m->add($tmp);
        $this->success("添加成功",U('Admin/index'));

    }
    public function addContest()
    {
        $m = M('quiz_msg');
        $tmp['title'] = I('post.title');
        $m->add($tmp);
        $this->success("添加成功",U('Admin/index'));
    }
    public function addProblem()
    {
        $m = M('quiz_problem');
        $tmp['content'] = I('post.content');
        $tmp['answer']  = I('post.answer');
        $tmp['format']  = $_POST['format']?$_POST['format']:NULL;
        $tmp['rank']  = $_POST['rank'];

        $m->add($tmp);
        $this->success("添加成功",U('Admin/index'));
    }
    static public function readConf($key)
    {
        //$this->readConf("showproblem");
        $tmp['key'] = $key;
        $data = M('quiz_conf')->where($tmp)->select();
        return (int)($data[0]['value']);
    }
    public function visiable()
    {
        $tmp['key']   = "showproblem";
        $tmp_['value'] = I('post.is');
        if(M('quiz_conf')->where($tmp)->save($tmp_))
        {
            $this->success("更改成功",U('Admin/index'));
        }
        else
        {
            $this->error("更改失败",U('Admin/index'));
        }
    }
}