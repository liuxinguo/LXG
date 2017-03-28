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
    if(!trim($("#gid").val()) || trim($("#gid").val()) == 0) {
        alert("请选择游戏！");
        $("#gid").focus();
        return false;
    }
    if(!trim($("#cid").val()) || trim($("#cid").val()) == 0) {
        alert("请选择新手卡标识！");
        $("#cid").focus();
        return false;
    }
    if(!trim($("#cdkeys").val())) {
        alert("请填写新手卡！");
        $("#cdkeys").focus();
        return false;
    }
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
	location.href='<?php echo U('Setting/card_add');?>&gid='+$("#gid").val();
}
//-->
</SCRIPT>
 <table class="table set_table">
  <form action="__URL__/<?php echo ($act); ?>" method="post" name="Form1" onSubmit="return check()">
  
    <tr>
        <td height="30" width="200" align="right" valign="middle">游戏列表：</td>
        <td class="huise_font">
            <select name='gid' id='gid' onChange="gotoserver()">
                <option value='0' <?php if($gid == 0): ?>selected='selected'<?php endif; ?>>全部游戏</option>
                <?php if(is_array($gamelist)): $i = 0; $__LIST__ = $gamelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["id"]); ?>' <?php if($vo["id"] == $gid): ?>selected='selected'<?php endif; ?>><?php echo ($vo["gamename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <select name='sid' id='sid'>
                <option value='0'>全部服务器</option>
                <?php if(is_array($gameserver)): $i = 0; $__LIST__ = $gameserver;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vos["sid"]); ?>' <?php if($vos["sid"] == $get['sid']): ?>selected='selected'<?php endif; ?>><?php echo ($vos['line']); echo ($vos['sid']); ?>区 <?php echo ($vos['servername']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name='cid' id='cid'>
                <option value='0'>&gt&gt选择新手卡标识</option>
                <?php if(is_array($cardlist)): $i = 0; $__LIST__ = $cardlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voc): $mod = ($i % 2 );++$i;?><option value='<?php echo ($voc["id"]); ?>'><?php echo ($voc['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
    </tr>

  <tr>
    <td height="30" align="right" valign="middle">新手卡列表：<br/>(每张卡一行)<br/>为考虑性能,每次最好添加<500张</td>
    <td  valign="middle" class="huise_font"><textarea id="cdkeys" name="cdkeys" style="width:350px;height:150px;"></textarea></td>
  </tr>

  <tr>
    <td height="30" align="right" valign="middle">添加日期：</td>
    <td valign="middle" class="huise_font"><input name="date" type="text" id="date" size="20" value="<?php echo date("Y-m-d H:i:s");?>"  class="inputclass"/></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center" valign="middle">
        <input type="submit" class="btn btn-primary btn-small" name="Submit" id="submit" value="确认提交">
    </td>
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