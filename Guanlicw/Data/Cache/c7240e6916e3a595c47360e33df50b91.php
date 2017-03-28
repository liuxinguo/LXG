<?php if (!defined('THINK_PATH')) exit();?><!doctype html><html><head><meta charset="utf-8"><script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script><script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script><script type="text/javascript" src="__ADMIN__/Admin/Js/jshack.js"></script><link href="__ADMIN__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" /><link href="__ADMIN__/Admin/Css/style.css" rel="stylesheet" type="text/css" /><title><?php echo (L("welcome")); ?></title><!--全选反选JS--><script>function CheckAll(value,obj)  {
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
</script></head><body><div class="content"><div class="page-header"><h3 class="fl"><?php echo ($act_title); ?></h3><div class="user_message fr"><i class="icon-wrench"></i></div><div class="cl"></div></div><table class="table table-bordered table-striped"><thead><tr><th class="table-textcenter">渠道MID</th><th class="table-textcenter">渠道名称</th><th class="table-textcenter">IP</th><th class="table-textcenter">pv</th><th class="table-textcenter">注册人数</th><th class="table-textcenter">注册成本</th><th class="table-textcenter">付费人数</th><th class="table-textcenter">推广成本</th><th class="table-textcenter">充值总额</th><th class="table-textcenter">回款率</th><th class="table-textcenter">利润率</th><th class="table-textcenter">次日登录</th><th class="table-textcenter">次日留存率</th><th class="table-textcenter">3天登录</th><th class="table-textcenter">3天留存率</th><th class="table-textcenter">7天登录</th><th class="table-textcenter">7天留存率</th></tr></thead><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';"><td class="table-textcenter"><?php echo ($vo["mid"]); ?></td><td align="center"><?php echo ($vo["mname"]); ?></td><td class="table-textcenter"></td><td class="table-textcenter"></td><td class="table-textcenter"><?php echo ($vo["zong"]); ?></td><td class="table-textcenter"></td><td class="table-textcenter"></td><td class="table-textcenter"><?php echo ($vo["money"]); ?></td><td class="table-textcenter"><?php echo ($vo["tong"]); ?></td><td class="table-textcenter"></td><td class="table-textcenter"></td><td class="table-textcenter"></td><td class="table-textcenter"></td><td class="table-textcenter"></td><td class="table-textcenter"></td><td class="table-textcenter"></td><td class="table-textcenter"></td><!--    <td class="table-textcenter"><?php echo (date('Y-m-d H:i:s',$vo["lastlogin_time"])); ?></td><td class="table-textcenter"><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td> --></tr><?php endforeach; endif; else: echo "" ;endif; ?></table><div class="batch_edit"></div><div class="pagination-i"><?php echo ($ShowPage); ?></div><div class="copyright"></div></div><!--end Right Content--><script type="text/javascript">function formSubmit() {
	//alert(document.form1.action);
	document.form1.submit();
}

</script><script type="text/javascript">    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script></body></html>