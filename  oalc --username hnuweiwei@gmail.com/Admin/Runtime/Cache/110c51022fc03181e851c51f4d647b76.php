<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="__URL__" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="_order" value="<?php echo ($_REQUEST["_order"]); ?>"/>
	<input type="hidden" name="_sort" value="<?php echo ($_REQUEST["_sort"]); ?>"/>
</form>



<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="__URL__/add" target="dialog" mask="true" height="370"><span>新增</span></a></li>
            <li class="line">line</li>
            <li><a class="edit" href="__URL__/edit/id/{id}" target="dialog" mask="true"
                   warn="请选择请假日期！"><span>编辑</span></a></li>
            <li class="line">line</li>
            <li><a class="delete" href="__URL__/foreverdelete/id/{id}/navTabId/__MODULE__" target="ajaxTodo" height="400" title="你确定要删除吗？" warn="请选择员工"><span>删除</span></a></li>

        </ul>
    </div>

    <table class="table" width="100%" layoutH="138">
        <thead>
        <tr>
            <th width="60">编号</th>
            <th width="60">请假员工</th>
            <th width="100"  >请假开始时间
            </th>
            <th width="120" >请假结束时间
            </th>
            <th width="120">请假天数
            </th>
            <th >请假申请
            </th>
            <th width="80">批准人
            </th>
            <th width="100">批准状态
            </th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$k;$mod = ($k % 2 )?><tr target="id" rel="<?php echo ($vo['id']); ?>">
                <td><?php echo ($k); ?></td>
               	<td><?php echo (getUsernameByid($vo['userid'])); ?></td>
                <td><?php echo ($vo['start_time']); ?></td>
                <td><?php echo ($vo['end_time']); ?></td>
                <td><?php echo ($vo['days']); ?></td>
                <td><?php echo ($vo['notes']); ?></td>
                <td><?php echo (getUsernameByid($vo['approve_userid'])); ?></td>
                <td
                <?php if($vo["status"] == 1): ?>bgcolor="#adff2f"<?php endif; ?>
                <?php if($vo["status"] == 0): ?>bgcolor="red"<?php endif; ?>
                >
                 <?php if($vo["status"] == 1): ?>已批准！<?php endif; ?>
                <?php if($vo["status"] == 0): ?>未批准！<?php endif; ?>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>

    <div class="panelBar">
        <div class="pages">
            <span>共<?php echo ($totalCount); ?>条</span>
        </div>
        <div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>"
             pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
    </div>

</div>