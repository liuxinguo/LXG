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
<SCRIPT language=JavaScript>
//指定当前组模块URL地址
var URL = '__URL__';
var APP = '__APP__';
var PUBLIC = '__PUBLIC__';
function gotoserver(){
    $.get("<?php echo U('Setting/server_list');?>/gid/"+$("#gid").val(),function(data){
        $("#sid").html(data);
    });
}
</SCRIPT>
    <form action="<?php echo U('Setting/card_unused');?>" name="Form2" method="get">
   <table class="table set_table">

    <tr>
        <td height="30" width="200" class="table-textcenter">游戏列表：</td>
        <td class="huise_font">
            <select name='gid' id='gid' onChange="gotoserver()">
                <option value='0' <?php if($get["gid"] == 0): ?>selected='selected'<?php endif; ?>>全部游戏</option>
                <?php if(is_array($gamelist)): $i = 0; $__LIST__ = $gamelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vog): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vog["id"]); ?>' <?php if($vog["id"] == $get['gid']): ?>selected='selected'<?php endif; ?>><?php echo ($vog["gamename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <select name='sid' id='sid'>
                <option value='0'>全部服务器</option>
                <?php if(is_array($gameserver)): $i = 0; $__LIST__ = $gameserver;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vos["sid"]); ?>' <?php if($vos["sid"] == $get['sid']): ?>selected='selected'<?php endif; ?>><?php echo ($vos['line']); echo ($vos['sid']); ?>区 <?php echo ($vos['servername']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td height="30" width="200" class="table-textcenter">指定新手卡：</td>
        <td class="huise_font"><input type="text" class="inputclass" name="card" value="<?php echo ($get["card"]); ?>" /></td>
    </tr>
    <tr>
            <td colspan="2" height="30">
            <span style="float:left;line-height:30px;width:45%;text-align:center;">
            <input type="submit" name="submit" value='查 询' class="btn btn-primary btn-small" /> <input type="reset" name="reset" value='重 置' class="btn btn-primary btn-small" />
            </span>
                <span style="float:right;padding-right:10px;line-height:30px;">总库存数量：<?php echo ($sumcount); ?> 张&nbsp;&nbsp;</span>
            </td>
</tr>
</TABLE>    </form>
<br>
<table class="table table-bordered table-striped">
<thead>
  <tr>
    <th width="4%" class="table-textcenter">编号</th>
    <th width="8%" class="table-textcenter">新手卡</th>
    <th width="8%" class="table-textcenter">新手卡标识</th>
    <th width="6%" class="table-textcenter">游戏名称</th>
    <th width="8%" class="table-textcenter">服务器名称</th>
    <th width="7%" class="table-textcenter">生成时间</th>
  </tr>
</thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOver="this.className='mouseon'" onMouseOut="this.className='';" class="tabletr">    
    <td class="table-textcenter"><?php echo ($vo["id"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["card"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["title"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["gamename"]); ?></td>
    <td class="table-textcenter"><?php echo ($vo["servername"]); echo ($vo["sid"]); ?>服</td>
    <td class="table-textcenter"><?php echo ($vo["date"]); ?></td>
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
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>

</body>
</html>