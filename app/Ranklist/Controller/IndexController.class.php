<?php
namespace Ranklist\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($page=1){
        #select count(id),user_id from `oj_solution` where status="ACCEPT"  group by user_id;
        #加入条件筛选机制
        $data = M('problem')->query('select count(id) as accept,user_id from `oj_solution` where status="ACCEPT"  group by user_id order by accept desc;');
        $this->data = $data;
        $this->display();
    }
}