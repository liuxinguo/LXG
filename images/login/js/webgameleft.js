//只允许在iframe下显示
if(undefined == window.parent.frames["leftFrame"]){
    window.location.href="/"; 
}
var qd_need_sign = 0;
var webgameleft = {
	init:function(){
		var gid = $('#gid').val();
	    var sid = $('#sid').val();
			$(".menu_linkone").bind('click',function(){
				//当前a标签的+ -符号
				if($(this).next('ul').is(":visible")){
				    $(this).removeClass("sonList_con");
				}else{
					$(this).addClass("sonList_con");
				}
				//当前子菜单的显隐
				$(this).next('ul').toggle().parent('li').siblings('.hasChild').children('a').removeClass("sonList_con").next('ul').hide();
	    });
	    $('#webgameleft_ncards').bind('click', function() {
	    	window.parent.frames['rightFrame'].xsk_layer_js();
	    });
	    $('#webgameleft_act').bind('click', function() {
	    	window.parent.frames['rightFrame'].act_layer_js();
	    });
	    $('#webgameleft_raiders').bind('click', function() {
	    	window.open('http://game.51.com/news/ls/'+gid+'/1/2');
	    });
	    $('#webgameleft_screenshots').bind('click', function() {
	    	alert('功能开发中...');
	    });
	    $('#webgameleft_customer').bind('click', function() {
	    	window.parent.frames['rightFrame'].kf_layer_js();
	    });

			$('#qd_li2_a').bind('click', function() {
	    	clickByID(2);
	    });
	    $('#webgameleft_ncards2').bind('click', function() {
	    	window.parent.frames['rightFrame'].xsk_layer_js();
	    });
	    $('#webgameleft_act2').bind('click', function() {
	    	window.parent.frames['rightFrame'].act_layer_js();
	    });
	    $('#webgameleft_raiders2').bind('click', function() {
	    	window.open('http://game.51.com/news/ls/'+gid+'/1/2');
	    });
	    $('#webgameleft_screenshots2').bind('click', function() {
	    	alert('功能开发中...');
	    });
	    $('#webgameleft_customer2').bind('click', function() {
	    	window.parent.frames['rightFrame'].kf_layer_js();
	    });

	},

	 setTopSwfSize:function(w,h){
//		$('#baiTuVideo').attr('width',w);
//		$('#baiTuVideo').attr('height',h);
	 },
         
         retention_flash:function(){
            var gid = $('#gid').val();//241
            var sid = $('#sid').val();//5640
            var is_wt_shouchong = 1;
            var time_task_param;
            if(is_wt_shouchong == 1) {
		            var flashvars = {};
		            flashvars.isHLight = 1;
		            var params = {};
		            params.quality = "high";
		            params.wmode = "transparent";
		            params.allowScriptAccess = "always";
		            var obj_param = {};
		            obj_param.id = 'wtsc_obj';
		            obj_param.name = 'wtsc_obj';
		            swfobject.embedSWF("http://static.51img1.com/v3/op/gamenew.51.com/platform/webgame/flash/shouchong.swf?v=20140120002", "wtsc_flash", "92", "108", "10.3.0", false, flashvars, params, obj_param);
		          
		            $('#wtsc_flash_div').show();
		            $('#wtsc_li2_li').show();

	               
	                    //判断是否加载勋章任务flash
	                 
	                        var flashvars = {};
	                        flashvars.icon = "/images/login/images/wd.png";
	                        flashvars.isHLight = 1;
	                        
	                        var params = {};
	                        params.quality = "high";
	                        params.wmode = "transparent";
	                        params.allowScriptAccess = "always";
	                        
	                        var obj_param = {};
	                        obj_param.id = 'xz_obj';
	                        obj_param.name = 'xz_obj';
	                        
	                        swfobject.embedSWF("/images/login/swf/xz.swf?v=20131209001", "xz_flash", "105", "130", "10.3.0", false, flashvars, params, obj_param);
	                        $('#xz_flash_div').show();

	                  
	                    
	                    //载入签到flash
	                    qd_need_sign = 1;
	                    var flashvars = {};
	                    flashvars.isHLight = 1;
	                    var params = {};
	                    params.quality = "high";
	                    params.wmode = "transparent";
	                    params.allowScriptAccess = "always";
	                    var obj_param = {};
	                    obj_param.id = 'qd_obj';
	                    obj_param.name = 'qd_obj';
	                    swfobject.embedSWF("http://static.51img1.com/v3/op/gamenew.51.com/platform/webgame/flash/qd.swf?v=20131209001", "qd_flash", "105", "70", "10.3.0", false, flashvars, params, obj_param);
	                    
	                    //判断是否加载积分任务flash
	                    
	                         var flashvars = {};
	                        flashvars.num = 1800;
	                        flashvars.isHLight = 1;
	                        var params = {};
	                        params.quality = "high";
	                        params.wmode = "transparent";
	                        params.allowScriptAccess = "always";
	                        var obj_param = {};
	                        obj_param.id = 'jf_obj';
	                        obj_param.name = 'jf_obj';
	                        swfobject.embedSWF("http://static.51img1.com/v3/op/gamenew.51.com/platform/webgame/flash/jf.swf?v=20140121001", "jf_flash", "105", "70", "10.3.0", false, flashvars, params, obj_param);
	                        $('#jf_flash_div').show();

	               
	              
	           
	      		}
        }
	 	
} 

//点击勋章flash触发
function clickByID(flashtype) {
	var weiduan = $('#weiduan').val();
	var tag = $('#tag').val();
    if (1 == parseInt(flashtype)) {
	
	if (weiduan =="")
       {
    alert('该游戏暂时无微端..');
    
	   }else {
    	window.open(weiduan);
      }
 
    }else if (2 == parseInt(flashtype)) {
        window.open('http://my./?sign=1');
    }else if (3 == parseInt(flashtype)) {
        window.open('http://my./?sign=2');
    }else if (4 == parseInt(flashtype)) {
    	window.open('http://fuli.752g.com/fuli/'+tag+'/#sc');
    }
    stop_run(flashtype);
}

function stop_run(flashtype)
{
    if (1 == parseInt(flashtype))
    {
        xz_obj.setHLight(0);
    }
    else if (2 == parseInt(flashtype))
    {
        qd_obj.setHLight(0);
    }
    else if (3 == parseInt(flashtype))
    {
        jf_obj.setHLight(0);
    }
    else if (4 == parseInt(flashtype))
    {
        wtsc_obj.setHLight(0);
    }
}


function CheckVideoPlay(gid,urlname){
		$.ajax({

			success: function(backdata){

				
					$('#zb_li2').show();
					$('#zb_li2_li').show();
			
			}
		});
		
}


$(document).ready(function(){
		webgameleft.retention_flash();
		webgameleft.init();
});
