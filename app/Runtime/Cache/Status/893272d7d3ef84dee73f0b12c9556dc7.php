<?php if (!defined('THINK_PATH')) exit();?><title>运行状态</title>

<style type="text/css">
table{border-collapse: collapse; width: 100%; font-size: 14px;}
table th{background-color: #E8E8E8;}
table th,
table td{border: solid 1px #ccc; padding: 8px;}
</style>

<style type="text/css">
input{border-collapse: collapse;font-size: 14px;}
</style>

<form>
	用户名：<input name="user_id"/>
	问题ID：<input name="problem_id"/>
	语言（单选下拉框）：<input name="language"/>
	SolutionID：<input name="solution_id"/>
	<input type="submit"/>
</form>
<table style="width:100%">
 	<tr><td>SolutionID</td><td>用户ID</td><td>提交时间</td><td>状态</td><td>问题ID</td><td>内存</td><td>语言</td><td>ContestID</td><td>运行时间</td><td>代码长度</td></tr>
	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
 		<td><?php echo ($vo["id"]); ?></td><td><?php echo ($vo["user_id"]); ?></td><td><?php echo ($vo["time"]); ?></td><td><?php echo ($vo["status"]); ?></td><td><?php echo ($vo["problem_id"]); ?></td><td><?php echo ($vo["memory"]); ?></td><td><?php echo ($vo["language"]); ?></td><td><?php echo ($vo["contest_id"]); ?></td><td><?php echo ($vo["judge_time"]); ?></td><td><?php echo ($vo["code_lenth"]); ?></td>
 	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<?php if($page > 1): ?><a href="/oj2/index.php/Status/Index/index?page=1">首页</a> <a href="/oj2/index.php/Status/Index/index?page=<?php echo ($page-1); ?>">上一页</a><?php endif; ?> <?php if($page < $cnt): ?><a href="/oj2/index.php/Status/Index/index?page=<?php echo ($page+1); ?>">下一页</a> <a href="/oj2/index.php/Status/Index/index?page=$cnt">末页</a><?php endif; ?>