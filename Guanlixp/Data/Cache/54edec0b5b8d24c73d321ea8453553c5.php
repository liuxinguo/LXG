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
<form action="<?php echo U('card_detail');?>" name="Form2" method="post">          
<div class="user_message fr"><i class="icon-wrench"></i><input type="text" class="inputclass" name="search" value="<?php echo ($get["search"]); ?>" /> <input type="submit" name="submit" value='搜 索' class="btn btn-primary btn-small" /></div>
</form>
          <div class="cl"></div>
        </div>

<!--<table class="pagination-i">
   <tr>
   <td height="25" >
   <a href=""  class="ona">全部</a>
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
<form action="<?php echo U('card_del');?>" method="post" name="form1">
<table class="table table-bordered table-striped">
<thead>
  <tr>
    <th class="table-textcenter">选择</th>
    <th class="table-textcenter">新手卡ID</th>
    <th class="table-textcenter">游戏GID</th>
    <th class="table-textcenter">游戏名称</th>
    <th class="table-textcenter">新手卡标识</th>
    <th class="table-textcenter">剩余</th>
    <th class="table-textcenter">新手卡标题</th>
    <th class="table-textcenter">新手卡简介</th>
    <th class="table-textcenter">编辑</th>
  </tr>
</thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr> 
    <td class="table-textcenter"><input type="checkbox" name="duoxuan" value="<?php echo ($vo["id"]); ?>"></td>   
    <td class="table-textcenter"><?php echo ($vo["id"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["gid"]); ?></td>
    <td align="center"><?php echo ($vo["gamename"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["title"]); ?></td>
    <td class="table-textcenter"><?php if(($vo["remain"]) < "10"): ?><font color='red'><?php echo ($vo["remain"]); ?></font><?php else: echo ($vo["remain"]); endif; ?></td>
    <td class="table-textcenter"><?php echo ($vo["content"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["guide"]); ?></td>
    <td class="table-textcenter"><a href="<?php echo U('card_detail_edit',array('id'=>$vo['id']));?>">修改</a></td>
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