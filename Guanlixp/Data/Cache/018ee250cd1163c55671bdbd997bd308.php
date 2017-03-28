<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo (L("welcome")); ?></title>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jshack.js"></script>
<link href="__ADMIN__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/Admin/Css/style.css" rel="stylesheet" type="text/css" />

        <div class="page-header">
          <h3 class="fl"><?php echo ($act_title); ?></h3>  
          <div class="user_message fr"><i class="icon-wrench"></i><a class="btn btn-primary btn-small" href="<?php echo U('gamejiekou_add');?>">添加接口</a></div>
          <div class="cl"></div>
        </div>
        <div class="minbox">
  <form action="submit" method="post" name="Form1">		
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th class="table-textcenter">编号</th>
      <th class="table-textcenter">接口名称</th>
      <th class="table-textcenter">标签</th>
      <th class="table-textcenter">混服标识</th>
      <th class="table-textcenter">登陆地址</th>
      <th class="table-textcenter">冲值地址</th>
      <th class="table-textcenter">备注</th>
      <th class="table-textcenter">编辑</th>
    </tr>
	  </thead>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';">
        <td class="table-textcenter"><?php echo ($i); ?></td>
        <td align="center"><?php echo ($vo["name"]); ?></td>
        <td class="table-textcenter"><?php echo ($vo["bs"]); ?></td>
        <td class="table-textcenter"><?php echo ($vo["unid"]); ?></td>
        <td align="left" valign="middle"><?php echo ($vo["loginurl"]); ?></td>
        <td align="left" valign="middle"><?php echo ($vo["payurl"]); ?></td>
        <td class="table-textcenter"><?php echo ($vo["beizhu"]); ?></td>
        <td class="table-textcenter"><a href="<?php echo U('gamejiekou_edit',array('id'=>$vo['id']));?>">修改</a></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>
 </form>

            <div class="pagination-i">
                <?php echo ($ShowPage); ?>
            </div>

        <p class="border_top"> <a class="btn btn-primary btn-small" onClick="formSubmit();">保存修改</a> </p>
        <div class="copyright"></div>
      </div>

<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>
</body>
</html>