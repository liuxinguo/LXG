<?php if (!defined('THINK_PATH')) exit();?><!doctype html><html><head><meta charset="utf-8"><script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script><script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script><script type="text/javascript" src="__ADMIN__/Admin/Js/jshack.js"></script><link href="__ADMIN__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" /><link href="__ADMIN__/Admin/Css/style.css" rel="stylesheet" type="text/css" /><title><?php echo (L("welcome")); ?></title></head><body><div class="content"><div class="page-header"><h3 class="fl"><?php echo ($act_title); ?></h3><div class="user_message fr"><i class="icon-wrench"></i><?php echo (L("configuring_site")); ?></div><div class="cl"></div></div><script  language="JavaScript"><!--  
function  chg(t,a,o,s,str){  
var  tt=document.getElementById(t)  
var  aa=document.getElementById(a)
tt.style[s]=o.checked?str:'none'
aa.style[s]=o.checked?'none':str
}  

function gotoserver(){
    $.get("<?php echo U('Setting/server_list');?>/gid/"+$("#gid").val(),function(data){
        $("#sid").html(data);
		$("#d_sid").val('');
    });    
    /*var game_id = $('#gid').val();
    $.ajax({url: APP+'/public/paylist/',
    type: 'POST',data:{gid:game_id},async: false,timeout: 1000,success: function(result){
        $("#sid").html(result);
    }
    });
    */
}



function change_select(obj,field){
	$("#d_"+field).val($(obj).val());
}

function check(){
/*
    if(!trim($("#category").val()) || trim($("#category").val()) == 0) {
        alert("请选择链接分类！");
        $("#category").focus();
        return false;
    }
    if(!trim($("#type").val()) || trim($("#type").val()) == 0) {
        alert("请选择链接类型！");
        $("#type").focus();
        return false;
    }
*/
    if(!trim($("#mid").val())) {
        alert("请填写渠道MID！");
        $("#mid").focus();
        return false;
    }
   
}

var URL = '__URL__';
var APP	 =	 '__APP__';
var TPL = '__TPL____MANAGETPL__';

//--></SCRIPT><table class="table set_table"><form action="__URL__/<?php echo ($act); ?>" method="post" name="Form1" onSubmit="return check()"><tr><td width="12%" height="30" align="right" valign="middle">渠道MID：</td><td width="88%" valign="middle" class="huise_font"><input name="mid" type="text" id="mid" size="50"  class="inputclass inputtitle" value="<?php echo ($vo["mid"]); ?>" readonly/></td></tr><tr><td height="30" align="right" valign="middle">已冻结：</td><td valign="middle" class="huise_font"><input name="jump" id="jump" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["jump"]); ?>" /></td></tr><tr><td height="30" align="right" valign="middle">已结算：</td><td valign="middle" class="huise_font"><input name="fid" id="fid" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["fid"]); ?>" /></td></tr><tr><td height="30" align="right" valign="middle">添加日期：</td><td valign="middle" class="huise_font"><input name="addtime" type="text" id="addtime" size="20" value="<?php echo date('Y-m-d H:i:s');?>"  class="inputclass"/></td></tr><tr><td height="50" colspan="2" align="center" valign="middle"><input name="id" type="hidden" id="id" size="20" value="<?php echo ($vo["id"]); ?>"/><input type="submit" class="btn btn-primary btn-small" name="Submit" id="submit" value="确认提交"></td></tr></form></table><div class="copyright"></div></div><!--end Right Content--><script type="text/javascript">function formSubmit() {
	//alert(document.form1.action);
	document.form1.submit();
}

</script><script type="text/javascript">    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script></body></html>