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
				  
          <div class="user_message fr"><i class="icon-wrench"></i>
		   <a href="<?php echo U('Hunfu/hunfu_add');?>" class="btn btn-primary btn-small"><font color="#FFFFFF">添加混服商</font></a>
	
		  </div>
		</form>  
          <div class="cl"></div>
        </div>
  <form name="form1" method="post" action="__URL__<?php echo U('hunfu_del');?>">
<table class="table table-bordered table-striped">
<thead>
  <tr>
    <th class="table-textcenter">选择</th>
    <th class="table-textcenter">ID</th>
    <th class="table-textcenter">UNID</th>
    <th class="table-textcenter">混服帐户</th>
    <th class="table-textcenter">混服名称</th>
    <th class="table-textcenter">分成比例</th>
    <th class="table-textcenter">开户行</th>
    <th class="table-textcenter">开户名</th>
    <th class="table-textcenter">银行帐户</th>
    <th class="table-textcenter">总注册</th>
    <th class="table-textcenter">月注册</th>
    <th class="table-textcenter">总冲值</th>
    <th class="table-textcenter">月冲值</th>
    <th class="table-textcenter">状态</th>
    <th class="table-textcenter">查看连接</th>
    <th class="table-textcenter">编辑信息</th>
  </tr>
   </thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';">    
    <td class="table-textcenter"><input type="checkbox" name="duoxuan" value="<?php echo ($vo["id"]); ?>"></td>
    <td class="table-textcenter"><?php echo ($vo["id"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["unid"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["name"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["title"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["bili"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["bank"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["bank_name"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["bank_account"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["zzhuce"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["yzhuce"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["zc"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["yc"]); ?></td>
   <td <?php if($vo["status"] == 0 ): ?>class="table-textcenter red">停止<?php else: ?>class="table-textcenter" style="color:#1b10f5;">正常<?php endif; ?></td>
    <td class="table-textcenter"><a href="<?php echo U('hunfu_editlj',array('id'=>$vo['id']));?>">查看</a></td>
    <td class="table-textcenter"><a href="<?php echo U('hunfu_edit',array('id'=>$vo['id']));?>">修改</a></td>
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