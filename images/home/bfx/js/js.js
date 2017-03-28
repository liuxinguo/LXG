var gid = 44
getRecGame('.recom');
banner('.banner',3000);
getServers('#server_id','.slist','#newServ',10);
scroll('.media_warp','3000','.media_scoll','marginTop');
head.init.log_status(true);

$(function(){
	getRecGame();
	head.init.log_status(true);
	$('#loginBtn').click(function(){head.user_info.login();return false;});
	document.onkeydown=function(event){ 
		e = event ? event :(window.event ? window.event : null); 
		if(e.keyCode==13 && $("#login-before").is(":visible") && !$("#s-login-wrap").is(":visible")){ 
               head.user_info.login();
		} 
	}
$("#video1").click(function() {
	 $popup('#play1','.close')	
	});
$("#video2").click(function() {
	 $popup('#play2','.close')	
	});
$("#video3").click(function() {
	 $popup('#play3','.close')	
	});
$("#video4").click(function() {
	 //$popup('#play4','.close')	
	 alert('敬请期待！');
	});

//首页新闻切换
$('li.news_nav').mouseover(function(){
		var $attr = $(this).attr('attr');
		$('#news_more').attr('rec', $(this).attr('rec'));
	});
	$('#news_more').click(function(){
		var rec = $(this).attr('rec');
		location.href='http://b.65.com/'+rec;
	});
})

//服务器列表页切换
void function () {
 	var serverList = window.serverList = {
 		setTab:function( opt ){
 			opt = $.extend({
 				parent:$('#all_s_nav'), //选项卡父级
 				format:"<a class='db tc fl' href='javascript:;'>{tab}</a>", //选项卡模板(不能嵌套同种标签)
 				current:"current", //切换类
 				event:'mouseover', //切换事件
 				target:$('#all_server_list li'), //切换目标
 				hotText:false, //第一个显示卡是否显示“推荐服务器”
 				num:100//每选项卡数目
 			}, opt);
				var tabTagName,
 				tabs = [],
 				html = "",
 				length = opt.target.length;				
			try{
				tabTagName = opt.format.match(/^<(\w+)/)[1];
			}catch(e){
				return alert('选项卡模板错误,找不到匹配的标签名')
			}
 			for(var i = 0, j = 0; j < length; i = j){
 				j += opt.num;
 				j = j > length ? length : j;
 				if( i === 0 && opt.hotText ){
 					html = opt.format.replace(/{tab}/, opt.hotText)
 				}else{
 					html +=  opt.format.replace(/{tab}/, (length-j+1)+'-'+(length-i));
 				}
 				tabs.push(opt.target.slice(i, j));
 			}
 			if(!tabs.length){
 				return;
 			}
 			opt.parent.html(html);
 			var tabElements = opt.parent.find( tabTagName );
 			function show( index ){
				
 				opt.target.hide();
 				tabs[index].show();
 				$(tabElements[index]).addClass( opt.current ).siblings().removeClass( opt.current );
 			}
 			opt.parent.on(opt.event, tabTagName , function(){
 				var index = tabElements.index( this );
 				show(index);
 			});
 			show(0);
 			return this;
 		}
 	}
 }();

$(function(){
    $.each('.data_list',function(key){
	    if(key%2==0){
		    $('.data_list').eq(key).hover(function(){
		        $('.data_cont').eq(key).stop(true,false).animate({"left":"0px","zIndex":"4"},500);
		    },function(){
		        $('.data_cont').eq(key).stop(true,false).animate({"left":"-384px","zIndex":"3"},500);
		    });
		}else{
		    $('.data_list').eq(key).hover(function(){
		        $('.data_cont').eq(key).stop(true,false).animate({"left":"0px","zIndex":"4"},500);
		    },function(){
		        $('.data_cont').eq(key).stop(true,false).animate({"left":"384px","zIndex":"3"},500);
		    });
		}

	});
	

	var nSwidth = $('.new_cont_list').width();
	var nWidth = $('.new_cont_list').length*nSwidth;
	$('.new_cont').width(nWidth);
	$.each('.new_title ul li',function(key){
	    $('.new_title ul li').eq(key).find('a').hover(function(){
		    $('.new_title').find('a').removeClass('current');
			$('.new_title ul li').eq(key).find('a').addClass('current');
			$('.new_cont').css({"left":-nSwidth*key});
		});
	});

	$.each('div.spot',function(key){
	    $('div.spot').eq(key).hover(function(){
		    $('div.spot').eq(key).find('p').stop(false,true).animate({"bottom":"0px"},200);
		},function(){
		    $('div.spot').eq(key).find('p').stop(false,true).animate({"bottom":"-22px"},200);
		});
	});
	

	$.each('.title_top ul li',function(key){
	    $('.title_top ul li').eq(key).hover(function(){
		    $('.title_top ul li').removeClass('current');
		    $('.title_top ul li').eq(key).addClass('current');
			$('.cooperation li').hide();
			$('.cooperation li').eq(key).show();
		});
	});

	$.each('.role_cont_title li',function(key){
	    $('.role_cont_title li').eq(key).hover(function(){
		    $('.role_cont_title li a').removeClass('current');
		    $('.role_cont_title li').eq(key).find ('a').addClass('current');
			$('.role_cont_list').hide();
			$('.role_cont_list').eq(key).show();
		});
	});
	
	$.each('.box9title li',function(key){
	    $('.box9title li').eq(key).find('a').click(function(){
		    $('.box9title').find('a').removeClass('current');
			$('.box9title').find('a').eq(key).addClass('current');
			$('.box9_box_list').hide();
			$('.box9_box_list').eq(key).show();
		});
	});
	
	var img = [];
	img[0] ='';
	img[1] = 'http://img8.65.com/web/bfx/images/pepol1.png';
	img[2] = 'http://img8.65.com/web/bfx/images/pepol2.png';
	img[3] = 'http://img8.65.com/web/bfx/images/pepol3.png';
	var random = Math.ceil(Math.random()*3);
	if(random==0){
	    random=1;
	}
	var box1 = document.getElementById('box1');
	if(box1){
	    var images = box1.getElementsByTagName('img');
	    images[0].src = img[random];
	}	
})

function $id(id){
    return document.getElementById(id);
}

if($id('box9list1')){
    var len1 = $id('box9list1').getElementsByTagName('li').length;
    $id('box9list1').style.width = len1*300+'px';
}

if($id('box9list2')){
    var len2 = $id('box9list2').getElementsByTagName('li').length;
    $id('box9list2').style.width = len2*300+'px';
}

var timer ='';
var speednum = 0;
var speed = 0;


function StartMove(obj){
    this.move = $id(obj);
	if(this.move){
	    this.len = this.move.getElementsByTagName('li').length;
	}
	
	this.keys = 0;
}

StartMove.prototype.prev = function(){
    if(this.move){
	    var obj = this.move;
        clearInterval(timer);
		this.keys -= 1;
		if(this.keys==-1){
		    this.keys = this.len-1;
		}
		var keys = this.keys;
		if(this.keys!=(this.len-1)){		    
		    timer = setInterval(function(){
		        if(obj.offsetLeft>=-300*keys){
		    	    clearInterval(timer);
		    	}else{
				    speednum = (-300*keys - obj.offsetLeft)/7;
					speed = Math.ceil(speednum);
		    	    obj.style.left = obj.offsetLeft + speed +'px';
		    	}
		    },30);
		}else{
		    timer = setInterval(function(){
			    if(obj.offsetLeft<=-300*(this.len-1)){
				    clearInterval(timer);
				}else{
				    speednum = (-300*keys - obj.offsetLeft)/7;
					speed = Math.floor(speednum);
				    obj.style.left = obj.offsetLeft + speed +'px';
				}
			},30);
		}		    
	}
}

StartMove.prototype.next = function(){
    if(this.move){
	    var obj = this.move;
	    clearInterval(timer);
		this.keys += 1;
		if(this.keys == this.len){
		    this.keys = 0;
		}
		var keys = this.keys;
		if(this.keys!=0){
		    timer = setInterval(function(){
			    if(obj.offsetLeft<=-300*keys){
				    clearInterval(timer);
				}else{
				    sppednum = (-300*keys - obj.offsetLeft)/7;
					speed = Math.floor(sppednum);
				    obj.style.left = obj.offsetLeft + speed + 'px';
				}
			},30);
		}else{
		    timer = setInterval(function(){
			    if(obj.offsetLeft>=0){
				    clearInterval(timer);
				}else{
				    sppednum = (0 - obj.offsetLeft)/7;
					speed = Math.ceil(sppednum);
				    obj.style.left = obj.offsetLeft + speed +'px';
				}
			},30);
		}
	}
}

var prev1 = new StartMove('box9list1');
var next1 = new StartMove('box9list1');
var prev2 = new StartMove('box9list2');
var next2 = new StartMove('box9list2');


//时间戳转正常时间
function getLocalTime(time) {
    var date = new Date(time*1000); //实例化一个Date对象
    var month = date.getMonth() + 1 < 10 ? "0" + (date.getMonth() + 1) : date.getMonth() + 1;
    var currentDate = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
    var hh = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
    var mm = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
   // return month + "/" + currentDate+" "+hh+":"+mm;
    return month + "/" + currentDate;
    //返回格式：MM/dd hh:mm 
}













