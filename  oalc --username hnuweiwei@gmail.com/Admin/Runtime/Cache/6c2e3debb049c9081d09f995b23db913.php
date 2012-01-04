<?php if (!defined('THINK_PATH')) exit();?>
<script type="text/javascript">
    function checktime(){
        var regulartime="<?php echo (C("startwork")); ?>";
        var nowtime=getNowTime();
        var y_m_d=getYMD();
        var status=1;
        if(nowtime>regulartime){
            document.getElementById("tips").innerHTML="<font color=red>"+"你已经迟到了，有什么原因的话写在备注中！"+"</font>";
            type=0;
        }else{
            document.getElementById("tips").innerHTML="<font color=green>"+"你还没有迟到，赶紧打卡吧！"+"</font>";
        }

        document.att.attdate.value=y_m_d;
        document.att.workstarttime.value=nowtime;
        document.att.status.value=type;


    }
</script>


<div class="pageContent">


	<form name="att" method="post" action="__URL__/insert/navTabId/__MODULE__" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<div class="pageFormContent" layoutH="58">

             <div id="tips" style="margin:5px auto; width:90%; font-size:15px; font-family:'微软雅黑'" align="center" >
                  <script language=javascript>checktime();</script>
                </div>
            <hr>

              <input type="hidden" id="userid" name="userid" value="<?php echo ($_SESSION['authId']); ?>">
              <input type="hidden" id="attdate" name="attdate" >
              <input type="hidden" id="workstarttime" name="workstarttime" >
              <input type="hidden" id="status"  name="status">


            <div class="unit">
                <label>备注：</label>
                <textarea rows="7" cols="60" name="notes"></textarea>
            </div>
			
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">打卡</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
	
</div>