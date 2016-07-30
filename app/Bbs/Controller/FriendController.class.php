<?php
namespace Bbs\Controller;
use Think\Controller;
class FriendController extends AuthController {
    public function index(){

    }
    public function list()
    {
      $m = M('friends');
      $tmp['first_id'] = session('id');
      $result = $m->where($tmp)->join('Left join on oj_user on oj_friends.second_id = oj_user.id')->select();
      var_dump($result);
      //$this->display();
    }
}