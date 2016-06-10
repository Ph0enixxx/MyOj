<?php
namespace Bbs\Controller;
use Think\Controller;
class AuthController extends Controller {
    public function __construct()
    {
      Controller::__construct();
      if(!session("user"))
      	$this->jump();
      echo session("user");
      $this->display("Auth/header");

    }
  	public function jump($url='')
  	{
  		$this->display("Auth/index");
  		echo "请先登录";
      return ;
  	}
}