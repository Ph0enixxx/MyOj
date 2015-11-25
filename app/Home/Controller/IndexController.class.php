<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($id=0)
    {
        $this->display();
    }
    public function Problem($page = 1)
    {
        //prblem data
        $d = [];
        $data['id']='1001';
        $data['title']='a+b';
        $data['source']='sys';
        $data['AC']='12';
        $data['submit']='1200';
        $d[0] = $data;
        $this->problemList = $d;
        $this->P = 4;
        $this->display('problem');
        
    }
}