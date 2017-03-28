<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jshack.js"></script>
<script type="text/javascript" charset="utf-8"  src="/Statics/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8"  src="/Statics/kindeditor/lang/zh_CN.js"></script>
<script language="javascript" type="text/javascript" src="/Statics/Datepicker/WdatePicker.js"></script>

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
<SCRIPT language=JavaScript>
//指定当前组模块URL地址
var URL = '__URL__';
var APP = '__APP__';
var PUBLIC = '__PUBLIC__';
function gotoserver(){
    $.get(APP+"/public/server_list?gid="+$("#gid").val(),function(data){
        $("#sid").html(data);
    });    
    /*var game_id = $('#gid').val();
    $.ajax({url: APP+'/public/paylist/',
    type: 'POST',data:{gid:game_id},async: false,timeout: 1000,success: function(result){
        $("#sid").html(result);
    }
    });
    */
}
</SCRIPT>
  <table class="table set_table">
    <form action="<?php echo U('Pay/plapay',array('begintime'=>$Think['begintime'],'endtime'=>$Think['endtime']));?>" name="Form2" method="post">
    <tr>
            <td height="30" width="200" class="table-textcenter">充值时间：</td>
            <td class="huise_font"><input type="text" name="begintime" id="begintime" value="<?php echo (date("Y-m-d",$get["begintime"])); ?>" class="inputclass Wdate"  onfocus="WdatePicker()" /> - <input type="text" name="endtime" id="endtime" value="<?php echo (date("Y-m-d",$get["endtime"])); ?>" class="inputclass Wdate"  onfocus="WdatePicker()" /></td>
</tr>

            <td height="30" width="200" class="table-textcenter">指定用户：</td>
            <td class="huise_font"><input type="text" class="inputclass" name="uname" value="<?php echo ($get["uname"]); ?>" /></td>
    </tr>
    <tr>
        <td height="30" width="200" class="table-textcenter">指定订单：</td>
        <td class="huise_font"><input type="text" class="inputclass" name="paysn" value="<?php echo ($get["paysn"]); ?>" /></td>
    </tr>
    <tr>
            <td colspan="2" height="30">
            <span style="float:left;line-height:30px;width:45%;text-align:center;">
            <input type="submit" name="submit" value='查 询' class="btn btn-primary btn-small" /> <input type="reset" name="reset" value='重 置' class="btn btn-primary btn-small" />
            </span>
                <span style="float:right;padding-right:10px;line-height:30px;">总内冲平台币：<?php echo ($sumpay); ?> 枚&nbsp;&nbsp;</span>
            </td>
</tr>
    </form>
</TABLE>
<br>
<table class="table table-bordered table-striped">
<thead>
  <tr>
    <th class="table-textcenter">编号</th>
    <th class="table-textcenter">订单号</th>
    <th class="table-textcenter">操作人</th>
    <th class="table-textcenter">平台币</th>
    <th class="table-textcenter">充值用户</th>
    <th class="table-textcenter">充值IP</th>
    <th class="table-textcenter">充值时间</th>
  </tr>
  </thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';" class="tabletr">    
    <td class="table-textcenter"><?php echo ($vo["id"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["paysn"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["operater"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["money"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["uname"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["payip"]); ?></td>
    <td class="table-textcenter"><?php echo (date('Y-m-d H:i:s',$vo["paytime"])); ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  
  <?php if(empty($list)): ?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';">    
    <td height="25" class="table-textcenter" colspan="10">暂无记录！</td>
  </tr><?php endif; ?>

</table>
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