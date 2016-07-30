<?php if (!defined('THINK_PATH')) exit();?><title>排名</title>

<style type="text/css">
table{border-collapse: collapse; width: 100%; font-size: 14px;}
table th{background-color: #E8E8E8;}
table th,
table td{border: solid 1px #ccc; padding: 8px;}
</style>

<style type="text/css">
input{border-collapse: collapse;font-size: 14px;}
</style>
 
<table style="width:100%">
<tr><td>用户ID</td><td>完成题目数</td></tr>
	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
 		<td><?php echo ($vo["user_id"]); ?></td><td><?php echo ($vo["accept"]); ?></td>
 	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>