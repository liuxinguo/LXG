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
  <table class="table set_table">
    <form action="<?php echo U('member',array('begintime'=>$Think['begintime'],'endtime'=>$Think['endtime']));?>" name="Form2" method="post">
    <tr>
            <td height="30" width="200" class="table-textcenter">注册时间：</td>
            <td class="huise_font"><input type="text" name="begintime" id="begintime" value="<?php echo (date("Y-m-d",$get["begintime"])); ?>" class="inputclass Wdate"  onfocus="WdatePicker()" /> - <input type="text" name="endtime" id="endtime" value="<?php echo (date("Y-m-d",$get["endtime"])); ?>" class="inputclass Wdate"  onfocus="WdatePicker()" /></td>
</tr>
    <tr>
        <td height="30" width="200" class="table-textcenter">VIP等级：</td>
        <td class="huise_font">
            <select name="level" id="level">
                <option value="0">请选择VIP等级</option>
                <option value='1' <?php if($get['level'] == 1): ?>selected='selected'<?php endif; ?>>VIP1</option>
                <option value='2' <?php if($get['level'] == 2): ?>selected='selected'<?php endif; ?>>VIP2</option>
                <option value='3' <?php if($get['level'] == 3): ?>selected='selected'<?php endif; ?>>VIP3</option>
                <option value='4' <?php if($get['level'] == 4): ?>selected='selected'<?php endif; ?>>VIP4</option>
                <option value='5' <?php if($get['level'] == 5): ?>selected='selected'<?php endif; ?>>VIP5</option>
                <option value='6' <?php if($get['level'] == 6): ?>selected='selected'<?php endif; ?>>VIP6</option>
                <option value='7' <?php if($get['level'] == 7): ?>selected='selected'<?php endif; ?>>VIP7</option>
                <option value='8' <?php if($get['level'] == 8): ?>selected='selected'<?php endif; ?>>VIP8</option>
                <option value='9' <?php if($get['level'] == 9): ?>selected='selected'<?php endif; ?>>VIP9</option>
            </select>
        </td>
    </tr>
    <tr>
            <td height="30" width="200" class="table-textcenter">指定用户：</td>
            <td class="huise_font"><input type="text" class="inputclass" name="uname" value="<?php echo ($get["uname"]); ?>" />
            &nbsp;&nbsp;<font color="#444444">指定&nbsp;&nbsp;I&nbsp;D：</font><input type="text" class="inputclass" name="uid" value="<?php echo ($get["uid"]); ?>" /></td>
    </tr>
    <tr>
        <td height="30" width="200" class="table-textcenter">真实姓名：</td>
        <td class="huise_font"><input type="text" class="inputclass" name="idname" value="<?php echo ($get["idname"]); ?>" />
        &nbsp;&nbsp;<font color="#444444">身份号码：</font><input type="text" class="inputclass" name="idcard" value="<?php echo ($get["idcard"]); ?>" />
        </td>
    </tr>
    <tr>
        <td height="30" width="200" class="table-textcenter">电子邮箱：</td>
        <td class="huise_font"><input type="text" class="inputclass" name="email" value="<?php echo ($get["email"]); ?>" />
        &nbsp;&nbsp;<font color="#444444">游戏帐号：</font><input type="text" class="inputclass" name="gameusername" value="<?php echo ($get["gameusername"]); ?>" />
        </td>
    </tr>
    <tr>
            <td colspan="2" height="30">
            <span style="float:left;line-height:30px;width:45%;text-align:center;">
            <input type="submit" name="submit" value='查 询' class="btn btn-primary btn-small" /> <input type="reset" name="reset" value='重 置' class="btn btn-primary btn-small" />
            </span>
                <span style="float:right;padding-right:10px;line-height:30px;">总注册：<?php echo ($sumpay); ?> 人&nbsp;&nbsp;</span>
            </td>
</tr>
    </form>
</TABLE>
<br>
<table class="table table-bordered table-striped">
<thead>
  <tr>
    <th width="4%" nowrap class="table-textcenter">UID</th>
    <th width="8%" nowrap class="table-textcenter">用户名</th>
    <th width="4%" nowrap class="table-textcenter">VIP等级</th>
    <th width="5%" nowrap class="table-textcenter">虚拟币</th>
    <th width="5%" nowrap class="table-textcenter">积分</th>
    <th width="4%" nowrap class="table-textcenter">真实姓名</th>
    <th width="10%" nowrap class="table-textcenter">身份证号</th>
    <th width="10%" nowrap class="table-textcenter">邮箱</th>
    <th width="6%" nowrap class="table-textcenter">游戏帐号</th>
    <th width="10%" nowrap class="table-textcenter">注册时间</th>
    <th width="4%" nowrap class="table-textcenter">mid</th>
    <th width="7%" nowrap class="table-textcenter">操作</th>
  </tr>
</thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';" class="tabletr">    
    <td class="table-textcenter"><?php echo ($vo["uid"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["uname"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["level"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["money"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["scores"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["idname"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["idcard"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["email"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["gameusername"]); ?></td>
    <td class="table-textcenter"><?php echo (date('Y-m-d H:i:s',$vo["regtime"])); ?></td>
    <td class="table-textcenter"><?php echo ($vo["mid"]); ?></td>
    <td class="table-textcenter"><a href="<?php echo U('member_edit',array('uid'=>$vo['uid']));?>">管理</a></td>
    <!--<td class="table-textcenter"><?php echo (date('Y-m-d H:i:s',$vo["paytime"])); ?></td>-->
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