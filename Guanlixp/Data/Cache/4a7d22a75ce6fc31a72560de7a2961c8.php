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
<form action="<?php echo U('server');?>" name="Form2" method="post">		  
          <div class="user_message fr"><i class="icon-wrench"></i><input type="text" class="inputclass" name="search" value="<?php echo ($get["search"]); ?>" /> <input type="submit" name="submit" value='搜 索' class="btn btn-primary btn-small" /></div>
 </form>
          <div class="cl"></div>
        </div>

<!--<table class="pagination-i">
   <tr>
   <td>
   <a href="game.php"  class="ona">全部</a>
   <a href="?py=A" >A</a>
   <a href="?py=B" >B</a>
   <a href="?py=C" >C</a>
   <a href="?py=D" >D</a>
   <a href="?py=E" >E</a>
   <a href="?py=F" >F</a>
   <a href="?py=G" >G</a>

   <a href="?py=H" >H</a>
   <a href="?py=I" >I</a>
   <a href="?py=J" >J</a>
   <a href="?py=K" >K</a>
   <a href="?py=L" >L</a>
   <a href="?py=M" >M</a>

   <a href="?py=N" >N</a>
   <a href="?py=O" >O</a>
   <a href="?py=P" >P</a>
   <a href="?py=Q" >Q</a>
   <a href="?py=R" >R</a>
   <a href="?py=S" >S</a>

   <a href="?py=T" >T</a>
   <a href="?py=W" >W</a>
   <a href="?py=X" >X</a>
   <a href="?py=Y" >Y</a>
   <a href="?py=Z" >Z</a>   </td>
   </tr>
</TABLE> -->
  <form action="<?php echo U('server_del');?>" method="post" name="form1">
<table class="table table-bordered table-striped">
<thead>
  <tr>
    <th class="table-textcenter">选择</th>
    <th class="table-textcenter">游戏ID</th>
    <th class="table-textcenter">服务器ID</th>
    <th class="table-textcenter">合区ID</th>
    <th class="table-textcenter">游戏名称</th>
    <th class="table-textcenter">服务器名称</th>
    <th class="table-textcenter">是否混服</th>
	<th class="table-textcenter">混服ID</th>
    <th class="table-textcenter">游戏地址</th>
    <th class="table-textcenter">开服时间</th>
    <th class="table-textcenter">线路</th>
    <th class="table-textcenter">自定义属性</th>
    <th class="table-textcenter">充值</th>
    <th class="table-textcenter">显示</th>
    <th class="table-textcenter">状态</th>
    <th class="table-textcenter">编辑</th>
  </tr>
</thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';">    
    <td class="table-textcenter"><input type="checkbox" name="duoxuan" value="<?php echo ($vo["id"]); ?>"></td>
    <td nowrap class="table-textcenter"><?php echo ($vo["gid"]); ?></td>
    <td nowrap class="table-textcenter"><?php echo ($vo["sid"]); ?></td>
	<?php if($vo["coop_sid"] != 0 ): ?><td nowrap class="table-textcenter red" ><?php echo ($vo["coop_sid"]); ?></td>
	<?php else: ?>
    <td nowrap class="table-textcenter"></td><?php endif; ?>
    <td nowrap class="table-textcenter"><?php echo ($vo["gamename"]); ?></td>
    <td nowrap class="table-textcenter"><?php echo ($vo["servername"]); ?></td>
	<td nowrap class="table-textcenter"><?php if($vo["ismix"] == 1 ): ?>是<?php else: ?> 否<?php endif; ?></td>
    <td nowrap class="table-textcenter"><font color="red">G:<?php echo (json_de($vo["extend"],'gameid')); ?> / S:<?php echo (json_de($vo["extend"],'mid')); ?></font></td>
    <td nowrap class="table-textcenter"><a href="<?php echo ($vo["gameurl"]); ?>" target="_blank">进入游戏</a></td>
    <td nowrap class="table-textcenter"><?php echo (date('Y-m-d H:i:s',$vo["begintime"])); ?></td>
    <td nowrap class="table-textcenter"><?php echo ($vo["line"]); ?></td>
    <td nowrap class="table-textcenter"><?php echo ($vo["flag"]); ?></td>
    <td <?php if($vo["ispay"] == 0 ): ?>class="table-textcenter red"<?php else: ?>class="table-textcenter"<?php endif; ?>><?php echo ($vo["ispay"]); ?></td>
    <td <?php if($vo["isdisplay"] == 0 ): ?>class="table-textcenter red"<?php else: ?>class="table-textcenter"<?php endif; ?>><?php echo ($vo["isdisplay"]); ?></td>
    <td <?php if($vo["status"] == 0 ): ?>class="table-textcenter red"<?php else: ?>class="table-textcenter"<?php endif; ?>><?php echo ($vo["status"]); ?></td>
    <td class="table-textcenter"><a href="<?php echo U('server_edit',array('id'=>$vo['id']));?>">修改</a></td>
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
<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>

</body>
</html>