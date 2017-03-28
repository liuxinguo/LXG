<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo (L("welcome")); ?></title>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jshack.js"></script>
<script type="text/javascript" charset="utf-8"  src="/Statics/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8"  src="/Statics/kindeditor/lang/zh_CN.js"></script>
<script language="javascript" type="text/javascript" src="/Statics/Datepicker/WdatePicker.js"></script>
<link href="__ADMIN__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/Admin/Css/style.css" rel="stylesheet" type="text/css" />
<style>
.input-sort{width:30px;text-align:center;height:18px;line-height:18px;}
</style>
<script  language="JavaScript">
function check(){
    if( ($("#gid").val()==0 )) {
        alert("请选择游戏！");
        $("#gid").focus();
        return false;
    }
}
var URL = '__URL__';
var APP	 =	 '__APP__';
var TPL = '__TPL____MANAGETPL__';

</SCRIPT>
</head>
<body>
<div class="content">
        <div class="page-header">
          <h3 class="fl"><?php echo ($act_title); ?></h3>  
          <div class="user_message fr"><i class="icon-wrench"></i><?php echo (L("configuring_site")); ?></div>
          <div class="cl"></div>
        </div>

  <table class="table set_table">
  <form action="__URL__/<?php echo ($act); ?>" method="post" name="Form1" onSubmit="return check()">


 
     <tr>
      <td width="12%" height="30" align="right"> 元宝： </td>
      <td width="88%"  class="huise_font"><input name="shuzhi" type="text" class="inputclass inputtitle" value="1">*单位：元.</td>
    </tr>
     <tr>
      <td width="12%" height="30" align="right"> 比例： </td>
      <td width="88%"  class="huise_font"><input name="bili" type="text" class="inputclass inputtitle" value="">*单位：% , 只写数字即可.</td>
	   </tr>

   
	
  <tr>
    <td height="50" colspan="2" align="center" valign="middle"><input type="submit" class="btn btn-primary btn-small" name="Submit" id="submit" value="确认提交"></td>
  </tr>
  </form>
</table>
</body>
</html>