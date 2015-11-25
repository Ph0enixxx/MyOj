<?php
namespace Home\Controller;
use Think\Controller;
class MsgController extends Controller {
    public function index()
    {
    	$msg = M('mymsg');
    	$id['to']  = $_SESSION['username'];
    	$id['read'] = 0;
    	$data = $msg->where($id)->select();
    	foreach ($data as $value) 
    	{
    		$value['read'] = 1;
    		$msg->save($value);
    	}

    	$this->data = $data;//私信内容
    	$_SESSION['msg'] = MsgController::getUnRead();
    	$this->userInf = UserController::getInf();
    	$this->display('Index/msg');
    	#分别显示已读未读
    }
    public function old()
    {
    	$msg = M('mymsg');
    	$id['to']  = $_SESSION['username'];
    	$data = $msg->where($id)->select();
    	$this->data = $data;//私信内容
    	$_SESSION['msg'] = 0;
    	$this->old = 1;
    	$this->userInf = UserController::getInf();
    	$this->display('Index/msg');
    }
    public static function getUnRead()
    {
    	$msg = M('mymsg');
    	$id['to']  = $_SESSION['username'];
    	$id['read'] = 0;
    	$data = $msg->where($id)->select();
    	return count($data);
    	# code...
    }
    public function sendmsg()
    {
    		$this->display('Index/sendmsg');
    }
    public function send()
    {
    	if(is_null(I('post.to'))||is_null(I('post.title'))||is_null(I('post.content')))
    	{
    		return;
		}
		//var_dump($_POST['to']);
    		$msg['to'] = I('post.to');
    		$msg['title'] = I('post.title');
    		$msg['content'] = I('post.content');
    		$msg['from'] = $_SESSION['username'];
    		$data = M('mymsg');
            $user = M('user');
            $tmp['username'] = $msg['to'];
            $check = $user->where($tmp)->limit(1)->select();
            //var_dump($check);
            if(!is_null($check[0]))
            {
        		if($data->add($msg))#做用户检测
                {
                    $_SESSION['msg'] = MsgController::getUnRead();
            		echo "<script language='javascript'>\n";
        			echo "alert('发送成功!');\n";
        			echo "location.href='".U('Home/User/Index')."'\n";
        			echo "</script>";
                }
                else
                {
                    echo "<script language='javascript'>\n";
                    echo "alert('发送失败!');\n";
                    echo "location.href='".U('Home/User/Index')."'\n";
                    echo "</script>"; 
                }
            }
            else
            {
                echo "<script language='javascript'>\n";
                echo "alert('发送失败,查无此人!');\n";
                echo "location.href='".U('Home/User/Index')."'\n";
                echo "</script>"; 
            }
    }
}