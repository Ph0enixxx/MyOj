<?php
namespace Quiz\Controller;
use Think\Controller;
class IndexController extends AuthController {
    public function index()
    {
        $m = M('quiz_msg');
        $list = $m->select();
        $this->data = $list;
        #试卷锁
        $this->display();
    }
    public function inside($id = 0)
    {
        #如何处理表单？ 将answer替换为answer+题号！！
        $m = M('quiz_msg');
        $tmp['id'] = $id;
        $quiz = $m->where($tmp)->select();
        if($quiz[0]['locked'] == "1")
        {
            $this->error("禁止访问！",U('Index/index'));
        }
        $this->title = $quiz[0]['title'];
        #试卷锁 试卷头
        $m = M('quiz_inside');
        $tmp['quiz'] = $id;
        $problems = $m->where($tmp)->select();
        for($i = 0;$i < count($problems);$i++)
            $problems[$i]['format'] = str_replace("answer", "answer".($problems[$i]['id']), $problems[$i]['format']);
        $this->id = $id;


        $this->problems = $problems;
        $this->display();
    }
    public function judge()
    {
        $m = M('quiz_answered');
        $tmp['user_id'] = session("user");
        $tmp['quiz_id'] = I('post.quizid');
        if($m->where($tmp)->select())
        {
            $this->error("做过了",U('Index/index'));
        }
        else
        {
            #获取题目列表
            #对比答案
            $rank = 0;
            $tmp['quiz'] = $tmp['quiz_id'];
            $data = M('quiz_inside')->where($tmp)->select();
            foreach ($data as $value) 
            {
                #id
                if($_POST['answer'.$value['id']] == $value['answer'])
                    $rank += $value['rank'];
                $t['user_id'] = session("user");
                $t['quiz_id'] = $value['id'];
                $t['answer']  = I('post.answer'.$value['id']);
                M('quiz_log')->add($t);
            }
            #标记做过
            $tmp['rank'] = $rank;
            $m->add($tmp);
            $this->success("提交成功！",U('Index/index'));

        }
    }
    public function log()
    {
        if(!AdminController::readConf('showproblem'))
        {
            $this->error("未开启",U('Index/index'));
            exit(1);
        }
        $data = M('quiz_answered')->select();
        $this->data_r = $data;
        $this->display();
    }
    
}