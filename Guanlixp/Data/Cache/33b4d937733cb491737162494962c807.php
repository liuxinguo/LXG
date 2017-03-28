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
          
            <li><span><a href="#"><i class="icon-wrench"></i>网站设置</a></span>   <!--菜单大类-->
            
            <ul class="unstyled hide">                                          
                <li><a href="<?php echo U('Setting/basic');?>" target="myframe"><i class="caret_left"></i>基本配置</a></li>
				  <li><a href="<?php echo U('Setting/security?item=2');?>" target="myframe"><i class="caret_left"></i>安全设置</a></li>
				 <li><a href="<?php echo U('Setting/emaliadd?item=1');?>" target="myframe"><i class="caret_left"></i>密保邮箱设置</a></li>
<!--				 <li><a href="<?php echo U('Setting/security?item=2');?>" target="myframe"><i class="caret_left"></i>密保手机设置</a></li> -->
			     <li><a href="<?php echo U('message/message_manage');?>" target="myframe"><i class="caret_left"></i>会员邮件设置</a></li>
				 <li><a href="<?php echo U('Setting/gamejiekou');?>" target="myframe"><i class="caret_left"></i>游戏接口设置</a></li>
				 <li><a href="<?php echo U('Setting/hostup');?>" target="myframe"><i class="caret_left"></i>子域名设置</a></li>
                <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
            
            </ul>
            </li>

            <li><span><a href="#"><i class="icon-file"></i>新闻管理</a></span>  <!--菜单大类-->
              <ul class="unstyled hide">
				 <li><a href="<?php echo U('Setting/article');?>" target="myframe"><i class="caret_left"></i>新闻管理</a></li>
                 <li><a href="<?php echo U('Setting/article_add');?>" target="myframe"><i class="caret_left"></i>增加新闻</a></li>
				 <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
              </ul>
            </li> 

            <li><span><a href="#"><i class="icon-list-alt"></i>游戏管理</a></span>  <!--菜单大类-->
              <ul class="unstyled hide">
                <li><a href="<?php echo U('Setting/game');?>" target="myframe"><i class="caret_left"></i>游戏管理</a></li>
				 <li><a href="<?php echo U('Setting/game_add');?>" target="myframe"><i class="caret_left"></i>添加游戏</a></li>
                 <li><a href="<?php echo U('Setting/server');?>" target="myframe"><i class="caret_left"></i>服务器管理</a></li>
				 <li><a href="<?php echo U('Setting/server_add');?>" target="myframe"><i class="caret_left"></i>添加服务器</a></li>
				 <li><a href="<?php echo U('Setting/server_pladd');?>" target="myframe"><i class="caret_left"></i>批量配服</a></li>
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
			
          <li><span><a href="#"><i class="icon-list-alt"></i>活动管理</a></span>  <!--菜单大类-->
              <ul class="unstyled hide">
                 <li><a href="<?php echo U('Fuli/sc_log');?>" target="myframe"><i class="caret_left"></i>首冲任务统计</a></li>
                 <li><a href="<?php echo U('Fuli/dj_log');?>" target="myframe"><i class="caret_left"></i>等级任务统计</a></li>
                 <li><a href="<?php echo U('Fuli/fl_log');?>" target="myframe"><i class="caret_left"></i>VIP+笔单利统计</a></li>
                 <li><a href="<?php echo U('Fuli/flrw');?>" target="myframe"><i class="caret_left"></i>福利管理</a></li>
				 
                 <li><a href="<?php echo U('Fuli/djrw_list');?>" target="myframe"><i class="caret_left"></i>等级任务管理</a></li>
				 <li><a href="<?php echo U('Fuli/djrw_add');?>" target="myframe"><i class="caret_left"></i>添加等级任务</a></li>
				 
                 <li><a href="<?php echo U('Fuli/danbirw_list');?>" target="myframe"><i class="caret_left"></i>单笔数额管理</a></li>
				 <li><a href="<?php echo U('Fuli/danbirw_add');?>" target="myframe"><i class="caret_left"></i>添加单笔返利</a></li>
                 <li><a href="<?php echo U('Fuli/viprw_list');?>" target="myframe"><i class="caret_left"></i>VIP等级管理</a></li>
				 <li><a href="<?php echo U('Fuli/viprw_add');?>" target="myframe"><i class="caret_left"></i>添加VIP返利</a></li>
         <li><a href="<?php echo U('Fuli/znq');?>" target="myframe"><i class="caret_left"></i>周年庆抽奖统计</a></li>

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
                 <li><a href="<?php echo U('Pay/plapay_add');?>" target="myframe"><i class="caret_left"></i>内充平台币</a></li>
                 <li><a href="<?php echo U('Pay/plapay',array('begintime'=>date('Y-m-d'),'endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>内充管理</a></li>
				 <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
              </ul>
            </li>  
          <li><span><a href="#"><i class="icon-shopping-cart"></i>游戏内充与首冲管理</a></span>  <!--菜单大类-->
              <ul class="unstyled hide">
			        
				    <li><a href="<?php echo U('cps/scpay');?>" target="myframe"><i class="caret_left"></i>添加内冲</a></li>
				 <!--	 <li><a href="<?php echo U('cps/qudao_sc');?>" target="myframe"><i class="caret_left"></i>内冲管理</a></li>
					 -->
				     <li><a href="<?php echo U('cps/qudao_sc');?>" target="myframe"><i class="caret_left"></i>工会首冲</a></li>
	
				 <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
              </ul>
            </li>  
			
            <li><span><a href="#"><i class="icon-shopping-cart"></i>充值渠道管理</a></span>  <!--菜单大类-->
              <ul class="unstyled hide">

                 <li><a href="<?php echo U('Setting/paytype');?>" target="myframe"><i class="caret_left"></i>渠道管理</a></li>
				 <li><a href="<?php echo U('Setting/paytype_add');?>" target="myframe"><i class="caret_left"></i>添加渠道</a></li>
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
				 <li><a href="<?php echo U('Setting/register_log',array('begintime'=>date('Y-m').'-01','endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>历史注册</a></li>
                <li><a href="<?php echo U('Setting/login_log',array('begintime'=>date('Y-m-d'),'endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>今日登陆</a></li>
				 <li><a href="<?php echo U('Setting/login_log',array('begintime'=>date('Y-m').'-01','endtime'=>date('Y-m-d')));?>" target="myframe"><i class="caret_left"></i>历史登陆</a></li>
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
         
            <li><span><a href="#"><i class="icon-user"></i>渠道管理</a></span>  <!--菜单大类-->
              <ul class="unstyled hide">
                 <li><a href="<?php echo U('cps/qudao_tongji');?>" target="myframe"><i class="caret_left"></i>渠道统计</a></li>
				 <li><a href="<?php echo U('Setting/qudao_add');?>" target="myframe"><i class="caret_left"></i>添加渠道</a></li>
				 <li><a href="<?php echo U('cps/qudao_xiaoguo');?>" target="myframe"><i class="caret_left"></i>广告效果</a></li>
				 <li><a href="<?php echo U('cps/qudao_sucai_add');?>" target="myframe"><i class="caret_left"></i>素材添加</a></li>	
				 <li><a href="<?php echo U('cps/qudao_genurl');?>" target="myframe"><i class="caret_left"></i>推广链接</a></li>
                 <li><a href="<?php echo U('cps/qudao');?>" target="myframe"><i class="caret_left"></i>渠道查询</a></li>
             

				 <li><a href="<?php echo U('Setting/jiesuan');?>" target="myframe"><i class="caret_left"></i>结算管理</a></li>
				 <li><a href="<?php echo U('Setting/jiesuangl');?>" target="myframe"><i class="caret_left"></i>结算统计</a></li>	

                 <li></li>
		 
				  <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
              </ul>
            </li>    
			
     
    
			
         <li><span><a href="#"><i class="icon-refresh"></i>混服管理</a></span>
             	<ul class="unstyled hide">
                	<li><a href="<?php echo U('Hunfu/hunfu');?>" target="myframe"><i class="caret_left"></i>混服商管理</a></li>
                	<li><a href="<?php echo U('Hunfu/login_log');?>" target="myframe"><i class="caret_left"></i>登陆统计</a></li>
                	<li><a href="<?php echo U('Hunfu/register_log');?>" target="myframe"><i class="caret_left"></i>注册统计</a></li>
                	<li><a href="<?php echo U('Hunfu/pay_game_nei');?>" target="myframe"><i class="caret_left"></i>直冲值统计</a></li>

              	</ul>
             </li>
            <li><span><a href="#"><i class="icon-wrench"></i>管理员设置</a></span>   <!--菜单大类-->
            
            <ul class="unstyled hide">                                          
                <li><a href="<?php echo U('Manage/index');?>" target="myframe"><i class="caret_left"></i>管理员设置</a></li>
				<li><a href="<?php echo U('Manage/manage_add');?>" target="myframe"><i class="caret_left"></i>添加管理员</a></li>

                <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
            
            </ul>
            </li>
			
             <li><span><a href="#"><i class="icon-refresh"></i>维护备份</a></span>
             	<ul class="unstyled hide">
                	<li><a href="<?php echo U('Databak/index');?>" target="myframe"><i class="caret_left"></i>数据库备份</a></li>
                	<li><a href="<?php echo U('Databak/import');?>" target="myframe"><i class="caret_left"></i>数据库还原</a></li>
                
              	</ul>
             </li>

            
          </ul>

          
        </div>
        <!--end sidebar_nav--> 
      </div>
      <!--end Left content-->