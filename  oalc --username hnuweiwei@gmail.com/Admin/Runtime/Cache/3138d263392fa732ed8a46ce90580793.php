<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">

	<form method="post" action="__URL__/update/navTabId/__MODULE__" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<input type="hidden" name="approve_userid" value="<?php echo $_SESSION[C('USER_AUTH_KEY')] ?>"/>
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
		<div class="pageFormContent" layoutH="65">

<table width="420" height="185" border="0">
  <tr >
    <td width="85">请假员工:</td>
    <td width="335"> <?php echo (getUsernameByid($vo['userid'])); ?></td>
  </tr>
  <tr>
    <td>请假开始日期:</td>
    <td><?php echo ($vo["start_time"]); ?></td>
  </tr>
  <tr>
    <td>请假结束时间:</td>
    <td> <?php echo ($vo["end_time"]); ?></td>
  </tr>
  <tr>
    <td>请假天数:</td>
    <td> <?php echo ($vo["days"]); ?></td>
  </tr>
  <tr>
    <td>备注:</td>
    <td> <?php echo ($vo["notes"]); ?></td>
  </tr>
  <tr>
    <td>批准状态:</td>
    <td>
    <input type="radio" name="status" value="1"
        <?php if($vo["status"] == 1): ?>checked<?php endif; ?>
        >批准
      <input type="radio"  name="status" value="0"
               <?php if($vo["status"] == 0): ?>checked<?php endif; ?>
              >拒绝
    </td>
  </tr>
</table>


		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
	
</div>