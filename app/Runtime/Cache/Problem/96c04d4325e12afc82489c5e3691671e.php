<?php if (!defined('THINK_PATH')) exit(); if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h1><?php echo ($vo["title"]); ?></h1>
<br>
description:<br>
<?php echo ($vo["description"]); ?><br/>
input:<br>
<?php echo ($vo["input"]); ?><br/>
output:<br>
<?php echo ($vo["output"]); ?><br/>
hint:<br>
<?php echo ($vo["hint"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>