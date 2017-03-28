<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html><html><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9"><title>Eyou</title><script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script><script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script><script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.simpletip-1.3.1.js"></script><script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.imgareaselect.pack.js"></script><!--剪接截取JS--><script type="text/javascript" src="__ADMIN__/Admin/Js/ajaxfileupload.js"></script><!--文件上传--><link href="__ADMIN__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" /><link href="__ADMIN__/Admin/Css/style.css" rel="stylesheet" type="text/css" /><link href="__ADMIN__/Admin/Css/imgareaselect/imgareaselect-animated.css" rel="stylesheet" type="text/css" /><!--剪接截取样式--><style>#photo{
max-width:300px; max-height:300px;}
#w1, #h1{
	width:90px;
	margin:5px 0px 0px 13px;
	background:url(__ADMIN__/Admin/Images/xiangsu.jpg) no-repeat right;}
</style></head><body class="home_body"><div id="Container"><div id="header" class="header"></div><!--end header--><div id="Wrapper"><div id="left" class="Left"></div><!--end Left--><div id="right" class="Right"><div class="content"><iframe id="myframe" name="myframe" src="<?php echo U('Index/home');?>" frameborder="0" scrolling="no" onload="this.height=100" width="100%" ></iframe></div></div><!--end Right--></div><!--end Wrapper--></div><!--end Container--><script type="text/javascript">	$("#header").load("<?php echo U('Index/header');?>");
     $("#left").load("<?php echo U('Index/admin');?>");
</script><!--弹出窗口--><div class="modal hide" id="myModal" ><div class="modal-header"><button type="button" class="close" data-dismiss="modal" id="picgo2">×</button><h3>裁剪缩略图</h3></div><div class="modal-body"><div style="border-bottom:#f4f4f4 solid 1px;
  margin-bottom:10px;"><form name="form" action="" method="POST" enctype="multipart/form-data"><input id="fileToUpload" type="file" name="fileToUpload" class="span3"  value="上传图片" ><a href="#" onClick="return ajaxFileUpload();" class="btn btn-primary input-mini" style="margin:-9px 0px 0px 10px;">上&nbsp;&nbsp;传</a></form></div><div style="float: left; width: 65%;"><div class="frame" style="margin: 0 0.3em; width: 300px; height: 300px;"><img id="photo" src="__ADMIN__/Admin/Images/flower2.jpg" alt=""></div></div><div style="float: left; width: 35%;"><div class="frame" style="margin: 0 1em; width: 100px; height: 100px;"><div id="preview" style="width: 100px; height: 100px; overflow: hidden;"><img id="photoPr" src="__ADMIN__/Admin/Images/flower2.jpg" alt=""></div></div><form action="" method="post"><input type="hidden" name="x1" id="x1" value="" /><input type="hidden" name="y1" id="y1" value="" /><input type="hidden" name="x2" id="x2" value="" /><input type="hidden" name="y2" id="y2" value="" /><input type="hidden" name="w" id="w" value="" /><input type="hidden" name="h" id="h" value="" /><input type="hidden" name="fileName" id="fileName" value="" /></form><a class="btn m1em_t" href="#" id="rectangle" style="margin-top:5px;
              width:79px;">自动矩形</a><a class="btn m1em_t" href="#" id="square" style="margin-top:10px;
              margin-bottom:20px;
              width:79px;">自动方形</a><input id="w1" value="-"><input id="h1" value="-"></div></div><div class="modal-footer"><a href="#" onClick="createThumb();" class="btn btn-primary input-mini" id="picgo" data-dismiss="modal">截取</a></div></div><!-- end 弹出窗口--></body><script type="text/javascript">	//生成缩略图
	function createThumb()
	{
		$.ajax({
		  type: 'POST',
		  url: "<?php echo U('Common/createThumb');?>",
		  data:{x1: $('#x1').attr('value'),x2: $('#x2').attr('value'),y1: $('#y1').attr('value'),y2: $('#y2').attr('value'),w: $('#w').attr('value'),h: $('#h').attr('value'),fileName: $('#fileName').attr('value')},
		  dataType: "json",
		  success: function(json) {
			if( json.result == 1 ){
				//alert(document.getElementById('fileName').value);
				window.top.frames[0].document.getElementById('sl_thumb').value = document.getElementById('fileName').value;
				window.top.frames[0].document.getElementById('suoluotudizhi').innerHTML = "__ROOT__/Upload/thumbs/" + document.getElementById('fileName').value;
			} else {
				
			}
			
		  }
		})
		
	}


	
	
	


	







function reinitIframe(){
 
var iframe = document.getElementById("myframe");
 
try{
 
var bHeight = iframe.contentWindow.document.body.scrollHeight;
 
var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
 
var height = Math.max(bHeight, dHeight);
 
iframe.height =  height;
 
}catch (ex){}
 
}

window.setInterval("reinitIframe()",200);
</script></html>