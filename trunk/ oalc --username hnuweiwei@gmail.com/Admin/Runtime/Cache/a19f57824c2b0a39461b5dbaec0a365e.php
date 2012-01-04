<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">

	<form method="post" action="__URL__/update/navTabId/__MODULE__" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<input type="hidden" name="user_id" value="<?php echo $_SESSION[C('USER_AUTH_KEY')] ?>"/>
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
		<div class="pageFormContent" layoutH="58">

            <div class="unit">
				<label>请假开始日期：</label>
				<?php echo ($vo["start_time"]); ?>
			</div>

            <div class="unit">
				<label>请假结束时间：</label>
				<?php echo ($vo["end_time"]); ?>
			</div>

            <div class="unit">
                <label>批准状态：</label>

                   <?php if($vo["status"] == 1): ?><div style="color:green;">请假已获批准</div><?php endif; ?>
                <?php if($vo["status"] == 0): ?><div style="color:red;">请假未获批准</div><?php endif; ?>

            </div>


			<div class="unit">
				<label>备注：</label>
				<textarea rows="6" cols="60" name="notes"><?php echo ($vo["notes"]); ?></textarea>
			</div>
			<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />

		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">修改</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
	
</div>