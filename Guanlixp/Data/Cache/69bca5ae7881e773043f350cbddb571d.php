<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo (L("welcome")); ?></title>

<link href="__ADMIN__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />


<!--/*调用后台综合样式表*/-->
<script src="__ADMIN__/Admin/Js/jquery.js"></script><!--/*调用后JS文件*/-->
<script src="__ADMIN__/Admin/Js/jquery.form.js"></script><!--/*调用后JS文件*/-->
<script src="__ADMIN__/Admin/Js/bootstrap-modal.js"></script><!--/*调用后JS，弹出文件*/-->


<script type="text/javascript">
function right_load(url) {
	alert(url);
	$("#right").load(url);
}
</script>

    <h1 class="logo"><a href="<?php echo U('Index/home');?>" title="leyouCMS Admin" target="myframe">leyouCMS Admin</a></h1>
    <div class="mainnav">
      <ul class="unstyled">
       
      </ul>
 </div>
    <!--end mainnav-->
<div class="user_info">
      <ul class="nav nav-pills pull-right">
        <li class="dropdown" id="menu1"> <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1"> <i class="icon-user"></i>  用户名<?php echo (session('adminname')); ?> <b class="caret"></b> </a>
          <ul class="dropdown-menu">
            <li><a href="#">后台首页</a></li>
            <li><a href="#myModa2" role="button" data-toggle="modal">修改密码</a></li>
			 <li><a href="<?php echo U('Public/delete_cache');?>">更新缓存</a></li>
            <li class="divider"></li>
            <li><a href="/" target="_blank">官方网站</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo U('Public/logout');?>">安全退出</a></li>
          </ul>
        </li>
      </ul>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<!--修改密码开始-->
    
    
<div class="modal hide" id="myModa2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">修改密码</h3>
  </div>
  <div class="modal-body">
  	<div class="change_password">
    	<table width="100%">
        	<tr>
            	<td width="33%" align="right"><span class="cName">输入原密码</span></td>
                <td width="67%"><input class="span3" name="adminpassword" id="adminpassword" type="text" /></td>
            </tr>
            <tr>
            	<td align="right"><span class="cName">输入新密码</span></td>
                <td><input class="span3" name="password" id="password" type="text" /></td>
            </tr>
            <tr>
            	<td align="right"><span class="cName">确认新密码</span></td>
                <td><input class="span3" name="password1" id="password1" type="text" /></td>
            </tr>
        </table>
    </div>
  </div>
    <div class="modal-footer"> 
	<button type="button" class="btn btn-primary" onclick="login();">修改</</button>
   
  </div>
  </form>
</div>
<!--出错弹出窗口-->
<div class="modal hide" id="myModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>修改提示</h3>
  </div>
  <div class="modal-body"> <span id="modal"></span> </div>
  <div class="modal-footer"> <a href="#" class="btn" data-dismiss="modal">关闭</a> </div>
</div>
<!-- end 用户名密码错误弹出窗口-->
 <script>

//用户登录
function login()
{
	//用户提交
	$.ajax({
	  type: 'POST',
	  url: "<?php echo U('Public/login_edit');?>",
	  data:{adminpassword: $('#adminpassword').attr('value'),password: $('#password').attr('value'),password1: $('#password1').attr('value')},
	  dataType: "json",
	  success: function(json) {
		if( json.result == 1 ){
			//登陆成功
			$( '#myModal' ).modal('show');
			$( '#modal' ).html( '<font style="font-family:Arial;font-size:12px;color:#c3413f">' +  json.msg + '</font>');
			window.location.href="<?php echo U('Public/logout');?>"; 
		} else {
			$( '#myModal' ).modal('show');
			$( '#modal' ).html( '<font style="font-family:Arial;font-size:12px;color:#c3413f">' +  json.msg + '</font>');
		}
		
	  }
	})
}


</script>