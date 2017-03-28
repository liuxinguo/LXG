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
<SCRIPT language=JavaScript>
//指定当前组模块URL地址
var URL = '__URL__';
var APP = '__APP__';
var PUBLIC = '__PUBLIC__';
function gotoserver(){
    $.get("<?php echo U('Setting/server_list');?>/gid/"+$("#gid").val(),function(data){
        $("#sid").html(data);
		$("#d_sid").val('');
    });    
}
</SCRIPT>
  <table class="table set_table">
    <form action="<?php echo U('pay_batchuser');?>" name="Form2" method="post">
    <tr>
            <td height="30" width="200" class="table-textcenter">充值时间：</td>
            <td class="huise_font"><input type="text" name="begintime" id="begintime" value="<?php echo (date("Y-m-d",$get["begintime"])); ?>" class="inputclass Wdate"  onfocus="WdatePicker()" /> - <input type="text" name="endtime" id="endtime" value="<?php echo (date("Y-m-d",$get["endtime"])); ?>" class="inputclass Wdate"  onfocus="WdatePicker()" /></td>
</tr>
    <tr>
        <td height="30" width="200" class="table-textcenter">充值方式：</td>
        <td class="huise_font">
            <select name="paytype" id="paytype">
                <option value="0">请选择充值方式</option>
                <?php if(is_array($paytype)): $i = 0; $__LIST__ = $paytype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$paytype): $mod = ($i % 2 );++$i;?><option value='<?php echo ($paytype["id"]); ?>' <?php if($paytype["id"] == $get['paytype']): ?>selected='selected'<?php endif; ?>><?php echo ($paytype["payname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td height="30" width="200" class="table-textcenter">充值游戏：</td>
        <td class="huise_font">
            <select name='gid' id='gid' onChange="gotoserver()">
                <option value='0' <?php if($paygame["gid"] == 0): ?>selected='selected'<?php endif; ?>>全部游戏</option>
                <?php if(is_array($paygame)): $i = 0; $__LIST__ = $paygame;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$paygame): $mod = ($i % 2 );++$i;?><option value='<?php echo ($paygame["id"]); ?>' <?php if($paygame["id"] == $get['gid']): ?>selected='selected'<?php endif; ?>><?php echo ($paygame["gamename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <select name='sid' id='sid'>
                <option value='0'>全部服务器</option>
                <?php if(is_array($payserver)): $i = 0; $__LIST__ = $payserver;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$payserver): $mod = ($i % 2 );++$i;?><option value='<?php echo ($payserver["sid"]); ?>' <?php if($payserver["sid"] == $get['sid']): ?>selected='selected'<?php endif; ?>><?php echo ($payserver['line']); echo ($payserver['sid']); ?>区 <?php echo ($payserver['sname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
    </tr>
    <tr>
            <td height="30" width="200" class="table-textcenter">指定用户：</td>
            <td class="huise_font">
                <textarea name="uname"  cols="45" rows="8"><?php echo ($get["uname"]); ?></textarea>
            </td>
</tr>
    <tr>
            <td colspan="2" height="30">
            <span style="float:left;line-height:30px;width:45%;text-align:center;">
            <input type="submit" name="submit" value='查 询' class="btn btn-primary btn-small" /> <input type="reset" name="reset" value='重 置' class="btn btn-primary btn-small" /> <input type="button" onClick="location.href=form1.action+'&query_from='+$('#query_from').val()+'&query_to='+$('#query_to').val()+'&payt_id='+$('#payt_id').val()+'&gid='+$('#gid').val()+'&sid='+$('#sid').val()+'&user_name='+$('#user_name').val()+'&test='+$('input:checkbox[name=test]:checked').attr('value')+'&dl=csv';" value='导出CSV' class="btn btn-primary btn-small" />
            </span>
            <span style="float:right;padding-right:10px;line-height:30px;">总充值金额：<?php echo ($sumpay); ?> 元&nbsp;&nbsp;</span>
            </td>
</tr>
    </form>
</TABLE>
<br>
<table class="table table-bordered table-striped">
<thead>
  <tr>
    <th width="6%" class="table-textcenter">游戏名称</th>
    <th width="7%" class="table-textcenter">服务器名称</th>
    <th width="7%" class="table-textcenter">充值账号</th>
    <th width="6%" class="table-textcenter">充值次数</th>
    <th width="6%" class="table-textcenter">充值金额</th>
  </tr>
    </thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';" class="tabletr">    
    <td class="table-textcenter"><?php echo ($vo["gamename"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["servername"]); echo ($vo["sid"]); ?>服</td>
    <td class="table-textcenter"><?php echo ($vo["uname"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["paycount"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["paysum"]); ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  
  <?php if(empty($list)): ?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';">    
    <td height="25" class="table-textcenter" colspan="5">暂无记录！</td>
  </tr><?php endif; ?>

</table>
            <div class="pagination-i">
               <?php echo ($ShowPage); ?>
            </div>

 <div class="copyright"></div>
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