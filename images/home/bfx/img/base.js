//banner滚动
function banner(obj,time){
    obj = $(obj);
    var sWidth = obj.width();
    var len1 = obj.find('li').length; 
    var index = 0;
    var sm=$("<div class='sm'></div>")
    var focus_ul=obj.find('ul');
    var picTimer;
    var btn = "<div class='btn'>";
    for(var i=0; i < len1; i++) {
	    btn += "<span></span>";
    }
    btn += "</div><a class='preNext pre' href='javascript:;'></a><a class='preNext next' href='javascript:;'></a>";
    obj.append(btn);
    obj.find('.btn span').mouseenter(function(){
	    index = obj.find('.btn span').index(this);
	    showPics(index);
    }).eq(0).trigger("mouseenter");
    obj.find('.preNext').css("opacity",0.8).hover(function(){
	    $(this).stop(true,false).animate({"opacity":"1"},300);
    },function(){
	    $(this).stop(true,false).animate({"opacity":"0.8"},300);
    });
    obj.find('.pre').click(function(){
	    index -= 1;
	    if(index == -1){
		    index = len1 - 1;
		}
	    showPics(index);
    });
    obj.find('.next').click(function(){
	    index += 1;
	    if(index == len1){
		    index = 0;
		}
	    showPics(index);
    });
    $(focus_ul).css("width",sWidth * (len1));
    obj.hover(function(){
	    clearInterval(picTimer);
    },function(){
	    picTimer = setInterval(function(){
		    showPics(index);
		    index++
		    if(index === len1){
			    index = 0;
			}
	    },time);
    }).trigger("mouseleave");


    function showPics(index) { 
    	var nowLeft = -index*sWidth; 
    	$(focus_ul).stop(true,false).animate({"left":nowLeft},300); 
    	obj.find('.btn span').stop(true,false).removeClass("on").eq(index).stop(true,false).addClass("on");
    };
}


//图片滚动
function scroll(_wrap,time,warp1,style){
    var _wrap = $(_wrap);
    //var warp = $(warp1);
    var adtimer="";
    var meiti_len = _wrap.find("li").length;
    if (meiti_len > 2) {
    	_wrap.hover(function() {
    		clearInterval(adtimer);
    	},function() {
    		adtimer = setInterval(function() {
    			var _field = _wrap.find('li:first');
				if(style=='marginTop'){
				    var _h = _field.height();
					_field.animate({'marginTop': -_h + 'px'},800,
    			    function(){
    				    _field.css('marginTop', '0px').appendTo(warp1);
    			    })
				}else{
				    var _h = _field.width();
					_field.animate({ 'marginLeft': -_h + 'px'},800,
    			    function() {
    				    _field.css('marginLeft', '0px').appendTo(warp1);
    			    })
				}  			
    		},
    		time);
        }).trigger("mouseleave");
    }
}

//判断登录状态
var head = {
	init:{
		log_status:function(init){
			if(init==true){
				$.getJSON('http://api.65.com/65user/login_status.php?callback=?',{gid:gid},function(da){
					if(da.code=='1'){
						$('#login-before,.login-q').css('display','none');
						$('#uname,#tipname').html(da.data.UNAME);
						$('#logined,.login-h').css('display','block');
                        $('#login-before').hide();
                        $('#login-wrap').show();
						if(da.gamelog!=''&&da.gamelog!=null){
							if(da.gamelog[0].server_status==3){
								$('#lastServ').html('<a href="javascript:alert(\'对不起, 当前服务器尚在维护中\')">['+da.gamelog[0].server_name+']</a>');
							}else{
								$('#lastServ').html('<a href="http://game.65.com/play.php?game_id='+da.gamelog[0].log_gid+'&server_id='+da.gamelog[0].log_sid+'" target="_blank">['+da.gamelog[0].server_name+']</a>');
							}
						}
					}else{
						$('#logined,.login-h').css('display','none');
						$('#login-before,.login-q').css('display','block');
						$('#login-before').show();
                        $('#login-wrap').hide();
					}
				});
			}
		}
	},

	user_info:{
				
		'login':function(){
			 if($.trim($("#u").val())==''){
				$("#u").attr('status','error');alert('请输入用户账号');return false;
				}else $("#u").attr('status','right');
				if($.trim($("#p").val())==''){$("#p").attr('status','error');alert('请输入您的用户密码');
				}else $("#p").attr('status','right');
				var uflg = $("#u").attr('status');
				var pflg = $("#p").attr('status');
				if(uflg=='right'&&pflg=='right'){
					var uname = $("#u").val();
					var upwd  = $("#p").val();
					var code='';
					head.app_login(uname, upwd, code); 
						
			       }	
		}
	},

	app_login:function(uname, upwd, code){
		$.ajax({
		   type: "POST",
		   url: "http://api.65.com/65user/ajax_login.php?callback=?",
		   data: {action:'login_code',u:uname,p:encryptedString(key,upwd),code:code},
		   dataType: "json",
		   success: function(data){
			   if(data.loginnum>=5){
				    $.cookie('user_login_text_cookie_32',uname,{expires:7,path:'/',domain: '65.com',secure: false,raw:false});
					var url=window.location.href;
					window.location.href="http://my.65.com/login.html?url="+url; 
				   }
			   else{
				   if(data.res=='1'){
				   	$('body').append('<div style="display:none;">'+data.synlogin+'</div>');
					    head.init.log_status(true);
				        return false;
					   }
					else{
						alert(data.msg );
				        return false;
						}
				   }
		   },
		    error:function  (){
		       alert("系统繁忙，请稍后再试！");
		       return false;   
		    }
		});
	}

}// end head

function logOut(){
    $.getJSON('http://api.65.com/65user/login_out.php?callback=?',function(data){
		if(data.code==1){				     
			$('#login-before,.login-q').css('display','block');
			$('#logined,.login-h').css('display','none');
			$('#p').val('').focus();
		}
	});
}


//获取平台推荐游戏
function getRecGame(obj){
	var games = '';
	var recom = $(obj);
	$.getJSON('http://api.65.com/65api/get_game.php?callback=?',{num:5,type:'recom',action:"type"},function(data){
	    if(data.code==1){
		    var length = data.list.length;
			for(var i=0;i<length;i++){
			    games += '<a href="'+data.list[i].url.home+'" target="_blank">'+data.list[i].game_name+'</a>';
			}
			recom.html(games);
		}	
	});
}


//服务器列表
function getServers(obj1,obj2,obj3,sLen){
    obj1 = $(obj1);
    obj2 = $(obj2);
    obj3 = $(obj3);
	var servers;
	var slist = '';
	var all_server  = '<option value="">--请选择游戏服--</option>';
	var rank_server = '';
	var j=0;
	
	$.getJSON('http://api.65.com/65api/get_server.php?callback=?',{action:"game_servers",gid:gid},function(data){
		if(data.code==1){
		    if(data.newserver!=null&&data.newserver!=''&&data.newserver!=undefined){
			    obj3.html('<a href="http://game.65.com/play.php?game_id='+gid+'&server_id='+data.newserver.server_id+'" target="_blank">['+data.newserver.server_name+']</a>');
			}
		    var now = Date.parse(new Date())/1000;
		    var qidai= '';
		    var status = '';
		    var length = data.list.length;
		    for(var i=0; i<length; i++){
		    	if(i<sLen){
		    		if(data.list[i].server_status==1){
		    			slist +='<li class="fl"><a class="db" href="javascript:;" onclick="entergame('+data.list[i].server_id+');return false"><i>'+data.list[i].server_name+'</i><small>'+getLocalTime(data.list[i].server_opentime)+'</small><em class="db fl status">火爆</em></a></li>';
		    		}
		    		else if(data.list[i].server_status==2){
		    		    slist +='<li class="fl"><a class="db" href="javascript:alert(\'对不起， 该服务器尚未开启\');"><i>'+data.list[i].server_name+'</i><small>'+getLocalTime(data.list[i].server_opentime)+'</small><em>待开</em></a></li>';
		    		}else if(data.list[i].server_status==3){
		    			slist +='<li class="fl"><a class="db" href="javascript:alert(\'对不起， 该服务器尚在维护中\');"><i>'+data.list[i].server_name+'</i><small>'+getLocalTime(data.list[i].server_opentime)+'</small><em>维护</em></a></li>';
		    		}
		    	}
		        all_server += '<option value="'+data.list[i].server_id+'" data="['+data.list[i].server_name+']">['+data.list[i].server_name+']</option>';
		    }
		    obj1.html(all_server);//新手卡页面服务器选择项
		    obj2.html(slist);
		}
	});
}


function entergame(id){
	var ahref="http://game.65.com/play.php?game_id="+gid+"&server_id="+id;
	 $.getJSON('http://api.65.com/65user/login_status.php?callback=?',function(data){
		if(data.code==1){
			window.location.href = ahref;
		}
		else {
		    $("#game_server_id").attr('data-gid',id);
		    quicklogin(1);
		    $('#login-before,.login-q').show();
		    $('#logined,.login-h').hide();
		}
	}); 
}

//获取区服新手卡类型
function getCardType(e){
	$.getJSON('http://api.65.com/65api/get_card.php?callback=?',{action:"get_card_type",sid:e},function(data){
	    if(data.code==1){
		    var typeLis = '';
			var length = data.list.length
		    for(var i=0; i<length; i++){ typeLis += '<option value="'+data.list[i].type_id+'">'+data.list[i].type_name+'</option>'; }
		    $('#tid').html(typeLis);
		}		
	})
}

//获取新手卡卡号码
function outCard(){
	var typeid = $('#tid').val();
	$.getJSON('http://api.65.com/65user/login_status.php?callback=?&gid=gid',function(data){
			if(data.code=='1'){
				if(typeid==''||typeid==null||typeid=='undefined'){
					alert('请选择游戏区服以及新手卡类型');
					return false;
				}
				$.ajax({
					type : 'GET',
					url  : 'http://api.65.com/65api/getcard.php?callback=?',
					dataType : 'json',
					data :{action:"getcard",tid:typeid},
					beforeSend: function(){
						$("#copycardid_zz").show();
						$("#copycardid").css("visibility","hidden");
						$(".sent-txt").remove();
					    $('.cb-p3').slideDown(300);
						$('.cb-p3').prepend("<span class='sent-txt'>正在发送新手卡...</span>");
					},
					success:function(da){
						if(da.data==null||da.data==''||da.data=='undefined'){
						  $("#copycardid_zz").show();
						  $("#copycardid").css("visibility","hidden");
						  $(".sent-txt").remove();
						  $('.cb-p3').prepend("<span class='sent-txt'>新手卡发送失败！</span>");
						  
						}
						else if(da.data.card_num==null){
						  $("#copycardid_zz").show();
						  $("#copycardid").css("visibility","hidden");
						  $(".sent-txt").remove();
						  $('.cb-p3').prepend("<span class='sent-txt'>创建角色后方可成功领取新手卡！</span>");
						  
						}
						else{
							$("#copycardid_zz").hide();
							$("#copycardid").css("visibility","visible");
							$(".sent-txt").remove();
						    $('.cb-p3').prepend("<span class='sent-txt'>新手卡号：<span id='card_number' class='tovh'></span>");
						    $('#card_number').html(da.data.card_num);
						}
					}
			     })
			}	
			else{
				quicklogin(1);
				}	
		});	
}

//快速进入区服
function passport(obj){
	var snum = $(obj).val();
	if(snum==''||snum==0||snum=='undefined'){
		alert('请输入服务器编号');
		return;
	}
	var k_server_id = 0;
	var k_server_status = 0;
	$.getJSON('http://api.65.com/65api/get_server.php?callback=?',{action:"game_servers",gid:gid},function(data){
		if(data.code==1){
			if(data.list !='' && data.list!=null){
				$.each(data.list, function(){
					if(this.server_num==snum){
						k_server_id = this.server_id;
						k_server_status = this.server_status;
					}		
				});
			}
			  if(k_server_status==1){
				  entergame(k_server_id);
					
			  }else if(k_server_status==2){
					alert('对不起, 该服务器尚未开启！');
			  }else if(k_server_status==3){
					alert('对不起, 该服务器尚在维护中！.');
			  }else{
				 alert('对不起, 该服务器不存在！');
				 }	
		}
	});
}

//时间戳转正常时间
function getLocalTime(time) {
    var date = new Date(time*1000); //实例化一个Date对象
    var month = date.getMonth() + 1 < 10 ? "0" + (date.getMonth() + 1) : date.getMonth() + 1;
    var currentDate = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
    var hh = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
    return month + "/" + currentDate;
    //返回格式：MM/dd hh:mm 
}

//页面添加收藏
function AddFavorite(sURL, sTitle){
    try{
        window.external.addFavorite(sURL, sTitle);
    }catch (e){
        try{
            window.sidebar.addPanel(sTitle, sURL, "");
        }catch (e){
            alert("加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}

//设为首页
function setHome(obj,vrl){
	try{
    	obj.style.behavior='url(#default#homepage)';obj.setHomePage(vrl);
    }catch(e){
        if(window.netscape){
        	try {
            	netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            }catch (e){
                alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。");
            }
            var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
            prefs.setCharPref('browser.startup.homepage',vrl);
        }
	}
}
