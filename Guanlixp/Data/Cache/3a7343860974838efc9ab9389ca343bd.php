<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jshack.js"></script>
<script type="text/javascript" charset="utf-8"  src="__ADMIN__/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8"  src="__ADMIN__/kindeditor/lang/zh_CN.js"></script>
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
<style>
.input-sort{width:30px;text-align:center;height:18px;line-height:18px;}
</style>
<script  language="JavaScript">
function check(){
    if( ($("#gid").val()==0 )) {
        alert("请选择游戏！");
        $("#gid").focus();
        return false;
    }
}
var URL = '__URL__';
var APP	 =	 '__APP__';
var TPL = '__TPL____MANAGETPL__';

//初始化编辑
var editor;
KindEditor.ready(function(K) {
        editor = K.create('#content', {
            cssPath : '__ADMIN__/kindeditor/plugins/code/prettify.css',
			themeType : 'simple',
            uploadJson : '__ADMIN__/kindeditor/php/upload_json.php?dir=gamesite',
            fileManagerJson : '__ADMIN__/kindeditor/php/file_manager_json.php',
            allowFileManager : true,
			items : ['source','bold','italic','underline','fontname','fontsize','forecolor','hilitecolor','plug-align','plug-order','plug-indent','link']

        });
		//同步编辑器内容
		K('input.pic_banner_btn').click(function(){
			var obj = $(this);
				editor.loadPlugin('image', function() {
					editor.plugin.imageDialog({
						imageUrl : obj.parent().find('.inputpic').val(),
							clickFn : function(url, title, width, height, border, align) {
								obj.parent().find('.inputpic').val(url);
								editor.hideDialog();
							}
					});
			});
		});
		
		
		K('input.pic_nav_btn').click(function(){
			var obj = $(this);
				editor.loadPlugin('image', function() {
					editor.plugin.imageDialog({
						imageUrl : obj.parent().find('.picnav').val(),
							clickFn : function(url, title, width, height, border, align) {
								obj.parent().find('.picnav').val(url);
								editor.hideDialog();
							}
					});
			});
		});

		K('input.pic_snap_btn').click(function(){
			var obj = $(this);
				editor.loadPlugin('image', function() {
					editor.plugin.imageDialog({
						imageUrl : obj.parent().find('.picsnap').val(),
							clickFn : function(url, title, width, height, border, align) {
								obj.parent().find('.picsnap').val(url);
								editor.hideDialog();
							}
					});
			});
		});
		K('input.pic_list_btn').click(function(){
			var obj = $(this);
				editor.loadPlugin('image', function() {
					editor.plugin.imageDialog({
						imageUrl : obj.parent().find('.piclist').val(),
							clickFn : function(url, title, width, height, border, align) {
								obj.parent().find('.piclist').val(url);
								editor.hideDialog();
							}
					});
			});
		});
		K('input.pic_bg_btn').click(function(){
			var obj = $(this);
				editor.loadPlugin('image', function() {
					editor.plugin.imageDialog({
						imageUrl : obj.parent().find('.picbg').val(),
							clickFn : function(url, title, width, height, border, align) {
								obj.parent().find('.picbg').val(url);
								editor.hideDialog();
							}
					});
			});
		});


});
</SCRIPT>
  <table class="table set_table">
  <form action="__URL__/<?php echo ($act); ?>" method="post" name="Form1" onSubmit="return check()">
  <tr>
    <td width="12%" height="30" align="right" valign="middle">游戏：</td>
    <td width="88%" valign="middle" class="huise_font">
			<?php if(empty($gamelist)): ?><b style="color:red">没有需要添加的官网游戏资料!!</b>
			<?php else: ?>
            <select name='gid' id='gid'>
                <?php if(is_array($gamelist)): $i = 0; $__LIST__ = $gamelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["id"]); ?>' selected='selected'><?php echo ($vo["gamename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>  - <?php echo ($vo123["gid"]); endif; ?></td>
  </tr>

  <tr>
    <td width="12%" height="30" align="right" valign="middle">官网主题风格：</td>
    <td width="88%" valign="middle" class="huise_font">

            <select name='zhuti' id='zhuti'>
			<option value='0' <?php if($vo123["zhuti"] == '0'): ?>selected='selected'<?php endif; ?>>请选择官网主题</option>
                <?php if(is_array($zhuti)): $i = 0; $__LIST__ = $zhuti;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["bs"]); ?>' <?php if($vo["bs"] == $vo123['zhuti']): ?>selected='selected'<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				
            </select>
		</td>
  </tr>
     <tr>
      <td width="12%" height="30" align="right"> 网站名称： </td>
      <td width="88%"  class="huise_font"><input name="sitename" type="text" class="inputclass inputtitle" value="<?php echo ($vo123["sitename"]); ?>"></td>
    </tr>
     <tr>
      <td width="12%" height="30" align="right"> 网站TITLE： </td>
      <td width="88%"  class="huise_font"><input name="title" type="text" class="inputclass inputtitle" value="<?php echo ($vo123["title"]); ?>"></td>
    </tr>
            <tr>
              <td height="30" align="right" > 网站关键字： </td>
              <td  class="huise_font"><input name="keywords" type="text" class="inputclass inputtitle" value="<?php echo ($vo123["keywords"]); ?>"></td>
            </tr>
			
            <tr>
              <td height="30" align="right" > 网站描述： </td>
              <td class="huise_font"><textarea class="input-xlarge " name="description" cols="60" rows="4"><?php echo ($vo123["description"]); ?></textarea></td>
            </tr>
  <tr>
    <td height="30" align="right" valign="middle">官网大背景：</td>
    <td valign="middle" class="huise_font"> <input name="pic_bg[0][img]" type="text" size="50" class="inputclass inputtitle picbg" value="<?php echo ($vopic_bg[0]["img"]); ?>"> &nbsp;<input type="button" class="pic_bg_btn btn btn-inverse m1em_t" value="选择图片" /></td>
  </tr>
  <tr>
    <td height="110" align="right" valign="middle">官网Banner：</td>
    <td valign="middle" class="huise_font">
	<p>
 排序 <input name="pic_banner[0][sort]" type="text" size="50" class="inputclass input-sort" value="<?php echo ($vopic_banner[0]["sort"]); ?>"> 
 图片 <input name="pic_banner[0][img]" type="text" size="50" class="inputclass inputtitle inputpic" value="<?php echo ($vopic_banner[0]["img"]); ?>"> &nbsp;<input type="button" class="pic_banner_btn btn btn-inverse m1em_t" value="选择图片" />
 链接 <input name="pic_banner[0][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vopic_banner[0]["url"]); ?>">
	</p>
	<p>
 排序 <input name="pic_banner[1][sort]" type="text" size="50" class="inputclass input-sort" value="<?php echo ($vopic_banner[1]["sort"]); ?>"> 
 图片 <input name="pic_banner[1][img]" type="text" size="50" class="inputclass inputtitle inputpic" value="<?php echo ($vopic_banner[1]["img"]); ?>"> &nbsp;<input type="button" class="pic_banner_btn btn btn-inverse m1em_t" value="选择图片" />
 链接 <input name="pic_banner[1][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vopic_banner[1]["url"]); ?>">
 	</p>
	<p>
 排序 <input name="pic_banner[2][sort]" type="text" size="50" class="inputclass input-sort" value="<?php echo ($vopic_banner[2]["sort"]); ?>"> 
 图片 <input name="pic_banner[2][img]" type="text" size="50" class="inputclass inputtitle inputpic" value="<?php echo ($vopic_banner[2]["img"]); ?>"> &nbsp;<input type="button" class="pic_banner_btn btn btn-inverse m1em_t" value="选择图片" />
 链接 <input name="pic_banner[2][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vopic_banner[2]["url"]); ?>">
 	</p>
	<p>
 排序 <input name="pic_banner[3][sort]" type="text" size="50" class="inputclass input-sort" value="<?php echo ($vopic_banner[3]["sort"]); ?>"> 
 图片 <input name="pic_banner[3][img]" type="text" size="50" class="inputclass inputtitle inputpic" value="<?php echo ($vopic_banner[3]["img"]); ?>"> &nbsp;<input type="button" class="pic_banner_btn btn btn-inverse m1em_t" value="选择图片" />
 链接 <input name="pic_banner[3][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vopic_banner[3]["url"]); ?>">
  	</p>
	</td>
  </tr>
  <tr>
    <td height="110" align="right" valign="middle">官网功能导航：</td>
    <td valign="middle" class="huise_font">
 	<p>
 图片 <input name="pic_nav[0][img]" type="text" size="50" class="inputclass inputtitle picnav" value="<?php echo ($vopic_nav[0]["img"]); ?>"> &nbsp;<input type="button" value="选择图片"  class="pic_nav_btn btn btn-inverse m1em_t" />
 链接 <input name="pic_nav[0][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vopic_nav[0]["url"]); ?>">
  	</p>
 	<p>
 图片 <input name="pic_nav[1][img]" type="text" size="50" class="inputclass inputtitle picnav" value="<?php echo ($vopic_nav[1]["img"]); ?>"> &nbsp;<input type="button" value="选择图片"  class="pic_nav_btn btn btn-inverse m1em_t" />
 链接 <input name="pic_nav[1][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vopic_nav[1]["url"]); ?>">
  	</p>
	<p>
 图片 <input name="pic_nav[2][img]" type="text" size="50" class="inputclass inputtitle picnav" value="<?php echo ($vopic_nav[2]["img"]); ?>"> &nbsp;<input type="button" value="选择图片"  class="pic_nav_btn btn btn-inverse m1em_t" />
 链接 <input name="pic_nav[2][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vopic_nav[2]["url"]); ?>">
   	</p>
  	<p>
 图片 <input name="pic_nav[3][img]" type="text" size="50" class="inputclass inputtitle picnav" value="<?php echo ($vopic_nav[3]["img"]); ?>"> &nbsp;<input type="button" value="选择图片"  class="pic_nav_btn btn btn-inverse m1em_t" />
 链接 <input name="pic_nav[3][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vopic_nav[3]["url"]); ?>">
   	</p>
	</td>
  </tr>

	<!-- 
  <tr>
    <td height="140" align="right" valign="middle">官网游戏截图：</td>
    <td valign="middle" class="huise_font">
	<p>
 截图 <input name="pic_snap[0][img]" id="pic_snap_0" type="text" size="50" class="inputclass inputtitle picsnap" value="<?php echo ($vopic_snap[0]["img"]); ?>"> &nbsp;<input type="button" class="pic_snap_btn" value="选择图片" />
	</p>
	<p>
 截图 <input name="pic_snap[1][img]" id="pic_snap_1" type="text" size="50" class="inputclass inputtitle picsnap" value="<?php echo ($vopic_snap[1]["img"]); ?>"> &nbsp;<input type="button" class="pic_snap_btn" value="选择图片" />
	</p>
	<p>
 截图 <input name="pic_snap[2][img]" id="pic_snap_2" type="text" size="50" class="inputclass inputtitle picsnap" value="<?php echo ($vopic_snap[2]["img"]); ?>"> &nbsp;<input type="button" class="pic_snap_btn" value="选择图片" />
	</p>
	<p>
 截图 <input name="pic_snap[3][img]" id="pic_snap_3" type="text" size="50" class="inputclass inputtitle picsnap" value="<?php echo ($vopic_snap[3]["img"]); ?>"> &nbsp;<input type="button" class="pic_snap_btn" value="选择图片" />
	</p>
	<p>
 截图 <input name="pic_snap[4][img]" id="pic_snap_4" type="text" size="50" class="inputclass inputtitle picsnap" value="<?php echo ($vopic_snap[4]["img"]); ?>"> &nbsp;<input type="button" class="pic_snap_btn" value="选择图片" />
	</p>
	</td>
  </tr>
  -->
  <tr>
    <td height="110" align="right" valign="middle">媒体合作：</td>
    <td valign="middle" class="huise_font">
	<p>
 名字 <input name="meiti[0][title]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($meiti[0]["title"]); ?>">
 链接 <input name="meiti[0][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($meiti[0]["url"]); ?>">
	</p>
	<p>
 名字 <input name="meiti[1][title]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($meiti[1]["title"]); ?>">
 链接 <input name="meiti[1][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($meiti[1]["url"]); ?>">
 	</p>
	<p>
 名字 <input name="meiti[2][title]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($meiti[2]["title"]); ?>">
 链接 <input name="meiti[2][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($meiti[2]["url"]); ?>">
 	</p>
	<p>
 名字 <input name="meiti[3][title]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($meiti[3]["title"]); ?>">
 链接 <input name="meiti[3][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($meiti[3]["url"]); ?>">
  	</p>
		<p>
 名字 <input name="meiti[4][title]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($meiti[4]["title"]); ?>">
 链接 <input name="meiti[4][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($meiti[4]["url"]); ?>">
  	</p>
	</td>
  </tr>
    <tr>
    <td height="30" align="right" valign="middle">游戏选区大背景：</td>
    <td valign="middle" class="huise_font">
	<input name="pic_list[3][img]" type="text" size="50" class="inputclass inputtitle piclist" value="<?php echo ($vopic_list[3]["img"]); ?>"> &nbsp;<input type="button" class="pic_list_btn btn btn-inverse m1em_t" value="选择图片" /></td>
  </tr>
  <tr>
    <td height="80" align="right" valign="middle">游戏选区页双图：</td>
    <td valign="middle" class="huise_font">
 	<p>
 图片 <input name="pic_list[0][img]" type="text" size="50" class="inputclass inputtitle piclist" value="<?php echo ($vopic_list[0]["img"]); ?>"> &nbsp;<input type="button" value="选择图片" class="pic_list_btn btn btn-inverse m1em_t" />
 链接 <input name="pic_list[0][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vopic_list[0]["url"]); ?>">
  	</p>
 	<p>
 图片 
   <input name="pic_list[1][img]" type="text" size="50" class="inputclass inputtitle piclist" value="<?php echo ($vopic_list[1]["img"]); ?>"> &nbsp;<input type="button" value="选择图片" class="pic_list_btn btn btn-inverse m1em_t" />
 链接 <input name="pic_list[1][url]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vopic_list[1]["url"]); ?>">
 	</p>
	</td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">添加时间：</td>
    <td valign="middle" class="huise_font"><input name="addtime" type="text" id="addtime" size="20" readonly value="<?php echo ($vo123["addtime"]); ?>"  class="inputclass"/></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">上次修改时间：</td>
    <td valign="middle" class="huise_font"><input name="addtime" type="text" id="addtime" size="20" readonly value="<?php echo ($vo123["modifytime"]); ?>"  class="inputclass"/></td>
  </tr>
  <tr style="display:none;">
    <td height="30" align="right" valign="middle">介绍：</td>
    <td valign="middle" class="huise_font"><textarea id="content" name="content"  style="width:350px;height:150px;visibility:hidden;"></textarea></td>
  </tr>

  <tr>
    <td height="50" colspan="2" align="center" valign="middle"><input type="submit" class="btn btn-primary btn-small" name="Submit" id="submit" value="确认提交"></td>
  </tr>
  </form>
</table>
</body>
</html>