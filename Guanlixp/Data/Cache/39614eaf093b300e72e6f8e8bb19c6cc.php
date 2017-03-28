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
          <div class="user_message fr"><i class="icon-wrench"></i><?php echo (L("configuring_site")); ?></div>
          <div class="cl"></div>
        </div>
  <form action="__SELF__" method="post" name="Form1" >
   <input type="hidden" name="act" value="<?php echo ($item); ?>">		
     	<table class="table table-bordered table-striped">

   	<thead>
                	<tr>
                    	<th class="table-textcenter" align="right">
                       说明： 
                      </th>
                        <th class="table-textcenter" align="">&nbsp;一次性设置全站官网子域名，便于收录与访问，设置后可用像： wz.9iy.com 此类域名访问.需要服务器支持泛解吸。</th>
                  </tr>
                </thead>


</table>
            </td>
   <p class="border_top"> <input type="submit" class="btn btn-primary btn-small" name="Submit" id="form1" value="确认更新"> </p>
        <div class="copyright"></div>

  </form>
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