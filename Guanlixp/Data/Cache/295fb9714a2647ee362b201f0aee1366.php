<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
	$(document).ready(function() {

		 $(".sidebar_nav li span").click(
		function(){
			if($(this).next("ul").is(":hidden")) 
				{	
					$(".sidebar_nav li ul").slideUp(300);
					$(this).next("ul").slideDown(300);
				}
			else
				{
					$(this).next("ul").slideUp(300);
				};
	});	
	});
</script>


      <div class="content">
        <div class="sidebar_nav">
          <ul class="unstyled">
          
    

            <li><span><a href="#"><i class="icon-file"></i>新闻管理</a></span>  <!--菜单大类-->
              <ul class="unstyled hide">
				 <li><a href="<?php echo U('Setting/article');?>" target="myframe"><i class="caret_left"></i>新闻管理</a></li>
                 <li><a href="<?php echo U('Setting/article_add');?>" target="myframe"><i class="caret_left"></i>增加新闻</a></li>
				 <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
              </ul>
            </li> 

           

            <li><span><a href="#"><i class="icon-th-large"></i>新手卡管理</a></span>  <!--菜单大类-->
              <ul class="unstyled hide">
                 <li><a href="<?php echo U('Setting/card_detail');?>" target="myframe"><i class="caret_left"></i>新手卡列表</a></li>
                 <li><a href="<?php echo U('Setting/card_detail_add');?>" target="myframe"><i class="caret_left"></i>添加新手卡类别</a></li>
				 <li><a href="<?php echo U('Setting/card_log');?>" target="myframe"><i class="caret_left"></i>已发放列表</a></li>
                 <li><a href="<?php echo U('Setting/card_unused');?>" target="myframe"><i class="caret_left"></i>库存列表</a></li>
				 <li><a href="<?php echo U('Setting/card_add');?>" target="myframe"><i class="caret_left"></i>新手卡导入</a></li>
				 <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
              </ul>
            </li>  


            <li><span><a href="#"><i class="icon-shopping-cart"></i>游戏充值管理</a></span>  <!--菜单大类-->
              <ul class="unstyled hide">
				 <li><a href="<?php echo U('Setting/pay_record_log',array('begintime'=>date('Y-m-d'),'endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>订单日志查询</a></li>
				 <li><a href="<?php echo U('Setting/pay_game_record',array('begintime'=>date('Y-m-d'),'endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>今日游戏充值</a></li>
                 <li><a href="<?php echo U('Setting/pay_game_record',array('begintime'=>date('Y-m').'-01','endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>本月游戏充值值</a></li>
                 <li><a href="<?php echo U('Setting/pay_batchuser');?>" target="myframe"><i class="caret_left"></i>批量查询充值</a></li>
                 <li><a href="<?php echo U('Setting/pay_game_fall',array('begintime'=>date('Y-m').'-01','endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>游戏充值掉单</a></li>
				 <li><a href="<?php echo U('Setting/pay_game_reissue',array('begintime'=>date('Y-m-d'),'endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>补单记录查询</a></li>
				 <li><a href="<?php echo U('Setting/pay_updateorder');?>" target="myframe"><i class="caret_left"></i>手动处理订单</a></li>
               <!--  <li style="border-top:2px solid #000000;"><a href="<?php echo U('Page/add_page');?>" target="myframe"><i class="caret_left"></i>渠道管理</a></li> -->

				 <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
              </ul>
            </li>  

            <li><span><a href="#"><i class="icon-shopping-cart"></i>平台币管理</a></span>  <!--菜单大类-->
              <ul class="unstyled hide">
				 <li><a href="<?php echo U('Setting/pay_record',array('begintime'=>date('Y-m-d'),'endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>今日平台币充值</a></li>
                 <li><a href="<?php echo U('Setting/pay_record',array('begintime'=>date('Y-m').'-01','endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>本月平台币充值</a></li>
                 <li><a href="<?php echo U('Setting/pay_fall',array('begintime'=>date('Y-m').'-01','endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>平台币充值掉单</a></li>
				 <li><a href="<?php echo U('Setting/pay_reissue',array('begintime'=>date('Y-m-d'),'endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>补单记录查询</a></li>
				 <li><a href="<?php echo U('Setting/pay_platform_log',array('begintime'=>date('Y-m').'-01','endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>平台币消费统计</a></li>

				 <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
              </ul>
            </li>  
           
            <li><span><a href="#"><i class="icon-tasks"></i>综合管理</a></span>  <!--菜单大类-->
              <ul class="unstyled hide">
         <li><a href="<?php echo U('Setting/member',array('begintime'=>date('Y-m-d'),'endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>会员列表</a></li>
			 <li><a href="<?php echo U('Links/friendlink');?>" target="myframe"><i class="caret_left"></i>友情链接</a></li>
			    <li><a href="<?php echo U('Links/friendlink_add');?>" target="myframe"><i class="caret_left"></i>添加友情链接</a></li>
				 <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
              </ul>
            </li>  


            <li><span><a href="#"><i class="icon-retweet"></i>数据管理</a></span>  <!--菜单大类-->
              <ul class="unstyled hide">
                <li><a href="<?php echo U('Setting/register_log',array('begintime'=>date('Y-m-d'),'endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>今日注册</a></li>
				 <li><a href="<?php echo U('Setting/register_log',array('begintime'=>'2012-05-28','endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>历史注册</a></li>
                <li><a href="<?php echo U('Setting/login_log',array('begintime'=>date('Y-m-d'),'endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>今日登陆</a></li>
				 <li><a href="<?php echo U('Setting/login_log',array('begintime'=>'2012-05-28','endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>历史登陆</a></li>
				 <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
              </ul>
            </li>  

            <li><span><a href="#"><i class="icon-book"></i>官网管理</a></span>  <!--菜单大类-->
              <ul class="unstyled hide">
				 <li><a href="<?php echo U('Setting/gamezhuti');?>" target="myframe"><i class="caret_left"></i>官网主题设置</a></li>
                <li><a href="<?php echo U('Setting/gamesitelist');?>" target="myframe"><i class="caret_left"></i>官网管理</a></li>
                <li><a href="<?php echo U('Setting/gamesitelist_add');?>" target="myframe"><i class="caret_left"></i>添加官网</a></li>
				 <li><a href="<?php echo U('Setting/gamepublish');?>" target="myframe"><i class="caret_left"></i>官网新闻管理</a></li>
			 	<li><a href="<?php echo U('Setting/gamepublishadd');?>" target="myframe"><i class="caret_left"></i>发布官网新闻</a></li>
				 <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
              </ul>
            </li>  
           
 

            
          </ul>

          
        </div>
        <!--end sidebar_nav--> 
      </div>
      <!--end Left content-->