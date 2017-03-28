<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=7" /><title>游戏盒子</title><meta name="keywords" content=""><meta name="description" content="49you游戏盒子开服表大全为您提供最全最新的游戏盒子开服表，游戏盒子新服，游戏盒子新区，让您随时了解游戏盒子最新开服信息。"><link href="http://<?php echo ($ai["domain"]); ?>/images/hezi/css/style.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="http://gamebox.49you.com/js/jquery-1.7.2.js"></script><script language="javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script></head><body><div class="wrap_div"><div class="wrap1_div"><div class="wrap_left fl"><div class="contopwrap_div"><div class="contopleft_div fl"><img src="images/youxihe/images/index4conpic.jpg" width="262" height="222" /></div><div class="contopright_div fl"><h1 id="game_name"></h1><p class="coninfo_p" id="game_desc"></p><div style=" height:18px; line-height:18px; margin:3px 0;"><!-- JiaThis Button BEGIN --><div class="jiathis_style"><a class="jiathis_button_tsina"></a><a class="jiathis_button_tqq"></a><a class="jiathis_button_weixin"></a><a class="jiathis_button_renren"></a><a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a></div><script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1401860233759115" charset="utf-8"></script><!-- JiaThis Button END --></div><p class="coninfo_p" >类型：<span style="color:#0888e1;" id="game_class"></span><br />人数：<span style="color:#0888e1;" id="game_pay_num"></span><br /><span id="gameinfolist"></span></p><p style="margin-top:10px;"><a href="#"  target="_blank"  class="jrgw_a" id="game_web">进入官网</a><a href="#" class="xslb_a" target="_blank" id="game_card">新手礼包</a><a href="#" id="kaishi" class="ksyx_a">开始游戏</a></p></div></div><div class="serverlist_div"><div id="servertab-title"></div><div id="servertab-content" style="overflow:hidden"></div></div></div><div class="wrap_right fl"><!--yxph_div start--><div class="yxph_div"><div id="tab-title"><span class="selected">游戏周排行榜</span><span>最新游戏行榜</span></div><div id="tab-content"><div><div class="star" id="weeklist"></div></div><div class="hide "><div class="star" id="monthlist"></div></div></div></div><!--yxph_div end--><script type="text/javascript">	//周排行

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

  </script><!--glmj_p start--><!--glmj_p end--><!--yxnews_div start--><!--yxnews_div end--></div></div></div><script language="javascript">$(document).ready(function(){

  $('#tab-title span').hover(function(){

    $(this).addClass("selected").siblings().removeClass();//removeClass就是删除当前其他类；只有当前对象有addClass("selected")；siblings()意思就是当前对象的同级元素，removeClass就是删除；

    $("#tab-content > div").hide().eq($('#tab-title span').index(this)).show();

  });



  $('#newstab-title span').hover(function(){

    $(this).addClass("selected").siblings().removeClass();//removeClass就是删除当前其他类；只有当前对象有addClass("selected")；siblings()意思就是当前对象的同级元素，removeClass就是删除；

    $("#newstab-content > div").hide().eq($('#newstab-title span').index(this)).show();

  });

  

  $('#servertab-title span').live("hover",function(){

    $(this).addClass("selected").siblings().removeClass();//removeClass就是删除当前其他类；只有当前对象有addClass("selected")；siblings()意思就是当前对象的同级元素，removeClass就是删除；

    $("#servertab-content > div").hide().eq($('#servertab-title span').index(this)).show();

  });

  

  $('.zxsp_ul li').hover(function(){

    $(this).find('a').fadeIn(100);

  });

  $('.zxsp_ul li').mouseleave(function(){

    $(this).find('a').fadeOut(100);

  });

  

  $('.glmj_ul li').hover(function(){

    $(this).find('a.arrowdiv0').fadeIn(100);

  });

  $('.glmj_ul li').mouseleave(function(){

    $(this).find('a.arrowdiv0').fadeOut(100);

  });

});

</script><script language="javascript">  function GetQueryString(name) {

       var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)","i");

       var r = window.location.search.substr(1).match(reg);

       if (r!=null) return (r[2]); return null;

    }

    var gid =GetQueryString("gid");

    if( gid == null){

        var gid = 89; //如果为空则显示魔龙决的信息

    }



    //获取游戏信息

    $.ajax({

        type: "get",

        async: true,

        url: api_hezi+"/gameinfo?gid="+gid,

        data:{},

        dataType: "jsonp",

        jsonp: "callback",

        jsonpCallback:"gameinfo",

        success: function(json) {

          $('#game_name').html(json.game_name);

          $('#game_desc').html(json.game_desc);

          var classid=json.game_class;

          if(classid==1){var class_name='即时战斗';}

          if(classid==2){var class_name='武侠闯关';}

          if(classid==3){var class_name='神话修真';}

          if(classid==4){var class_name='历史题材';}

          if(classid==5){var class_name='Q版萌系';}

          if(classid==6){var class_name='其他类型';}

  

          $('#game_class').html(class_name);



          $('#game_card').attr('href',libao_url);

          $('#game_web').attr('href',json.game_web);

          

          $('#game_pay_num').html(json.game_pay_num);

          $('.contopleft_div img').attr("src",image_url+json.pic);

        },

        error: function() {}

    });

   $('#servertab-content').html('<img src="/images/hezi/images/loading.gif" style="margin: 60px auto 0px 350px;">');

 

   //获取游戏区服列表

     $.ajax({

        type: "get",

        async: true,

        url: api_hezi+"/boxserverByGid?gid="+gid,

        data:{},

        dataType: "jsonp",

        jsonp: "callback",

        jsonpCallback:"_apiServerAll",

        success: function(serlist) {

           $('#servertab-content').html('');

           var serinfo = serlist.info;

           var sermax = serinfo.length-1;

           $('#userserve').html(serinfo[sermax].server_name);

           $('#kaishi').bind("click", function(){

                logingame("http://gameplay.{$ai.url}/righ.html?gid="+gid+"&hezi=1&sid="+serinfo[sermax].server_id);

           });

           $('#gameinfolist').html('最新区服：<span style="color:#ff7200;" id="userserver">'+serinfo[sermax].server_name+'</span>');

           var maxfuzi = (/[0-9]+服/.exec(serinfo[sermax].server_name));

           if(gid == 89){

            var maxfu =serinfo.length;

           }else{

            var maxfu =(/[0-9]+/.exec(maxfuzi))*1;

           }

           if(serinfo.length<900){

           var count = 100; 

           

           }else{

             var count = 200;

           }

           if(maxfu>2){

            var page = parseInt((maxfu-2)/count)+1;

          }else{

            var page = 1;

          }

           

           var paged = page-1;



           for(var y = 0;y<=page;page--){

             id = page +1;

             var  num = count*page+1;

             var  num2 = count*page+count;



             if(serinfo.length>=num){

                if(paged == page){

                 $('#servertab-title').append('<span class="selected">'+num+'-'+maxfu+'服</span>');

                 $('#servertab-content').append('<div  ><ul id="serlist'+id+'" class="serverlist_ul"></ul><div class="cl"></div></div>')

                }else{

                  $('#servertab-title').append('<span>'+num+'-'+num2+'服</span>');

                  $('#servertab-content').append('<div class="hide" ><ul id="serlist'+id+'" class="serverlist_ul"></ul><div class="cl"></div></div>')

                }

                

               

                for(var x = num;x<=num2;num2--){

                  var num3 = num2-1;

                  if(num2<=serinfo.length){

                    if(serinfo[num3].server_isnew ==0){

                      $('#serlist'+id).append('<li ><a onclick=logingame("http://gameplay.<?php echo ($ai["url"]); ?>/righ.html?gid='+gid+'&sid='+serinfo[num3].server_id+'&hezi=1") href="#">'+serinfo[num3].server_name+'</a></li>');

                     }

                    if(serinfo[num3].server_isnew ==1){

                     $('#serlist'+id).append('<li><a onclick=logingame("http://gameplay.<?php echo ($ai["url"]); ?>/righ.html?gid='+gid+'&sid='+serinfo[num3].server_id+'&hezi=1") href="#">'+serinfo[num3].server_name+'</a><span style="display:inline-block;">新服</span></li>');

                    }

                  }

               }

             }

           }   

          

         },

        error: function() {}

    });

function zuihou(){

  $.ajax({

        type: "get",

        async: true,

        url: api_hezi+"/boxnewserver?gid="+gid,

        data:{},

        dataType: "jsonp",

        jsonp: "callback",

        jsonpCallback:"_apiboxserver",

        success: function(boxserver) {          

          if(boxserver.length==1){

           $('#gameinfolist').html('最近登录：<span style="color:#ff7200;" id="userserver">'+boxserver[0].mg_server_name+'</span>');

           $('#kaishi').unbind("click");

           $('#kaishi').bind("click", function(){

                logingame("http://gameplay.{$ai.url}/righ.html?gid="+gid+"&hezi=1&sid="+boxserver[0].mg_server_id);

           });

          }   

        },

        error: function() {}

    });  

  }

  window.onload=zuihou;

</script></body></html>