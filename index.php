<?php
 
error_reporting(0);  
if($_COOKIE["ck"])die("刷新过快！");  
//if($_COOKIE["ck"])header("Location:http://www.baidu.com");//这里如果用户刷新过快，给予终止php脚本或者直接302跳转  
setcookie("ck","1",time()+1);//设定cookie存活时间3s  
//echo "hello!"; 

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
	define('APP_DEBUG',True);
	//define('BIND_MODULE','Ranklist');
	define('APP_PATH','./app/');
require './ThinkPHP/ThinkPHP.php';
