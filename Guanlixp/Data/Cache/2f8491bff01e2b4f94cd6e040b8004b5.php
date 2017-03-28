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
        
		
          <div class="cl"></div>
        </div>
 <table class="table set_table">
  
    <form action="<?php echo U('fuli/znq',array('begintime'=>$Think['begintime'],'endtime'=>$Think['endtime']));?>" name="Form2" method="post">
<tr>
            <td height="30" width="200" class="table-textcenter">抽奖时间：</td>
            <td class="huise_font"><input type="text" name="begintime" id="begintime" value="<?php echo (date("Y-m-d",$get["begintime"])); ?>" class="inputclass Wdate"  onfocus="WdatePicker()" /> - <input type="text" name="endtime" id="endtime" value="<?php echo (date("Y-m-d",$get["endtime"])); ?>" class="inputclass Wdate"  onfocus="WdatePicker()" /></td>
</tr>

    <tr>
            <td height="30" width="200" class="table-textcenter">抽奖用户：</td>
            <td class="huise_font"><input type="text" class="inputclass" name="name" value="<?php echo ($get["name"]); ?>" /></td>
    </tr>
    <tr>
            <td height="30" width="200" class="table-textcenter">抽奖类型：</td>
            <td class="huise_font">
            <select name='paytype' id='paytype'>
                <option value='0'>全部</option>
                <option value='1' <?php if(1 == $get['paytype']): ?>selected='selected'<?php endif; ?>>免费</option>
                <option value='2' <?php if(2 == $get['paytype']): ?>selected='selected'<?php endif; ?>>平台币</option>
            </select>
              
            </td>
    </tr>
    <tr>
            <td height="30" width="200" class="table-textcenter">抽奖信息：</td>
            <td class="huise_font">
            <select name='wid' id='wid'>
                <option value='0'>全部</option>
                <option value='1' <?php if(1 == $get['wid']): ?>selected='selected'<?php endif; ?>>2017RMB</option>
                <option value='2' <?php if(2 == $get['wid']): ?>selected='selected'<?php endif; ?>>1888平台币</option>
                <option value='3' <?php if(3 == $get['wid']): ?>selected='selected'<?php endif; ?>>王者荣耀1980点券</option>
                <option value='4' <?php if(4 == $get['wid']): ?>selected='selected'<?php endif; ?>>雨伞</option>
                <option value='5' <?php if(5 == $get['wid']): ?>selected='selected'<?php endif; ?>>腾讯视频会员1个月</option>
                <option value='6' <?php if(6 == $get['wid']): ?>selected='selected'<?php endif; ?>>自拍杆</option>
                <option value='7' <?php if(7 == $get['wid']): ?>selected='selected'<?php endif; ?>>QQ会员1个月</option>
                <option value='8' <?php if(8 == $get['wid']): ?>selected='selected'<?php endif; ?>>20平台币</option>
            </select>
            </td>
    </tr>
            <td colspan="2" height="30">
            <span style="float:left;line-height:30px;width:45%;text-align:center;">
            <input type="submit" name="submit" value='查 询' class="btn btn-primary btn-small" /> 
            </span>
          
            </td>
</tr>
    </form>
</TABLE>
<br>
  <form action="<?php echo U('danbirw_del');?>" method="post" name="form1">
<table class="table table-bordered table-striped">
<thead>
  <tr >
    <th class="table-textcenter" width="80px">选择</th>
    <th class="table-textcenter" width="80px">奖品ID</th>
    <th class="table-textcenter">账号</th>
    <th class="table-textcenter">获奖信息</th>
    <th class="table-textcenter" width="80px">抽奖类型</th>
    <th class="table-textcenter">用户IP</th>
    <th class="table-textcenter">抽奖时间</th>

  </tr>
  </thead>

  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';">    
   <td class="table-textcenter"><input type="checkbox" name="duoxuan" value="<?php echo ($vo["id"]); ?>"></td>
    <td class="table-textcenter"><?php echo ($vo["wid"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["name"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["prize"]); ?></td>
    <td class="table-textcenter"><?php if(($vo['paytype']) == "1"): ?><font color="red">免费</font><?php else: ?>平台币<?php endif; ?></td>
    <td class="table-textcenter"><?php echo ($vo["ip"]); ?></td>
    <td class="table-textcenter"><?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

   <input type="hidden" name="duoxuanHidden" id="duoxuanHidden" value="" />
       <input type="hidden" name="piliangHidden" id="piliangHidden" value="" />
</table>
  </form>
           <div class="batch_edit">
            <span><input name="" type="checkbox" onclick=CheckAll('selectAll',this)></span>
            <select class="input-small" name="piliang" onChange="setPL();">
            	<option value="0">批量设置</option>
                <option value="3">批量删除</option>
            </select>
            </div>
            <div class="pagination-i">
               <?php echo ($ShowPage); ?>
            </div>

 <div class="copyright"></div>
</div>

<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>

</body>
</html>