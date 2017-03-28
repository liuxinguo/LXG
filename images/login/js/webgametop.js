//只允许在iframe下显示
if(undefined == window.parent.frames["topFrame"]){
    window.location.href="/"; 
}
var right_frame_ready = false;
var top_scjf_val = $("#scjf").val();

var webgametop = {
	    init:function(){
	        //真人配对
	        //$(".icon_zrpd").bind("click",function(){ window.parent.frames["rightFrame"].showonline(1); });
	
	        //打开工具条
            $(".tools_open").bind("click",function(){$(".tools_top").show();$(".tools_open").hide();webgametop.changeHeight("open");});

	        //收藏夹
            $("#favorite").bind("click",function(){
                var fav_title = $('#fav_title').val();
	            var fav_url = $('#fav_url').val();
    	        try { 
    		        window.external.addFavorite(fav_url, fav_title); 
    	        }catch(e) { 
    		        try { 
    			        window.sidebar.addPanel(fav_title, fav_url, ""); 
    		        }catch(e) {
                      alert("请使用Ctrl+D进行添加");
                      }
               }
            });
            //收起工具条
            $(".close_tools").bind("click",function(){ $(".tools_top").hide();$(".tools_open").show(); webgametop.changeHeight("close");});
	    },
		
		//收起打开工具条,父页面高度切换
		changeHeight:function(action){
            $(window.parent.document).find("#mainFrame").attr("rows",(('close'==action)?'9':'40')+",*");
        },

        //用户名 公告滚动
		bulletin:function(){
	        var bulletin_sum = $("#tools_bulletin >a").length;
	        var bulletin_first = $("#tools_bulletin >a:first").show();
	        var bulletin_last = $("#tools_bulletin >a:last");

	        setInterval(function(){
	            $(".user_name:visible").hide().siblings("strong").fadeIn("500");
	            if(0 == bulletin_sum) return true;

		        if(bulletin_last.is(":visible")){
		            bulletin_last.hide();
                    bulletin_first.fadeIn(500);
	            }else{
	                $("#tools_bulletin >a:visible").hide().next("a").fadeIn("500");
		        }
	        },3000);
		},

		//统计绑定
		bindstat:function(){
			$(".close_tools").bind('click',function(){window.parent.frames["leftFrame"].is_topbar(0);window.parent.frames["leftFrame"].is_webgameleft_log(1);});
			$(".tools_open").bind('click',function(){window.parent.frames["leftFrame"].is_topbar(1);window.parent.frames["leftFrame"].is_webgameleft_log(0);});
		},
	    //积分任务显示
		pointshow:function(){
            $(".tools_jspoint").hide();
            $(".tools_jstask").show();
		},
	    //积分任务隐藏
		pointhide:function(){
		    $(".tools_jstask").hide();
			if($("#sclb_20130201").length>0)
			{
				$(".tools_jspoint").show();
				$("#sclb_20130201").show();
				$("#jfsc_20130201").hide();
				$("#scjf").val(1);
			}
			else
			{
				 $(".tools_jspoint").show();
				
			}
			$.post("http://game.51.com/webgametop/jifen/", {},function(data){
                $(".i_money").text(data);
            },'text');
			
		},
	    close_first_pay:function(){ 
             if(!right_frame_ready || 0 == top_scjf_val) return true;
			 window.parent.frames["rightFrame"].close_first_pay(); 
		},
		open_first_pay:function(){
			 if(!right_frame_ready || 0 == top_scjf_val) return true;
		     window.parent.frames["rightFrame"].open_first_pay(); 
		}

    };

var js_fllow = {
    get_cookie:function (c_name){
        if (document.cookie.length>0) {
            var c_start=document.cookie.indexOf(c_name + "=");
            if (c_start!=-1) { 
                c_start=c_start + c_name.length+1; 
                var c_end=document.cookie.indexOf(";",c_start);
                if (c_end==-1) c_end=document.cookie.length;
                return unescape(document.cookie.substring(c_start,c_end));
            } 
        }
        return "";
    },
    js_flow_cookie:function(){
        var image = new Image();
        image.src="http://game.51.com/tools/js_flow_cookie/?channel_alias=&r="+Math.random();            
     },
    run:function(){
        var wt_ch_flow = js_fllow.get_cookie('wt_ch_flow');        
        if('' != wt_ch_flow){
            var _frame_str = '<iframe id="win_frame" width="0px" height="0px" frameborder="0" align="left" src="http://game.51.com/tools/wt_js/?channel_alias='+wt_ch_flow+'&js_type=js_2&r='+Math.random()+'" name="js_r"></iframe>';
            document.getElementById('js_fllow').innerHTML = _frame_str;
            js_fllow.js_flow_cookie();
        }
    }
};

//动作统计
function click_stat(key, c2, c3){
	var c = 'game_platform';
	(new Image()).src = 'http://game.51.com/dss_stat/stat2?a='+key+'&c='+c+'&c2='+c2+'&c3='+c3+'&v='+Math.random();
	return true;
}

$(document).ready(function(){
    webgametop.init();
    webgametop.bulletin();
    webgametop.bindstat();
    js_fllow.run();
        
});

