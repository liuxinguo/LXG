<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jshack.js"></script>
<link href="__ADMIN__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/Admin/Css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8"  src="/Statics/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8"  src="/Statics/kindeditor/lang/zh_CN.js"></script>
<script language="javascript" type="text/javascript" src="/Statics/Datepicker/WdatePicker.js"></script>
<title><?php echo (L("welcome")); ?></title>
<!--全选反选JS-->
<script>
function CheckAll(value,obj)  {
var form=document.getElementsByTagName("form")
 for(var i=0;i<form.length;i++){
    for (var j=0;j<form[i].elements.length;j++){
    if(form[i].elements[j].type=="checkbox"){ 
    var e = form[i].elements[j]; 
    if (value=="selectAll"){e.checked=obj.checked}     
    else{e.checked=!e.checked;} 
       }
    }
 }
}

function setPL() {
	j = 0;
	for ( i = 0; i < document.getElementsByName("duoxuan").length; i++){
		if (document.getElementsByName("duoxuan").item(i).checked) {
			if ( j == 0 ) {
				document.getElementById("duoxuanHidden").value = document.getElementsByName("duoxuan").item(i).value;
			} else {
				document.getElementById("duoxuanHidden").value = document.getElementById("duoxuanHidden").value + "," + document.getElementsByName("duoxuan").item(i).value;
			}
			j++;
		}
	}
	document.getElementById("piliangHidden").value = document.getElementsByName("piliang").item(0).value;
	if ( j==0 || document.getElementById("piliangHidden").value==0 ) {
		return;
	}
	document.form1.submit();
}
</script>
</head>
<body>
<div class="content">
        <div class="page-header">
          <h3 class="fl"><?php echo ($act_title); ?></h3> 
     <form action="<?php echo U('qudao_tongji');?>" name="Form2" method="post">		  
          <div class="user_message fr"><i class="icon-wrench"></i><input type="text" class="inputclass" name="search" value="<?php echo ($search); ?>" /> <input type="submit" name="submit" value='搜 索' class="btn btn-primary btn-small" /></div>
		</form>  		   
          <div class="user_message fr"><i class="icon-wrench"></i><a href="<?php echo U('Setting/qudao_add');?>" class="btn btn-primary btn-small"><font color="#FFFFFF">添加渠道</font></a> </div>
	
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

    <form action="<?php echo U('qudao_tongji',array('begintime'=>$Think['begintime'],'endtime'=>$Think['endtime']));?>" name="Form2" method="post">
    <tr>
            <td height="30" width="200" class="table-textcenter">时间：</td>
            <td class="huise_font"><input type="text" name="begintime" id="begintime" value="<?php echo (date("Y-m-d",$get["begintime"])); ?>" class="inputclass Wdate"  onfocus="WdatePicker()" /> - <input type="text" name="endtime" id="endtime" value="<?php echo (date("Y-m-d",$get["endtime"])); ?>" class="inputclass Wdate"  onfocus="WdatePicker()" /></td>
</tr>
    <tr>
        <td height="30" width="200" class="table-textcenter">游戏：</td>
        <td class="huise_font">
            <select name='gid' id='gid' onChange="gotoserver()">
                <option value='0' <?php if($paygame["id"] == 0): ?>selected='selected'<?php endif; ?>>全部游戏</option>
                <?php if(is_array($paygame)): $i = 0; $__LIST__ = $paygame;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$paygame): $mod = ($i % 2 );++$i;?><option value='<?php echo ($paygame["id"]); ?>' <?php if($paygame["id"] == $get['gid']): ?>selected='selected'<?php endif; ?>><?php echo ($paygame["gamename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <select name='sid' id='sid'>
                <option value='0'>全部服务器</option>
                <?php if(is_array($payserver)): $i = 0; $__LIST__ = $payserver;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$payserver): $mod = ($i % 2 );++$i;?><option value='<?php echo ($payserver["sid"]); ?>' <?php if($payserver["sid"] == $get['sid']): ?>selected='selected'<?php endif; ?>><?php echo ($payserver['line']); echo ($payserver['sid']); ?>区 <?php echo ($payserver['servername']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td height="30" width="200" class="table-textcenter">会长账号：</td>
        <td class="huise_font">
    
              <input type="text" class="inputclass" name="mname" value="<?php echo ($get["mname"]); ?>" />
        </td>
    </tr>

    
    <tr>
            <td height="30" width="200" class="table-textcenter">指定来源：</td>
            <td class="huise_font"><input type="text" class="inputclass" name="referer" value="<?php echo ($get["referer"]); ?>" />*暂时没用</td>
    </tr>
    <tr>
            <td colspan="2" height="30">
            <span style="float:left;line-height:30px;width:45%;text-align:center;">
            <input type="submit" name="submit" value='查 询' class="btn btn-primary btn-small" /> <input type="reset" name="reset" value='重 置' class="btn btn-primary btn-small" />
			<input type="submit" name="daochu" value="导出数据" class="btn btn-primary btn-small">
            </span>
                    <span style="float:right;padding-right:10px;line-height:30px;">总冲值：<?php echo ($zf["summoneysum"]); ?> 元，总提成：<?php echo ($zf["sumticheng"]); ?> 元，总内充成本：<?php echo ($zf["sumncmoney"]); ?> 元，总打款：<font color="red"><b><?php echo ($zf["sumyingde"]); ?> </b></font>元&nbsp;&nbsp;</span>
            
            </td>
</tr>
    </form>
</TABLE>
<br>
<table class="table table-bordered table-striped">
<thead>
  <tr>
    <th class="table-textcenter">渠道ID</th>
    <th class="table-textcenter">渠道名称</th>
    <th class="table-textcenter">工会名称</th>
    <th class="table-textcenter">注册数(IP)</th>
    <th class="table-textcenter">付费人数</th>
	<th class="table-textcenter">充值总额</th>
	<th class="table-textcenter">分成比例</th>
	<th class="table-textcenter">提成金额</th>
	<th class="table-textcenter">代充成本</th>
	<th class="table-textcenter">应得金额</th>
    <th class="table-textcenter">收款人</th>
	<th class="table-textcenter">收款账号</th>
    <th class="table-textcenter">开户行</th>
	<th class="table-textcenter">渠道连接</th>
	<th class="table-textcenter">充值详情</th>
	<th class="table-textcenter">注册详情</th>
	<th class="table-textcenter">渠道设置</th>
  </tr>
   </thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';">    
    <td class="table-textcenter"><?php echo ($vo["id"]); ?></td>
    <td align="center"><?php echo ($vo["mname"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["name"]); ?></td>
	<td class="table-textcenter"><?php echo ($vo["regcs"]); ?>(<?php echo ($vo["regip"]); ?>)</td>
	<td class="table-textcenter"><?php echo ($vo["paycs"]); ?></td>
	<td class="table-textcenter"><?php echo ($vo["moneysum"]); ?></td>
	<td class="table-textcenter"><?php echo ($vo["bili"]); ?></td>
	<td class="table-textcenter"><?php echo ($vo["ticheng"]); ?></td>
	<td class="table-textcenter"><?php echo ($vo["ncmoney"]); ?></td>
	<td class="table-textcenter"><font color="red"><?php echo ($vo["yingde"]); ?></font></td>
    <td class="table-textcenter"><?php echo ($vo["payee"]); ?></td>
	<td align="center"><?php echo ($vo["cardno"]); ?></td>
	<td align="center"><?php echo ($vo["bankaccount"]); ?></td>
	<td class="table-textcenter">查看</td>
	<td class="table-textcenter">查看</td>
	<td class="table-textcenter">查看</td>
	<td class="table-textcenter"><a href="<?php echo U('qudao_edit',array('id'=>$vo['id']));?>">修改</a></td>
	
	
<!--    <td class="table-textcenter"><?php echo (date('Y-m-d H:i:s',$vo["lastlogin_time"])); ?></td>
    <td class="table-textcenter"><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td> -->
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>
 
            <div class="batch_edit"></div>
			
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