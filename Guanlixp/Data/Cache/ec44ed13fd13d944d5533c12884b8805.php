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
<script  language="JavaScript">  
<!--  
function  chg(t,a,o,s,str){  
var  tt=document.getElementById(t)  
var  aa=document.getElementById(a)
tt.style[s]=o.checked?str:'none'
aa.style[s]=o.checked?'none':str
}  

function check(){
  
}

var URL = '__URL__';
var APP	 =	 '__APP__';
var TPL = '__TPL____MANAGETPL__';

function gotoserver2(){
    $.get("<?php echo U('Setting/server_list');?>/gid/"+$("#gid").val(),function(data){
        $("#sid").html(data);
    });
}
function gotoserver(){
	location.href='?gid='+$("#gid").val();
}
//-->
</SCRIPT>
 <table class="table set_table">
  <form action="__URL__/<?php echo ($act); ?>" method="psot" name="Form1" onSubmit="return check()">
  
  <tr>
    <td height="30" align="right" valign="middle">开服表信息：
      <br/>
      为考虑性能,每次最好添加一周的服</td>
    <td  valign="middle" class="huise_font"><textarea id="cdkeys" name="cdkeys" style="width:350px;height:450px;"></textarea></td>
    <td  valign="middle" class="huise_font"><span style="color: #FF0000">开服表格式：</span><br>
      <br>
      游戏名称:武尊
        <br>
        新开区服:17
        <br>
        混服GID:wz
        <br>
        混服SID:64
        <br>
        开服时间:2014-08-18 12:00<br>
        <br>
        游戏名称:风云无双<br>
        新开区服:16<br>
        混服GID:45<br>
        混服SID:63<br>
        开服时间:2014-08-17 17:00<br>
        <br>
        游戏名称:太古遮天<br>
        新开区服:15<br>
        混服GID:tgzt<br>
        混服SID:62<br>
        开服时间:2014-08-16 16:00<br>
        <br>
       <span style="color: #FF0000"> 请将上面信息格式复制到 TXT 文本里进行，编辑<br>混服GID：为混服提供方的游戏识别有数字，有游戏首字母的，<br>混服SID：为混服提供方真实开服区服ID。<br>****配置信息里如有错误配置，系统将写任何信息。返回信息框后请根据提示找到错误所在进行修改。</span></td>
  </tr>

  <tr>
    <td height="30" align="right" valign="middle">添加日期：</td>
    <td valign="middle" class="huise_font"><input name="date" type="text" id="date" size="20" value="<?php echo date("Y-m-d H:i:s");?>"  class="inputclass"/></td>
    <td valign="middle" class="huise_font">&nbsp;</td>
  </tr>
  <tr>
    <td height="50" colspan="3" align="center" valign="middle">
        <input type="submit" class="btn btn-primary btn-small" name="Submit" id="submit" value="确认提交">    </td>
  </tr>
  </form>
</table>
</div>
      <!--end Right Content-->  

<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>

</body>
</html>