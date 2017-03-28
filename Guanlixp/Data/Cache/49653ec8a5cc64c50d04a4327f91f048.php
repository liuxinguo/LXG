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
          <div class="user_message fr"><i class="icon-wrench"></i><select name='gid' id='gid' onChange="changegame(this)">
			<option value='0'>==选择游戏进行编辑==</option>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["gid"]); ?>'><?php echo ($vo["gamename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select></div>
          <div class="cl"></div>
        </div>

 <form name="form1" method="post" action="<?php echo U('gamesitelist_del');?>">
<table class="table table-bordered table-striped">
<thead>
  <tr>
    <th width="45"  class="table-textcenter" >选择</th>
    <th width="111" class="table-textcenter">gid</th>
    <th width="253" class="table-textcenter">游戏</th>
    <th width="226" class="table-textcenter">上线时间</th>
    <th width="278" class="table-textcenter">最后修改时间</th>
    <th width="212" class="table-textcenter">编辑</th>
  </tr>
     </thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';" class="tabletr">
      <td class="table-textcenter"><input type="checkbox" name="duoxuan" value="<?php echo ($vo["gid"]); ?>" ></td>
      <td class="table-textcenter"><?php echo ($vo["gid"]); ?></td>
      <td class="table-textcenter"><?php echo ($vo["gamename"]); ?></td>
      <td class="table-textcenter"><?php echo ($vo["addtime"]); ?></td>
      <td class="table-textcenter"><?php echo ($vo["modifytime"]); ?></td>
      <td class="table-textcenter"><a href="<?php echo U('gamesitelist_edit',array('gid'=>$vo['gid']));?>">修改</a></td>
  
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  <?php if(empty($list)): ?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';">
      <td height="25" class="table-textcenter" colspan="10">暂无记录！</td>
    </tr><?php endif; ?>
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
			
        
 <div class="copyright"></div>
</div>
      <!--end Right Content-->  


<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>

</body>
</html>