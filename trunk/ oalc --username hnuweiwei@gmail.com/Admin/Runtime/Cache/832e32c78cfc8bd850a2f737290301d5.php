<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">


    <form name="begoff" method="post" action="__URL__/insert/navTabId/__MODULE__" class="pageForm required-validate"
          onsubmit="return validateCallback(this, dialogAjaxDone)">
        <div class="pageFormContent" layoutH="58">

            <div id="tips" style="margin:10px auto; width:90%; font-size:15px; font-family:'微软雅黑'" align="center">
            </div>
            <hr>

            <input type="hidden" id="userid" value="<?php echo ($_SESSION['authId']); ?>" name="userid">
            <div class="unit">
                <label>请假开始时间：</label>
                <input type="text" name="start_time" class="required date" size="30" />
                <a class="inputDateButton" href="javascript:;">选择</a>
            </div>

            <div class="unit">
                <label>请假结束时间：</label>
                <input type="text" name="end_time" class="required date" size="30"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </div>



            <div class="unit">
                <label>请假天数：</label>
                <input type="text" name="days" class="required digits" size="30"/>
            </div>

            <div class="unit">
                <label>请假申请：</label>
                <textarea rows="7" cols="60" name="notes"></textarea>
            </div>

        </div>
        <div class="formBar">
            <ul>
                <li>
                    <div class="buttonActive">
                        <div class="buttonContent">
                            <button type="submit">请假</button>
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