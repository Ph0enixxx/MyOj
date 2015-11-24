<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index($id=0)
    {
    	$_SESSION['name'] = 'as';
        $this->display("Index/login");
    }
}