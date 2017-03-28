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
          <div class="user_message fr"><i class="icon-wrench"></i><?php echo (L("configuring_site")); ?></div>
          <div class="cl"></div>
        </div>

  <table class="table set_table">
    <form action="<?php echo U('gamepublish');?>" name="Form2" method="post">
    <tr>
            <td height="30" width="117" valign="middle">游戏：</td>
            <td width="1053" class="huise_font">
			<select name="game">
			<option value="">选择游戏</option>
			<?php if(is_array($game)): $i = 0; $__LIST__ = $game;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($get_game == $vo[id]): ?>selected="selected"<?php endif; ?> ><?php echo ($vo["gamename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
	  </td>
	</tr>
    <tr>
        <td height="30" width="117" valign="middle">类别：</td>
        <td class="huise_font">
            <select name="cate">
			<option value="">选择类别</option>
			<?php if(is_array($cate)): $k = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><option value="<?php echo ($k); ?>" <?php if($get_cate == $k): ?>selected="selected"<?php endif; ?> ><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
    </tr>
    <tr>
      <td colspan="2" height="30">
            <input type="submit" name="submit" value='查 询' class="btn btn-primary btn-small" /></td>
</tr>
    </form>
</TABLE>
<br>

 <form name="form1" method="post" action="<?php echo U('gamepublish_del');?>">
<table class="table table-bordered table-striped">
<thead>
  <tr>
    <th class="table-textcenter">选择</th>
    <th class="table-textcenter">游戏</th>
    <th class="table-textcenter">类别</th>
    <th class="table-textcenter">标题</th>
    <th class="table-textcenter">颜色</th>
    <th class="table-textcenter">作者</th>
	<th class="table-textcenter">状态</th>
    <th class="table-textcenter">日期</th>
	<th class="table-textcenter">编辑</th>
  </tr>
     </thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';" class="tabletr">    
    <td class="table-textcenter"><input type="checkbox" name="duoxuan" value="<?php echo ($vo["id"]); ?>" ></td>
    <td class="table-textcenter"><?php echo ($tpl_game[$vo[gid]]); ?></td>
    <td class="table-textcenter"><?php echo ($cate[$vo[cate]]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["title"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["color"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["author"]); ?></td>
	<td class="table-textcenter"><?php if($vo["status"] == 1): ?>显示 <?php else: ?> 审核<?php endif; ?></td>
    <td nowrap class="table-textcenter"><?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></td>
	<td width="6%" class="table-textcenter"><a href="<?php echo U('gamepublishedit', array('id'=>$vo[id]));?>">修改</a></td>
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