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
</head>
<body>
<div class="content">
        <div class="page-header">
          <h3 class="fl"><?php echo ($act_title); ?></h3>  
          <div class="user_message fr"><i class="icon-wrench"></i><a href="<?php echo U('gamezhuti_add');?>" class="btn btn-primary btn-small"><font color="#FFFFFF">添加主题</font></a></div>
          <div class="cl"></div>
        </div>


  <form action="submit" method="post" name="Form1">
<table class="table table-bordered table-striped">
<thead>
    <tr>
      <th class="table-textcenter">编号</th>
      <th class="table-textcenter">主题名称</th>
      <th class="table-textcenter">标签</th>
      <th class="table-textcenter">路径</th>
      <th class="table-textcenter">备注</th>
      <th class="table-textcenter">编辑</th>
    </tr>
   </thead>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';">
        <td class="table-textcenter"><?php echo ($i); ?></td>
        <td class="table-textcenter"><?php echo ($vo["name"]); ?></td>
        <td class="table-textcenter"><?php echo ($vo["bs"]); ?></td>
        <td class="table-textcenter"><?php echo ($volijing); ?></td>
        <td class="table-textcenter"><?php echo ($vo["beizhu"]); ?></td>
        <td class="table-textcenter"><a href="<?php echo U('gamezhuti_edit',array('id'=>$vo['id']));?>">修改</a></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</form>
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