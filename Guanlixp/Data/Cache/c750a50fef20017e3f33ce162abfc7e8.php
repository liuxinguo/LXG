<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jshack.js"></script>
<link href="__ADMIN__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/Admin/Css/style.css" rel="stylesheet" type="text/css" />
<title><?php echo (L("welcome")); ?></title>
</head>
<body>
<div class="content">
        <div class="page-header">
          <h3 class="fl"><?php echo ($act_title); ?></h3>  
          <div class="user_message fr"><i class="icon-wrench"></i><?php echo (L("configuring_site")); ?></div>
          <div class="cl"></div>
        </div>
  <table class="table set_table">

  <form action="<?php echo U('member_edit');?>" method="post" id="myform" enctype="multipart/form-data">
  <tr>
    <td width="12%" height="30" align="right" valign="middle"> 帐号：</td>
    <td width="88%" valign="middle" class="huise_font"><?php echo ($info["uname"]); ?></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">密码：</td>
    <td valign="middle" class="huise_font" style="color:#CC3300;"><input type="password" class="inputclass inputtitle" value="" name="password" id="password" size="10" >
    *不填写 为不修改 </td>
  </tr>
  </tr>
    <tr>
    <td height="30" align="right" valign="middle">平台币：</td>
    <td valign="middle" class="huise_font"><input type="text" class="inputclass inputtitle" value="<?php echo ($info["money"]); ?>" name="money" id="money" size="20" ></td>
  </tr>
  </tr>
    <tr>
    <td height="30" align="right" valign="middle">积分：</td>
    <td valign="middle" class="huise_font"><input type="text" class="inputclass inputtitle" value="<?php echo ($info["jifen"]); ?>" name="jifen" id="jifen" size="20" ></td>
  </tr>
    <tr>
    <td height="30" align="right" valign="middle">昵称：</td>
    <td valign="middle" class="huise_font"><input type="text" class="inputclass inputtitle" value="<?php echo ($info["nickname"]); ?>" name="nickname" id="nickname" size="20" ></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">绑定邮箱：</td>
    <td valign="middle" class="huise_font"><input type="text" class="inputclass inputtitle" value="<?php echo ($info["email"]); ?>" name="email" id="email" size="25" ></td>
  </tr>
    <tr>
    <td height="30" align="right" valign="middle">绑定手机号：</td>
    <td valign="middle" class="huise_font"><input type="text" class="inputclass inputtitle" value="<?php echo ($info["mobile"]); ?>" name="mobile" id="mobile" size="20" ></td>
  </tr>
    <tr>
    <td height="30" align="right" valign="middle">身份证姓名：</td>
    <td valign="middle" class="huise_font"><input type="text" class="inputclass inputtitle" value="<?php echo ($info["idname"]); ?>" name="idname" id="idname" size="10" ></td>
  </tr>
    <tr>
    <td height="30" align="right" valign="middle">身份证号码：</td>
    <td valign="middle" class="huise_font"><input type="text" class="inputclass inputtitle" value="<?php echo ($info["idcard"]); ?>" name="idcard" id="idcard" size="30" ></td>
  </tr>
    <tr>
    <td height="30" align="right" valign="middle">密保问题：</td>
    <td valign="middle" class="huise_font"><input type="text" class="inputclass inputtitle" value="<?php echo ($info["safequestion"]); ?>" name="safequestion" id="safequestion" size="50" ></td>
  </tr>
      <tr>
    <td height="30" align="right" valign="middle">密保答案：</td>
    <td valign="middle" class="huise_font"><input type="text" class="inputclass inputtitle" value="<?php echo ($info["safeanswer"]); ?>" name="safeanswer" id="safeanswer" size="40" ></td>
  </tr>
 <tr>
    <td height="30" align="right" valign="middle">性别：</td>
    <td valign="middle" class="huise_font"><input name="gender" value="1" type="radio" <?php if(($info["gender"]) == "1"): ?>checked<?php endif; ?>>男&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="gender" value="0" type="radio" <?php if(($info["gender"]) == "2"): ?>checked<?php endif; ?>> 女</td>
  </tr>
 <tr>
    <td height="30" align="right" valign="middle">出生年月日：</td>
    <td valign="middle" class="huise_font"><input type="text" class="inputclass inputtitle" value="<?php echo ($info["year"]); ?>" name="year" id="year" size="4" >&nbsp;&nbsp;<input type="text" class="inputclass inputtitle" value="<?php echo ($info["moth"]); ?>" name="moth" id="moth" size="2" >&nbsp;&nbsp;<input type="text" class="inputclass inputtitle" value="<?php echo ($info["day"]); ?>" name="day" id="day" size="2" ></td>
  </tr>
 <tr>
    <td height="30" align="right" valign="middle">教育状况：</td>
    <td valign="middle" class="huise_font"><input type="text" class="inputclass inputtitle" value="<?php echo ($info["education"]); ?>" name="education" id="education" size="20" ></td>
  </tr>
 <tr>
    <td height="30" align="right" valign="middle">职业：</td>
    <td valign="middle" class="huise_font"><input type="text" class="inputclass inputtitle" value="<?php echo ($info["vocation"]); ?>" name="vocation" id="vocation" size="20" ></td>
  </tr>
   <tr>
    <td height="30" align="right" valign="middle">QQ：</td>
    <td valign="middle" class="huise_font"><input type="text" class="inputclass inputtitle" value="<?php echo ($info["qq"]); ?>" name="qq" id="qq" size="20" ></td>
  </tr>  
 <tr>
    <td height="30" align="right" valign="middle">详细地址：</td>
    <td valign="middle" class="huise_font"><input type="text" class="inputclass inputtitle" value="<?php echo ($info["address"]); ?>" name="address" id="address" size="20" ></td>
  </tr>
 <tr>
    <td height="30" align="right" valign="middle">渠道绑定：</td>
    <td valign="middle" class="huise_font">

		<select name='mid' id='mid' >
            <option value='0'>==选择渠道==</option>
			<?php if(is_array($qdlist)): $i = 0; $__LIST__ = $qdlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$qd): $mod = ($i % 2 );++$i;?><option value='<?php echo ($qd["mid"]); ?>' <?php if($qd["mid"] == $info['mid']): ?>selected='selected'<?php endif; ?>><?php echo ($qd["mname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
	</td>
  </tr>
  <tbody id="dcontent">
  </tbody>
  <tr>
    <td height="30" align="right" valign="middle">是否锁定：</td>
    <td valign="middle" class="huise_font"><input name="user_status" value="1" type="radio" <?php if(($info["status"]) == "1"): ?>checked<?php endif; ?>>是&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="user_status" value="0" type="radio" <?php if(($info["status"]) == "0"): ?>checked<?php endif; ?>> 否</td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center" valign="middle">
	<input value="<?php echo ($uid); ?>" name="uid" type="hidden">
<input value="<?php echo ($info["uname"]); ?>" name="username" type="hidden">
	<input class="btn btn-primary btn-small" name="dosubmit" type="submit"  id="submit" value="确认提交"></td>
  </tr>

  </form>
</table>

</div>
      <!--end Right Content-->  


<script type="text/javascript">
function formSubmit() {
	//alert(document.form1.action);
	document.form1.submit();
}

</script>
<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>

</body>
</html>