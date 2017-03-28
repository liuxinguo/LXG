<?php if (!defined('THINK_PATH')) exit();?>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/"></script>
<link href="__PUBLIC__/Admin/Css/" rel="stylesheet" type="text/css" />

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($ai["title"]); ?>-<?php echo ($ai["sitename"]); ?></title>
<meta name="keywords" content="<?php echo ($ai["keywords"]); ?>">
<meta name="description" content="<?php echo ($ai["description"]); ?>">
<link href="/css/Log.css" type="text/css" rel="stylesheet" />
<script language="javascript" src="/js/basic.js"></script>
<meta http-equiv='Refresh' content='<?php echo ($waitSecond); ?>;URL=<?php echo ($jumpUrl); ?>'>
</head>

<body>
<br><br>
	<div class="pop_mo">
	<div class="pop_1">系统提示<a href="javascript:url_return();" class="pl-x"><img src="/images/x.jpg" /></a></div>
	<div class="pop_3">
    
<div class="p_bj5">    
	<div class="p_3">
	<h2>提示</h2>
	
    <?php if(isset($message)): ?><P><?php echo ($msgTitle); echo ($message); ?></P>
      <?php else: ?>
	  <P><?php echo ($msgTitle); echo ($error); ?></P><?php endif; ?>




	</div>
</div>
<div style="margin: 10px 0px; height: 24px; width: 280px; float: right;">

          <a class="btn-link btn-p2" href="<?php echo ($jumpUrl); ?>">返回</a>
		  
		  
          </div>
<script>
      var pgo=0;
      function JumpUrl(){
        if(pgo==0){ location='<?php echo ($jumpUrl); ?>'; pgo=1; }
      }
	  
setTimeout('JumpUrl()',5000);
</script>
	<div class="cl"></div>
	
	</div>
	</div>
</body>
</html>