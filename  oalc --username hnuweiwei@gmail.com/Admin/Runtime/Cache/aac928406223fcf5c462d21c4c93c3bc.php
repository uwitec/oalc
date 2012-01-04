<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">

    <form method="post" action="__URL__/update/navTabId/__MODULE__" class="pageForm required-validate"
          onsubmit="return validateCallback(this, dialogAjaxDone)">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION[C('USER_AUTH_KEY')] ?>"/>
        <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>

        <div class="pageFormContent" layoutH="58">

            <table width="420" height="185" border="0">
                <tr>
                    <td width="85">考勤日期：</td>
                    <td width="335"><?php echo ($vo["attdate"]); ?></td>
                </tr>
                <tr>
                    <td>考勤员工:</td>
                    <td><?php echo (getUsernameByid($vo['userid'])); ?></td>
                </tr>
                <tr>
                    <td>签到时间:</td>
                    <td><?php echo ($vo["workstarttime"]); ?></td>
                </tr>
                <tr>
                    <td>考勤情况:</td>
                    <td>
                        <?php if($vo["status"] == 1): ?>按时上班！<?php endif; ?>
                        <?php if($vo["status"] == 0): ?>迟到！<?php endif; ?>

                    </td>
                </tr>
                <tr>
                    <td>备注:</td>
                    <td> <?php echo ($vo["notes"]); ?></td>
                </tr>
                <tr>
                    <td>考勤状态:</td>
                    <td>
                        <input type="radio" name="status" value="1"
                        <?php if($vo["status"] == 1): ?>checked<?php endif; ?>
                        >因公迟到
                        <input type="radio" name="status" value="0"
                        <?php if($vo["status"] == 0): ?>checked<?php endif; ?>
                        >无合理原因迟到
                    </td>
                </tr>
            </table>

            <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>

        </div>
        <div class="formBar">
            <ul>
                <li>
                    <div class="buttonActive">
                        <div class="buttonContent">
                            <button type="submit">修改</button>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="button">
                        <div class="buttonContent">
                            <button type="button" class="close">取消</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </form>

</div>