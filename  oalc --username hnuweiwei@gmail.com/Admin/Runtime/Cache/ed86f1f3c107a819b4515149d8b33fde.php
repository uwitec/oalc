<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="__URL__" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="_order" value="<?php echo ($_REQUEST["_order"]); ?>"/>
	<input type="hidden" name="_sort" value="<?php echo ($_REQUEST["_sort"]); ?>"/>
</form>



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