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
	<form action="<?php echo U('friendlink');?>" name="Form2" method="post">
          <div class="user_message fr"><i class="icon-wrench"></i><input type="text" class="inputclass" name="search" value="<?php echo ($get["search"]); ?>" /> <input type="submit" name="submit" value='搜 索' class="btn btn-primary btn-small" /></div>
	</form>
          <div class="cl"></div>
        </div>

  <form action="<?php echo U('friendlink_del');?>" method="post" name="form1">
<table class="table table-bordered table-striped">
<thead>
  <tr >
    <td class="table-textcenter">选择</td>
    <th class="table-textcenter"><a href="?sort=desc">排序</a></th>
    <th class="table-textcenter">ID</th>
    <th class="table-textcenter">链接名称</th>
    <th class="table-textcenter">显示位置</th>
    <th class="table-textcenter">所属游戏</th>
    <th class="table-textcenter">链接属性</th>
    <th class="table-textcenter">LOGO</th>
    <th class="table-textcenter">链接地址</th>
    <th class="table-textcenter">联系QQ</th>
    <th class="table-textcenter">添加时间</th>
    <th class="table-textcenter">显示</th>
    <th class="table-textcenter">状态</th>
    <th class="table-textcenter">编辑</th>
  </tr>
</thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>    
    <td class="table-textcenter" ><input type="checkbox" name="duoxuan" value="<?php echo ($vo["id"]); ?>"></td>
    <td class="table-textcenter f_red" ><?php echo ($vo["sort"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["id"]); ?></td>
    <td nowrap class="table-textcenter"><?php echo ($vo["webname"]); ?></td>
    <td class="table-textcenter"><?php if(($vo['flag']) == "1"): ?>平台首页<?php else: ?>游戏官网<?php endif; ?></td>
    <td class="table-textcenter"><?php echo ($vo["gamename"]); ?></td>
    <td class="table-textcenter"><?php if(($vo['type']) == "1"): ?>文字<?php else: ?>图片<?php endif; ?></td>
    <td nowrap class="table-textcenter"><a href="<?php echo ($vo["pic"]); ?>" target="_blank">查看图片</a></td>
    <td nowrap class="table-textcenter"><a href="<?php echo ($vo["website"]); ?>" target="_blank">查看链接</a></td>
    <td class="table-textcenter"><?php echo ($vo["qq"]); ?></td>
    <td nowrap class="table-textcenter"><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td>
    <td class="table-textcenter"><?php echo ($vo["isdisplay"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["status"]); ?></td>
    <td class="table-textcenter"><a href="<?php echo U('friendlink_edit',array('id'=>$vo['id']));?>">修改</a></td>
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
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>

</body>
</html>