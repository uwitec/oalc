<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="__URL__" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="_order" value="<?php echo ($_REQUEST["_order"]); ?>"/>
	<input type="hidden" name="_sort" value="<?php echo ($_REQUEST["_sort"]); ?>"/>
</form>


<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" action="__URL__" method="post">
	<div class="searchBar">
		<ul class="searchContent">
			<li>
				<label>用户名：</label>
				<input type="text" name="account" value=""/>
			</li>
            <li>
                <div class="buttonActive" style="float:left">
                    <div class="buttonContent"><button type="submit">查询</button></div>
                </div>
            </li>
		</ul>
	</div>
	</form>
</div>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="__URL__/add" target="dialog" mask="true"><span>新增</span></a></li>
			<li><a class="delete" href="__URL__/foreverdelete/id/{sid_user}/navTabId/__MODULE__" target="ajaxTodo" title="你确定要删除吗？" warn="请选择用户"><span>删除</span></a></li>
			<li><a class="edit" href="__URL__/edit/id/{sid_user}" target="dialog" mask="true" warn="请选择用户"><span>编辑</span></a></li>
			<li class="line">line</li>
			<li><a class="icon" href="__URL__/password/id/{sid_user}" target="dialog" mask="true" warn="请选择用户"><span>修改密码</span></a></li>
		</ul>
	</div>

	<table class="table" width="100%" layoutH="138">
		<thead>
		<tr>
			<th width="60">编号</th>
			<th width="100" orderField="account" <?php if($_REQUEST["_order"] == 'account'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>用户名</th>
			<th  width="120" orderField="nickname" <?php if($_REQUEST["_order"] == 'nickname'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>昵称</th>
			<th width="100" orderField="last_login_ip" <?php if($_REQUEST["_order"] == 'last_login_ip'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>是>上次登陆ip</th>
			<th orderField="last_login_time" <?php if($_REQUEST["_order"] == 'last_login_time'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>上次登录</th>
			<th width="80" orderField="login_count" <?php if($_REQUEST["_order"] == 'login_count'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>登录次数</th>
            <th width="80" orderField="status">状态</th>
			<th width="80" orderField="status" <?php if($_REQUEST["_order"] == 'status'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>操作</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr target="sid_user" rel="<?php echo ($vo['id']); ?>">
				<td><?php echo ($vo['id']); ?></td>
				<td><?php echo ($vo['account']); ?></td>
				<td><?php echo ($vo['nickname']); ?></td>
				<td><?php echo ($vo['last_login_ip']); ?></td>
				<td><?php echo (date("Y-m-d H:i:s",$vo['last_login_time'])); ?></td>
				<td><?php echo ($vo['login_count']); ?></td>
                <td>

                 <?php if($vo["status"] == 1): ?>正常<?php endif; ?>
                <?php if($vo["status"] == 0): ?>已 停用<?php endif; ?>

                </td>
				<td><?php echo (showStatus($vo['status'],$vo['id'])); ?></td>
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