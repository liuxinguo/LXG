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
<form action="<?php echo U('game');?>" name="Form2" method="post">
          <div class="user_message fr"><i class="icon-wrench"></i><input type="text" class="inputclass" name="search" value="<?php echo ($get["search"]); ?>" /> <input type="submit" name="submit" value='搜 索' class="btn btn-primary btn-small" /></div>
		  </form>
          <div class="cl"></div>
        </div>


<table class="table table-bordered table-striped">
<thead>
  <tr >

    <th class="table-textcenter">标签</th>
    <th class="table-textcenter">gid</th>
    <th class="table-textcenter">游戏名称</th>
	
    <th class="table-textcenter">首冲状态</th>
    <th class="table-textcenter">首冲福利</th>
    <th class="table-textcenter">等级状态</th>
	
    <th class="table-textcenter">等级任务</th>
    <th class="table-textcenter">单笔返利状态</th>
    <th class="table-textcenter">VIP返利编辑</th>
  </tr>
  </thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';">    

    <td class="table-textcenter"><?php echo ($vo["tag"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["id"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["gamename"]); ?></td>
    <td class="table-textcenter">
	<?php if($vo["sckg"] == 1 ): ?><input type="button" value="开启中" onclick="javascrtpt:window.location.href='<?php echo U('rw_kg',array('id'=>$vo['id'] ,'sckg'=>0));?>'">
	<?php else: ?>
		<input type="button" value="关闭中" onclick="javascrtpt:window.location.href='<?php echo U('rw_kg',array('id'=>$vo['id'] ,'sckg'=>1));?>'"><?php endif; ?>

	</td>
    <td class="table-textcenter">
	
	<input type="button" value="编辑" onclick="javascrtpt:window.location.href='<?php echo U('scrw_edit',array('gid'=>$vo['id']));?>'" class="btn btn-primary btn-small">  
	</td>
    <td class="table-textcenter">
	<?php if($vo["djkg"] == 1 ): ?><input type="button" value="开启中" onclick="javascrtpt:window.location.href='<?php echo U('rw_kg',array('id'=>$vo['id'] ,'djkg'=>0));?>'">
	<?php else: ?>
		<input type="button" value="关闭中" onclick="javascrtpt:window.location.href='<?php echo U('rw_kg',array('id'=>$vo['id'] ,'djkg'=>1));?>'"><?php endif; ?>

	</td>
    <td class="table-textcenter">
	<input type="button" value="管理" onclick="javascrtpt:window.location.href='<?php echo U('djrw_list',array('gid'=>$vo['id']));?>'" class="btn btn-primary btn-small">
	<input type="button" value="添加" onclick="javascrtpt:window.location.href='<?php echo U('djrw_add',array('gid'=>$vo['id']));?>'" class="btn btn-primary btn-small">
	</td>
	</td>
    <td class="table-textcenter">
	<?php if($vo["dbkg"] == 1 ): ?><input type="button" value="显示中" onclick="javascrtpt:window.location.href='<?php echo U('rw_kg',array('id'=>$vo['id'] ,'dbkg'=>0));?>'">
	<?php else: ?>
		<input type="button" value="隐藏中" onclick="javascrtpt:window.location.href='<?php echo U('rw_kg',array('id'=>$vo['id'] ,'dbkg'=>1));?>'"><?php endif; ?>
    <td class="table-textcenter">
	<?php if($vo["vipkg"] == 1 ): ?><input type="button" value="显示中" onclick="javascrtpt:window.location.href='<?php echo U('rw_kg',array('id'=>$vo['id'] ,'vipkg'=>0));?>'">
	<?php else: ?>
		<input type="button" value="隐藏中" onclick="javascrtpt:window.location.href='<?php echo U('rw_kg',array('id'=>$vo['id'] ,'vipkg'=>1));?>'"><?php endif; ?>

	</td>

  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>

          
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