<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head><meta charset="utf-8"><meta name="keywords" content="网页游戏合作平台,网页游戏"><meta name="description" content="网页游戏混服,网页游戏合作平台,游戏合作"><meta name="renderer" content="webkit"><link rel="stylesheet" href="http://api.1073.com/static/css/yui.css"><link rel="stylesheet" href="/css/cps.css"><script type="text/javascript" src="http://api.1073.com/static/js/jquery.js"></script><!--[if lt IE 9]><script type="text/javascript" src="/static/js/html5.js"></script><![endif]--><title>推广平台-<?php echo ($ai["sitename"]); ?></title></title></head><body><div class="yui3-g header"><div class="yui3-u" id="_header_logo"><div class="logo">推广平台</div></div><div class="yui3-u" id="_header_menu"><div class="menu"><a class="current" href="<?php echo U('cps/main');?>">汇总查询</a><a href="<?php echo U('cps/firstlist');?>">首充申请</a><a href="<?php echo U('cps/addLinks');?>">链接生成</a><a href="<?php echo U('cps/pay');?>">充值查询</a><a href="<?php echo U('cps/reg_user');?>">玩家查询</a><a href="<?php echo U('cps/edit_info');?>">资料修改</a><a href="<?php echo U('cps/newSupList');?>">扶持申请</a><a href="<?php echo U('cps/settle');?>">结算申请</a><a href="<?php echo U('cps/npay');?>">内充申请</a><a href="<?php echo U('cps/news');?>">通知</a><!--<a href="index.html" class="current"><span>首页</span></a><a href="tj.html" class=""><span>统计</span></a>--><div class="clear"></div></div><div class="logout"><span>欢迎您，<?php echo ($username); ?></span><span><a style="margin-left: 10px;" href="<?php echo U('cps/logout');?>">退出</a></span><div class="clear"></div></div><div class="clear"></div></div></div><div class="yui3-g" ><div class="yui3-u" style="width: 100%;"><div class="doc"><fieldset><legend>商户：<?php echo ($username); ?><a style="margin-left: 10px;" href="<?php echo U('cps/main');?>">充值总额</a><a style="margin-left: 10px;" href="<?php echo U('cps/playerrank');?>">玩家充值排名 </a><a style="margin-left: 10px;" href="<?php echo U('cps/gamerank');?>">游戏分区查询</a><a style="margin-left: 10px;" href="<?php echo U('cps/monthgame');?>">月游戏充值汇总</a><a style="margin-left: 10px;" href="<?php echo U('cps/tj');?>">趋势图</a></legend></fieldset><div><div style="margin:0 0 0 20px;min-width:1030px;"><div class="lj_con1 fl"><div class="z_zi">                充值总金额：<span><?php echo ($main['charge_sum']); ?>元</span></div><div class="z_zi">                充值总人数：<span><?php echo ($main['charge_count']); ?>人</span></div><div class="z_zi">                注册总人数：<span><?php echo ($main['reg_num']); ?>人</span></div><div class="z_zi">                上周注册人数：<span><?php echo ($main['reg_znum']); ?>个</span></div><div class="z_zi">                上周充值总额：<span><?php echo ($main['charge_zsum']); ?>元</span></div><div class="z_zi">                上周内充总额：<span><?php echo ($main['neichong']); ?>元</span></div><div class="z_zi">                上周充值结算：<span><?php echo ($main['jiesuan']); ?>元</span></div><!--            <div class="z_zi">                已结算佣金：<span>8486.78元</span></div><div class="z_zi">                剩余未结算佣金：<span>93.00元</span></div><div class="z_zi">                待审批结算佣金：<span>0.00元</span></div>--><div class="z_zi" style="color: red;">                温馨提示：金额达到200元，给予结算。
            </div></div><div class="lj_con2 fl"><div class="z_zi">                可申请新服：<span><a href="/supplier.php?m=support&amp;a=newSupport" target="_blank" class="czze" id="new_server_notice"><?php echo ($main['xffuchi']); ?>个</a></span></div><div class="z_zi">                未处理消费扶持申请：<span><a href="/supplier.php?m=support&amp;a=consumeSupList" target="_blank" class="czze"><?php echo ($main['xfuchi']); ?>个</a></span></div><div class="z_zi">                未处理周固定扶持申请：<span><a href="/supplier.php?m=support&amp;a=followSupList" target="_blank" class="czze"><?php echo ($main['zfuchi']); ?>个</a></span></div><div class="z_zi" style="color: red;">                温馨提示：待处理申请,可进行快捷跳转。
            </div></div><div class="clear"></div></div><div class="clear"></div><div class="bottom_box"><div class="bottom_01" id="container"></div><div class="bottom_02" id="container_1"></div></div><script type="text/javascript">$(document).ready(function () {
  
    $.post("/CpsCommon/index_dailyView",{},function(data){
            $('#container').highcharts({
                    chart: {
                        type: 'spline'
                    },
                    title: {
                        text: '每日人数报表'
                    },
                    subtitle: {
                        text: 'http://<?php echo ($ai["domain"]); ?>'
                    },
                    xAxis: {
                        categories: data.date
                    },
                    yAxis: {
                        title: {
                            text: '人数'
                        },
                        min: 0
                    },
                    tooltip: {
                        formatter: function() {
                                return '<b>'+ this.series.name +'</b><br/>'+
                                this.x+': '+this.y+'人';
                        }
                    },

                    series: [
                        {
                        name: '新注册人数',
                        data: data.reg_num
                        }, 

                        {
                        name: '充值人数',
                        data: data.charge_num
                    }
                ]
            });
            
            $('#container_1').highcharts({
                    chart: {
                        type: 'spline'
                    },
                    title: {
                        text: '每日充值额报表'
                    },
                    subtitle: {
                         text: 'http://<?php echo ($ai["domain"]); ?>'
                    },
                    xAxis: {
                        categories: data.date
                    },
                    yAxis: {
                        title: {
                            text: '总额'
                        },
                        min: 0
                    },
                    tooltip: {
                        formatter: function() {
                                return '<b>'+ this.series.name +'</b><br/>'+
                                this.x+': '+this.y+'元';
                        }
                    },

                    series: [
                        {
                        name: '充值总额',
                        data: data.charge_sum
                        }, 

                        {
                        name: '内充总额',
                        data: data.fuli_sum
                    }
                ]
            });
        });
    });
    
    
        
</script><script src="http://tg.995pk.com/static/js/charts/highcharts.js"></script><script src="http://tg.995pk.com//static/js/charts/modules/exporting.js"></script></div></div></div></div></body></html>