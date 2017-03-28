<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jshack.js"></script>
<script type="text/javascript" charset="utf-8"  src="/Statics/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8"  src="/Statics/kindeditor/lang/zh_CN.js"></script>
<script language="javascript" type="text/javascript" src="/Statics/Datepicker/WdatePicker.js"></script>

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
//-->  
</script> 
<SCRIPT language=JavaScript>
function check(){
	if(trim($("#gamename").val()) == "" || trim($("#gamename").val())== 0) {
            alert("请选择游戏名称！");
            $("#gamename").focus();
            return false;
	}
	if(trim($("#sid").val()) == "") {
            alert("请输入服务器编号！");
            $("#sid").focus();
            return false;
	}
	if(trim($("#servername").val()) == "") {
            alert("请输入服务器名称！");
            $("#servername").focus();
            return false;
	}
	if(trim($("#line").val()) == "" || trim($("#line").val())== 0) {
            alert("请选择线路！");
            $("#line").focus();
            return false;
	}
	if(trim($("#begintime").val()) == "") {
            alert("请输入开服时间！");
            $("#begintime").focus();
            return false;
	}

}
</SCRIPT>
<table class="table set_table">

  <form action="__URL__/<?php echo ($act); ?>" method="post" name="Form1" onSubmit="return check()">
  <tr>
    <td height="30" align="right" valign="middle">游戏名称：</td>
    <td valign="middle" class="huise_font">
        <select name='gid' id="gamename">
        <option value='0'>请选择游戏名称</option>
        <?php if(is_array($gamelistname)): $i = 0; $__LIST__ = $gamelistname;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gamelistname): $mod = ($i % 2 );++$i;?><option value='<?php echo ($gamelistname["id"]); ?>'><?php echo ($gamelistname["gamename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </td>
  </tr>
  <tr>
    <td width="12%" height="30" align="right" valign="middle">是否混服：</td>
    <td width="88%" valign="middle" class="huise_font">
	    <select name='ismix'>
        <option value='0'>─否─</option>
        <option value='1'>─是─</option>
        </select>
	</td>
  </tr>
  <tr>
    <td width="12%" height="30" align="right" valign="middle">服务器编号：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="sid" type="text" id="sid" value="" size="50"  class="inputclass inputtitle"/>	</td>
  </tr>
  <tr>
    <td width="12%" height="30" align="right" valign="middle">服务器名称：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="servername" type="text" id="servername" value="双线区" size="50"  class="inputclass inputtitle"/></td>
  </tr>
  <!--
  <tr>
    <td width="12%" height="30" align="right" valign="middle">KEY：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="key" type="text" id="key" value="" size="50"  class="inputclass inputtitle"/></td>
  </tr>-->
  <tr>
    <td height="30" align="right" valign="middle">自定义属性：</td>
    <td valign="middle" class="huise_font">
        <input class='np' type='checkbox' name='flags[]' id='flagst' value='t'>置顶[t]
        <input class='np' type='checkbox' name='flags[]' id='flagsc' value='c'>推荐[c]
        <input class='np' type='checkbox' name='flags[]' id='flagsh' value='h'>热门[h]
        <input class='np' type='checkbox' name='flags[]' id='flagss' value='s'>测试[s]
        <input class='np' type='checkbox' name='flags[]' id='flagsb' value='b'>加粗[b]
        <input class='np' type='checkbox' name='flags[]' id='flagsr' value='r' onClick="chg('repairmessage','repairmessage1',this,'display','')">维护[r]
    </td>
  </tr>
  <tbody id="repairmessage" style="display: none;">
  <tr>
    <td height="30" align="right" valign="middle">维护信息：</td>
    <td valign="middle"><input name="extend[repairmessage]" type="text" class="inputclass inputtitle" value=""></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">开始时间：</td>
    <td valign="middle"><input name="extend[repairbegintime]" id="repairtime" type="text" class="inputclass inputtitle" value="<?php echo date("Y-m-d");?> 14:00:00"class="inputclass inputtitle Wdate" onFocus="WdatePicker({startDate:'%y-%M-%d %H:%i:%s',dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true})"></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">结束时间：</td>
    <td valign="middle"><input name="extend[repairendtime]" id="repairtime" type="text" class="inputclass inputtitle" value="<?php echo date("Y-m-d");?> 14:00:00"class="inputclass inputtitle Wdate" onFocus="WdatePicker({startDate:'%y-%M-%d  %H:%i:%s',dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true})"></td>
  </tr>
  </tbody>
  <tr>
    <td height="30" align="right" valign="middle">线路：</td>
    <td valign="middle" class="huise_font">
        <select name='line' id="line">
        <option value='0' >请选择线路</option>
        <option value='双线'selected='selected'>─双线─</option>
        <option value='多线'>─多线─</option>
        <option value='电信'>─电信─</option>
        <option value='网通'>─网通─</option>
        </select>
	  </td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">开服时间：</td>
    <td valign="middle" class="huise_font"><input name="begintime" id="begintime" type="text" value="<?php echo date("Y-m-d");?> 14:00:00"class="inputclass inputtitle Wdate" onFocus="WdatePicker({startDate:'%y-%M-%d 14:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true})" /></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">混服编号：</td>
    <td valign="middle">G:<input name="extend[gameid]" id="gameid" type="text" class="inputclass inputtitle" value="" style="width:50px;"> / S:<input name="extend[mid]" style="width:50px;" id="mid" type="text" class="inputclass inputtitle" value=""> 没有留空</td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">游戏地址：</td>
    <td valign="middle" class="huise_font"><input name="gameurl" id="gameurl" type="text" size="50" class="inputclass inputtitle" ></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">打开方式：</td>
    <td valign="middle" class="huise_font">
   	 <select name="target"  size="1" id="target">
            <option value="_blank">_blank</option>
            <option value="_new">_new</option>
            <option value="_parent">_parent</option>
            <option value="_self">_self</option>
            <option value="_top">_top</option>
	  </select>
    </td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">状态：</td>
    <td valign="middle" class="huise_font">充值 <input type="checkbox" name="ispay" value="1" checked> 显示 <input type="checkbox" name="isdisplay" value="1" checked> 审核 <input type="checkbox" name="status" value="1" checked></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">添加日期：</td>
    <td valign="middle" class="huise_font"><input name="addtime" type="text" id="addtime" size="20" value="<?php echo date("Y-m-d H:i:s");?>"  class="inputclass"/></td>
  </tr>
  
  <tr>
    <td height="50" colspan="2" align="center" valign="middle"><input type="submit" class="btn btn-primary btn-small" name="Submit" value="确认提交"></td>
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