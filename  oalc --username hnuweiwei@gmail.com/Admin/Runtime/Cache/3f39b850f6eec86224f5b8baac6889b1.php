<?php if (!defined('THINK_PATH')) exit();?><div class="page">
	<div class="pageContent">
	
	<form method="post" action="__URL__/changePwd" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
		<div class="pageFormContent" layoutH="58">
			
			<div class="unit">
				<label>旧密码</label>
				<input type="password" class="required" name="oldpassword">
			</div>
			
			<div class="unit">
				<label>新密码</label>
				<input type="password" class="required" name="password">
			</div>
			
			<div class="unit">
				<label>重复新密码</label>
				<input type="password" class="required" name="repassword">
			</div>
		
			<div class="unit">
				<label>验证码：</label>
				<input type="text" class="required" name="verify"> 
				<img src="__URL__/verify/" BORDER="0" ALT="click" id="verifyImg" onClick="fleshVerify()" style="cursor:pointer" align="absmiddle">
			</div>
		
		</div>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
	
	</div>
</div>