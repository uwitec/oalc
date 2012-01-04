<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
<form method="post" action="__URL__/update/navTabId/__MODULE__" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
	<input type="hidden" name="user_id" value="<?php echo $_SESSION[C('USER_AUTH_KEY')] ?>"/>
	<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
	
	<div class="pageFormContent" layoutH="58">
	
		<div class="unit">
			<label>组名：</label>
			<input type="text" class="required alphanumeric"  name="name" value="<?php echo ($vo["name"]); ?>"/>
		</div>
		
		<div class="unit">
			<label>上级组：</label>
			<select name="pid">
		    	<option value="0"><?php if(($list['id'])  ==  "0"): ?>selected<?php endif; ?>无上级组</option>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($list["id"]); ?>" <?php if(($list['id'])  ==  $vo['pid']): ?>selected<?php endif; ?>><?php echo ($list["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
		
		<div class="unit">
			<label>组状态：</label>
			<select class="small bLeft"   name="status">
				<option <?php if(($vo["status"])  ==  "1"): ?>selected<?php endif; ?> value="1">启用</option>
				<option <?php if(($vo["status"])  ==  "0"): ?>selected<?php endif; ?> value="0">禁用</option>
			</select>
		</div>
		
		<div class="unit">
			<label>描 述：</label>
			<textarea class="large bLeft" name="remark"  rows="5" cols="57"><?php echo ($vo["remark"]); ?></textarea>
		</div>
		
	</div>
	<div class="formBar">
		<ul>
			<li><div class="buttonActive"><div class="buttonContent"><button type="submit">Submit</button></div></div></li>
			<li><div class="button"><div class="buttonContent"><button type="button" class="close">Cancel</button></div></div></li>
		</ul>
	</div>
</form>

</div>