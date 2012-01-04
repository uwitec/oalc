<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
    span.error {
    width:115px;
}

 .pageFormContent p {

    margin-right: 60px;
    
}

</style>


<div class="pageContent"  layoutH="62" >
    <form method="post" action="__URL__/change/navTabId/__MODULE__" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<div class="pageFormContent"   style=" margin-left:30px; margin-bottom:15px; ">
			<p>
				<label>用户账号：</label>
				<?php echo ($user["account"]); ?>
			</p>
            <input type="hidden" name="user_id" value="<?php echo ($user["id"]); ?>" />
             <p>
				<label>出生日期：</label>
				<input type="text" name="birthday" class="required date" size="30" yearstart="-40" yearend="10" readonly="true" value="<?php echo ($userinfo["birthday"]); ?>" />
                 <a class="inputDateButton" href="javascript:;">选择</a>
			</p>

            <p>
				<label>性别：</label>
				<select name="sex" class="required combox">
					<option value="">请选择</option>
					<option value="0">男</option>
					<option value="1" selected>女</option>
				</select>
			</p>

            <p>
				<label>籍贯：</label>
				<input type="text" size="30"  class="required chinese"  name="nativeplace" value="<?php echo ($userinfo["nativeplace"]); ?>"  />
			</p>
			<p>
				<label>政治面貌：</label>
				<input type="text" size="30"   class="required"   name="party" value="<?php echo ($userinfo["party"]); ?>" />
			</p>
			<p>
				<label>民族：</label>
				<input type="text" size="30"   class="required"  name="nationality" value="<?php echo ($userinfo["nationality"]); ?>"  />
			</p>

            	<p>
				<label>身份证号：</label>
				<input type="text" size="30"   class="required idcard"   name="idcard" value="<?php echo ($userinfo["idcard"]); ?>"  />
			</p>

             <p>
				<label>婚姻状况：</label>
				<select name="marriage" class="required combox">
					<option value="">请选择</option>
					<option value="个人">已婚</option>
					<option value="公司" selected>未婚</option>
				</select>
			</p>

            <div class="divider"></div>

               <p>
             <label>最高学历：</label>
				<input type="text" size="30"   name="education" value="<?php echo ($userinfo["education"]); ?>" />
			</p>
              <p>
				<label>专业：</label>
				<input type="text" size="30" class="required"  name="major" value="<?php echo ($userinfo["major"]); ?>" />
			</p>
			<p>
				<label>就读院校：</label>
				<input type="text" size="30"  class="required"   name="school" value="<?php echo ($userinfo["school"]); ?>"  />
			</p>
			<p>
				<label>已工作时间：</label>
				<input type="text" size="30"  class="required"   name="workingtime" value="<?php echo ($userinfo["workingtime"]); ?>"  />
			</p>


              <div class="divider"></div>

	        <p>
				<label>电子邮箱：</label>
				<input type="text" size="30"  class="required email"   name="email" value="<?php echo ($userinfo["email"]); ?>"  />
			</p>

            <p>
				<label>手机：</label>
				<input type="text" size="30"    class="required cellphone"   name="mobile" value="<?php echo ($userinfo["mobile"]); ?>" />
			</p>

            <p>
				<label>qq号码：</label>
	            <input type="text" size="30"    class="required"    name="qicq" value="<?php echo ($userinfo["qicq"]); ?>" />
            </p>

             <p>
				<label>通讯地址：</label>
	            <input type="text" size="30"     class="required"  alt="你个人现住地址"  name="messageaddress" value="<?php echo ($userinfo["messageaddress"]); ?>"  />
            </p>


			<p>
				<label>家庭住址：</label>
				<input type="text" size="30"    class="required"    name="homeaddress" value="<?php echo ($userinfo["homeaddress"]); ?>" />
			</p>
			<p>
				<label>邮编：</label>
				<input type="text" size="30"    class="required zipcode"    name="homezipcode" value="<?php echo ($userinfo["homezipcode"]); ?>"  />
			</p>

            <p>
				<label>紧急联络人：</label>
				<input type="text" size="30"    class="required"   alt="请务必保证通过此人能够联系到你"
                       name="emergencycontactpeople" value="<?php echo ($userinfo["emergencycontactpeople"]); ?>"  />
			</p>

            <p>
				<label>紧急联系方式：</label>
				<input type="text" size="30"     class="required"    name="emergencycontacttel" value="<?php echo ($userinfo["emergencycontacttel"]); ?>" />
			</p>


            
            <div class="divider"></div>




			<p style="width:auto;">
				<label style="width:auto;">
                    家庭情况说明
                    <span style="color:red; font-size:11px;"> (请说明家庭主要成员信息以及家庭经济情况)</span>：
                </label>
                <br>
				<textarea class="editor"   name="description"  rows="8" cols="84" ><?php echo ($userinfo["description"]); ?></textarea>
			</p>
			

		</div>
		<div class="formBar">
			<ul>
				<!--<li><a class="buttonActive" href="javascript:;"><span>保存</span></a></li>-->
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>