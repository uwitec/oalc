<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="__URL__" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="_order" value="<?php echo ($_REQUEST["_order"]); ?>"/>
	<input type="hidden" name="_sort" value="<?php echo ($_REQUEST["_sort"]); ?>"/>
</form>


<script type="text/javascript">
var bsYear;
var bsDate;
var bsWeek;
var arrLen=8; //数组长度
var sValue=0; //当年的秒数
var dayiy=0; //当年第几天
var miy=0; //月份的下标
var iyear=0; //年份标记
var dayim=0; //当月第几天
var spd=86400; //每天的秒数
function Chen_CAL(){
	c1=new Image(); c1.src="__PUBLIC__/Images/clock/c1.gif";
	c2=new Image(); c2.src="__PUBLIC__/Images/clock/c2.gif";
	c3=new Image(); c3.src="__PUBLIC__/Images/clock/c3.gif";
	c4=new Image(); c4.src="__PUBLIC__/Images/clock/c4.gif";
	c5=new Image(); c5.src="__PUBLIC__/Images/clock/c5.gif";
	c6=new Image(); c6.src="__PUBLIC__/Images/clock/c6.gif";
	c7=new Image(); c7.src="__PUBLIC__/Images/clock/c7.gif";
	c8=new Image(); c8.src="__PUBLIC__/Images/clock/c8.gif";
	c9=new Image(); c9.src="__PUBLIC__/Images/clock/c9.gif";
	c0=new Image(); c0.src="__PUBLIC__/Images/clock/c0.gif";
	cb=new Image(); cb.src="__PUBLIC__/Images/clock/cb.gif";
	showtime();
    init();
    e2c();
    var calen=GetDateString();
    var ccalen=GetcDateString();
    document.getElementById("yangli").innerHTML=calen;
    document.getElementById("nongli").innerHTML=ccalen;
}

function showtime(){
	if (!document.images)
	return;
	var Digital=new Date();
	var h=Digital.getHours();
	var m=Digital.getMinutes();
	var s=Digital.getSeconds();

	if (h<=9){
		document.images.a.src=cb.src;
		document.images.b.src=eval("c"+h+".src");
	}
	else {
	document.images.a.src=eval("c"+Math.floor(h/10)+".src");
	document.images.b.src=eval("c"+(h%10)+".src");
	}
	if (m<=9){
		document.images.d.src=c0.src;
		document.images.e.src=eval("c"+m+".src");
	}
	else {
		document.images.d.src=eval("c"+Math.floor(m/10)+".src");
		document.images.e.src=eval("c"+(m%10)+".src");
	}
	if (s<=9){
		document.g.src=c0.src;
		document.images.h.src=eval("c"+s+".src");
	}
	else {
	document.images.g.src=eval("c"+Math.floor(s/10)+".src");
	document.images.h.src=eval("c"+(s%10)+".src");
	}
	setTimeout("showtime()",1000);
}
</script>
<style type="text/css">
<!--
.unnamed1 {
	font-size: 12px;
	text-decoration: none;
	color: #000000;
}
-->
</style>


<div class="pageHeader">
    <div class="searchBar" style="height:auto;margin:4px auto; width:947px; border:0px solid red; ">

        <div style="width:200px;border:0px solid black; float:left;" align="center">
            <div id="imageclock"><IMG
                    src="__PUBLIC__/Images/clock/cb.gif" name="a" width="18" height="26"><IMG
                    src="__PUBLIC__/Images/clock/cb.gif" name="b" width="18" height="26"><IMG
                    src="__PUBLIC__/Images/clock/colon.gif" name="c" width="18" height="26"><IMG
                    src="__PUBLIC__/Images/clock/cb.gif" name="d" width="18" height="26"><IMG
                    src="__PUBLIC__/Images/clock/cb.gif" name="e" width="18" height="26"><IMG
                    src="__PUBLIC__/Images/clock/colon.gif" name="f" width="18" height="26"><IMG
                    src="__PUBLIC__/Images/clock/cb.gif" name="g" width="18" height="26"><IMG
                    src="__PUBLIC__/Images/clock/cb.gif" name="h" width="18" height="26">
            </div>
            <div id="yangli" style="margin:8px auto; font-size:14px; font-family:'微软雅黑'">
            </div>
            <div id="nongli" style="margin:8px auto; font-size:14px; font-family:'微软雅黑'">
            </div>
            <script language=javascript>Chen_CAL();</script>
        </div>
    </div>
</div>


<div class="pageContent">
    <div class="panelBar">
		<ul class="toolBar">
			<li><a class="edit" href="__URL__/edit/id/{id}/navTabId/__MODULE__" target="dialog" mask="true" warn="请选择考勤日期"><span>编辑</span></a></li>
			<li class="line">line</li>
		</ul>
	</div>

	<table class="table" width="100%" layoutH="138">
		<thead>
		<tr>
			<th width="60">编号</th>
			<th width="100" >考勤日期</th>
            <th width="100" >考勤员工</th>
			<th  width="120">签到时间</th>
			<th width="100">考勤状态</th>
			<th>备注</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$k;$mod = ($k % 2 )?><tr target="id" rel="<?php echo ($vo['id']); ?>">
				<td><?php echo ($k); ?></td>
				<td><?php echo ($vo['attdate']); ?></td>
                	<td><?php echo (getUsernameByid($vo['userid'])); ?></td>
				<td><?php echo ($vo['workstarttime']); ?></td>
				<td    <?php if($vo['status'] == 1 ): ?>bgcolor="#adff2f"<?php else: ?>  bgcolor=red<?php endif; ?>  >
                             <?php if($vo['status'] == 1 ): ?>正常 <?php else: ?>  迟到<?php endif; ?>
                </td>
				<td><?php echo ($vo['notes']); ?></td>

			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>

	<div class="panelBar">
		<div class="pages">
			<span>共<?php echo ($totalCount); ?>条</span>
		</div>
		<div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
	</div>

</div>