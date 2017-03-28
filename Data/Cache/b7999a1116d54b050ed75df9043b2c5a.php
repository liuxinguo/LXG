<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>游戏盒子</title><meta name="keywords" content=""/><meta name="description" content=""/><link href="http://<?php echo ($ai["domain"]); ?>/images/hezi/css/style.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="http://gamebox.49you.com/js/jquery-1.7.2.js"></script><script language="javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><!--[if lte IE 6]><style type="text/css">    table {border-collapse:collapse;margin:0;padding:0;}

    .startyx_div a.hide, .startyx_div a:visited.hide {display:none;}

    .startyx_div a.hide:hover {color:#fff;background:#b3ab79;}

    .startyx_div a.hide:hover ul {display:block;position:absolute;bottom:20px;left:0;width:65px;height:24px;}

    .startyx_div a.hide:hover ul li a {background:#faeec7;color:#000;}

    .startyx_div a.hide:hover ul li a:hover {background:#dfc184;color:#000;}

</style><![endif]--><script type="text/javascript">    //周排行

    var show_king_id = 1;

    function show_king_list(e,k)

    {

        if(show_king_id == k) return true;

            o = document.getElementById("a"+show_king_id);

            o.className = "bg bor";

            //o.style.borderBottom = "1px solid #bbc1c4";

            

        e.className = " ";

        

        show_king_id = k;

    }

    

    function show_king_list2(e,k)

    {

        if(show_king_id == k) return true;

            o = document.getElementById("a1"+show_king_id);

            o.className = "bg bor";

            //o.style.borderBottom = "1px solid #bbc1c4";

            

        e.className = " ";

        

        show_king_id = k;

    }

</script></head><body><div class="wrap_div"><div class="wrap1_div"><div class="wrap_left fl"><div class="topwrap_div"><!--foc_div start--><div class="foc_div fl"><div id="focus"><ul><?php if(is_array($pub_article_flash)): $i = 0; $__LIST__ = $pub_article_flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$flash): $mod = ($i % 2 );++$i;?><li><a href="<?php if($flash["j"] == '1'): echo ($flash["url"]); else: ?>/article/<?php echo ($flash["id"]); endif; ?>"><img src="<?php echo ($flash["pic"]); ?>" width="466" height="187"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><!--foc_div end--><div class="tcimg_div fl"><a href="http://directtotab:3" class="tcimg_a1 db"><img src="/images/hezi/images/53cc6f2924e35.jpg" width="216" height="88" /></a><a href="http://directtotab:3" class="tcimg_a2 db"><img src="/images/hezi/images/53cc6efbb8b0a.jpg" width="216" height="88"></a></div></div><p class="rmtj_p pr">热门推荐

		  

          <a href="games_daquan.html" class="more_a pa db">更多></a></p><!--tj_ul start--><ul class="tj_ul"></ul><!--tj_ul end--><!--tj_ul2 start--><ul class="tj_ul2"></ul><!--tj_ul2 end--></div><div class="wrap_right fl"><!--yxph_div start--><div class="yxph_div"><div id="tab-title"><span class="selected">游戏周排行榜</span><span>最新游戏行榜</span></div><div id="tab-content"><div><div class="star" id="weeklist"></div></div><div class="hide "><div class="star" id="monthlist"></div></div></div></div><!--yxph_div end--><script type="text/javascript">	//周排行

	var show_king_id = 1;

	function show_king_list(e,k)

	{

		if(show_king_id == k) return true;

			o = document.getElementById("a"+show_king_id);

			o.className = "bg bor";

			//o.style.borderBottom = "1px solid #bbc1c4";

			

		e.className = " ";

		

		show_king_id = k;

	}

	

	function show_king_list2(e,k)

	{

		if(show_king_id == k) return true;

			o = document.getElementById("b"+show_king_id);

			o.className = "bg bor";

			//o.style.borderBottom = "1px solid #bbc1c4";

			

		e.className = " ";

		

		show_king_id = k;

	}

  function logingame(url){

    if(typeof(window.external.logingame) == 'undefined' ){

      window.location.href=url;

    }else{

      window.external.logingame(url);

    }

  }

     $.ajax({

        type: "get",

        async: true,

        url: api_hezi+"/weekandmonth",

        data:{},

        dataType: "jsonp",

        jsonp: "callback",

        jsonpCallback:"_apilist",

        success: function(json) {

           var weeklist = json.week; 

           var monthlist = json.month;

           for(x in weeklist){

              x = parseInt(x);

              var gameurl = "server_list.html?gid="+weeklist[x].game_id;

              var weekdl = '<dl id=a'+(1+x)+' '+ (x==0 ? 'style=" overflow:hidden;"' : " class=bg") +' onmouseover=show_king_list(this,'+(1+x)+');><dt class="sl01" style="'+(x==0?'background:#e41313':(x==1?'background:#f66d1a':(x==2?'background:#ffc600':'')))+';">'+(1+x)+'</dt><dt class="sl02"><a href="'+gameurl+'"><img src="'+image_url+weeklist[x].ico+'" width="30" height="30" /></a></dt><dt class="sl03"><a href="'+gameurl+'" ><img src="'+image_url+weeklist[x].ico+'" width="20" height="20" /></a></dt><dd class="sl04"><a href="'+gameurl+'">'+weeklist[x].game_name+'</a><br />'+weeklist[x].game_pay_num+'人在线</dd><dd class="sl05"><a href="'+gameurl+'">'+weeklist[x].game_name+'</a>&nbsp;&nbsp;<img src="/images/hezi/images/hicon.jpg" alt="" /></dd><dd class="sl06"><a href="'+gameurl+'"><img src="/images/hezi/images/startyxbtn.jpg" alt="" /></a></dd><dd class="sl07">'+ weeklist[x].game_class +'></dd></dl>';

                            

              $('#weeklist').append(weekdl);

           }

           for(y in monthlist){

              y = parseInt(y);

              var gameurl = "server_list.html?gid="+monthlist[y].game_id;

             var monthdl = '<dl id=b'+(1+y)+' '+ (y==0 ? 'style=" overflow:hidden;"' : " class=bg") +' onmouseover=show_king_list2(this,'+(1+y)+');><dt class="sl01" style="'+(y==0?'background:#e41313':(y==1?'background:#f66d1a':(y==2?'background:#ffc600':'')))+';">'+(1+y)+'</dt><dt class="sl02"><a href="'+gameurl+'"><img src="'+image_url+monthlist[y].ico+'" width="30" height="30"  /></a></dt><dt class="sl03"><a href="'+gameurl+'"><img src="'+image_url+monthlist[y].ico+'" width="20" height="20" /></a></dt><dd class="sl04"><a href="'+gameurl+'">'+monthlist[y].game_name+'</a><br />'+monthlist[y].game_pay_num+'人在线</dd><dd class="sl05"><a href="'+gameurl+'">'+monthlist[y].game_name+'</a>&nbsp;&nbsp;<img src="/images/hezi/images/hicon.jpg" alt="" /></dd><dd class="sl06"><a href="'+gameurl+'"><img src="/images/hezi/images/startyxbtn.jpg" alt="" /></a></dd><dd class="sl07">'+ monthlist[y].game_class +'></dd></dl>';

                            

              $('#monthlist').append(monthdl);

           }

 

        },

        error: function() {}

    });      

  </script><!--glmj_p start--></div></div><script type="text/javascript">$(function() {

    /******焦点图******/

    var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）

    var len = $("#focus ul li").length; //获取焦点图个数

    var index = 0;

    var picTimer;

    

    //以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮

    var btn = "<div class='btnBg'></div><div class='btn'>";

    for(var i=0; i < len; i++) {

        btn += "<span></span>";

    }

    //btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";

    $("#focus").append(btn);

    $("#focus .btnBg").css("opacity",0.5);

    //$("#focus .btn span").css("backgroundColor","#1ecbfd");



    //为小按钮添加鼠标滑入事件，以显示相应的内容

    $("#focus .btn span").css("opacity",0.4).mouseenter(function() {

        index = $("#focus .btn span").index(this);

        showPics(index);

    }).eq(0).trigger("mouseenter");



    //本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度

    $("#focus ul").css("width",sWidth * (len));

    

    //鼠标滑上焦点图时停止自动播放，滑出时开始自动播放

    $("#focus").hover(function() {

        clearInterval(picTimer);

    },function() {

        picTimer = setInterval(function() {

            showPics(index);

            index++;

            if(index == len) {index = 0;}

        },2000); //此4000代表自动播放的间隔，单位：毫秒

    }).trigger("mouseleave");

    

    //显示图片函数，根据接收的index值显示相应的内容

    function showPics(index) { //普通切换

        var nowLeft = -index*sWidth; //根据index值计算ul元素的left值

        $("#focus ul").stop(true,false).animate({"left":nowLeft},300); //通过animate()调整ul元素滚动到计算出的position

        $("#focus .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果

        $("#focus .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //为当前的按钮切换到选中的效果

    }

});



 $(document).ready(function() {

    $.ajax({

        type: "get",

        async: true,

        url: api_hezi+"/boxserver",

        data:{},

        dataType: "jsonp",

        jsonp: "callback",

        jsonpCallback:"boxserver",

        success: function(json) {

          for(var x=0;x<=3;x++){ 

            if(x<json.length){

              var classid=json[x].game_class;

              if(classid==1){var class_name='即时战斗';}

              if(classid==2){var class_name='武侠闯关';}

              if(classid==3){var class_name='神话修真';}

              if(classid==4){var class_name='历史题材';}

              if(classid==5){var class_name='Q版萌系';}

              if(classid==6){var class_name='其他类型';}   

             $('.tj_ul').append('<li class="tjlast"><div class="photo"><a href="server_list.html?gid='+json[x].game_id+'"><img src="'+image_url+json[x].pic+'" width="144" height="201"></a><div class="caption" style="display: none; bottom: 0px; opacity: 0;"><span>最新服务器</span><span><img width="9" height="9" src="images/new1.gif">&nbsp;<a style="color:#ff6c00;" href="#" onclick="logingame(\'http://gameplay.<?php echo ($ai["url"]); ?>/game_add.html?gid='+json[x].game_id+'&sid='+json[x].sid+'\')">'+json[x].game_name+'&nbsp;'+ json[x].snum +'服</a></span></div></div><div class="rminfo_div"><p>'+json[x].game_name+'<br><a target="_blank" href="'+json[x].game_web+'">进入官网</a></p><a href="server_list.html?gid='+json[x].game_id+'" class="startgame_a">开始游戏</a></div></li>');



             }

           }  

          for(var x=4;x<=7;x++){ 

            if(x<json.length){

              var classid=json[x].game_class;

              if(classid==1){var class_name='即时战斗';}

              if(classid==2){var class_name='武侠闯关';}

              if(classid==3){var class_name='神话修真';}

              if(classid==4){var class_name='历史题材';}

              if(classid==5){var class_name='Q版萌系';}

              if(classid==6){var class_name='其他类型';}   

             $('.tj_ul2').append('<li class="lastli"><a href="server_list.html?gid='+json[x].game_id+'" class="tjimg_a"><img src="'+image_url+json[x].ico+'" width="70" height="63" /></a><div class="tjinfo_div"><p class="tjinfo_p"><a href="server_list.html?gid='+json[x].game_id+'">'+json[x].game_name+'</a><br />'+class_name+'</p><div class="startyx_div"><ul><li><a href="server_list.html?gid='+json[x].game_id+'">开始游戏<img src="/images/hezi/images/arrowico.jpg" width="15" height="14" /></a></li></ul></div></div></li>');



             }

           }

          $(".lastli:last").css("margin-right","0px"); 

          $(".tjlast:last").css("margin-right","0px"); 

        },

        error: function() {}

    });

});



</script><script language="javascript">$(document).ready(function(){

    $('#tab-title span').hover(function(){

        $(this).addClass("selected").siblings().removeClass();//removeClass就是删除当前其他类；只有当前对象有addClass("selected")；siblings()意思就是当前对象的同级元素，removeClass就是删除；

        $("#tab-content > div").hide().eq($('#tab-title span').index(this)).show();

    });



    $('#newstab-title span').hover(function(){

        $(this).addClass("selected").siblings().removeClass();//removeClass就是删除当前其他类；只有当前对象有addClass("selected")；siblings()意思就是当前对象的同级元素，removeClass就是删除；

        $("#newstab-content > div").hide().eq($('#newstab-title span').index(this)).show();

    });

    

    $('.zxsp_ul li').live("hover",function(){

        $(this).find('a').fadeIn(100);

    });

    $('.zxsp_ul li').live("mouseleave",function(){

        $(this).find('a').fadeOut(100);

    });

    

    $('.glmj_ul li').live("hover",function(){

        $(this).find('a.arrowdiv0').fadeIn(100);

    });

    $('.glmj_ul li').live("mouseleave",function(){

        $(this).find('a.arrowdiv0').fadeOut(100);

    });

    

    $('.photo').live("hover",function(){

        $(this).find(".caption").slideDown().animate({"bottom":"0px",opacity:0.75},100);

    });

    $('.photo').live("mouseleave",function(){

        $(this).find(".caption").slideUp().animate({"bottom":"0px",opacity:0},100);

    });

});

</script></div></body></html>