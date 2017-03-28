(function($){
	var obj={
		carouselIndex:0,
		stop:false,
		timeInterval:true
	};
	var Index = {
		init:function(){
			
			this.pageInit();
			this.bindEvent();
		},
		pageInit:function(){
			this.carousel();
			this.addMusic();
		
		},
		
		addMusic:function(){
			var musicHtml='<embed src="http://yytmld.duowan.com/s/newGW/music/tmld.mp3" width="0" height="0" type="audio/mpeg" loop="20" autostart="true" volume="0"></embed>';
        	 $("#music").html(musicHtml); 
		},
		carousel:function(){
			$(".carousel li").animate({opacity:"0"},"linear");
			var clength = $(".carousel li").length;
			$(".carousel p span").removeClass("on");
			$(".carousel p span").eq(obj.carouselIndex).addClass("on");
			
			$(".carousel li").eq(obj.carouselIndex).animate({opacity:"1"},"linear",function(){
				obj.carouselIndex == clength-1 ? (obj.carouselIndex=0 ):(obj.carouselIndex++);
				
			})
			
			obj.stop = setTimeout(Index.carousel,2600);
			
		},
		isVisible:function(){  
        if("webkitHidden" in document) return !document.webkitHidden;  
        if("mozHidden" in document) return !document.mozHidden;  
        if("hidden" in document) return !document.hidden;  
        if("msHidden" in document) return !document.mshidden;  
        return true;  
    	},
    	
		bindEvent:function(){
			$("body").on("mouseenter",".tab-top span",function(){
			
				$(".tab-top span.on,.tab-top a.on").removeClass("on");
				$(this).addClass("on");
				$(this).next("a").addClass("on");
				
				var index = $(this).index()/2;
				$(this).parent().parent().children(".tab-content").children("ul").css("display","none");
				$(this).parent().parent().children(".tab-content").children("ul").eq(index).css("display","block");
				
				
			})
			
			/*角色信息*/
			var self = this;
			$("body").on("click",".role-nav li",function(){
				var index = $(this).index();
				$(".role-nav li.on").removeClass("on");
				$(this).addClass("on");
				$(".role-content li").css("display","none");
				$(".role-content li").eq(index).css("display","block");
			})
			
			
			$("body").on("click",".tab-change",function(){
				var leftOrRight = $(this).index();		//判断是向左还是向右
				console.log(leftOrRight);
				var index = $(".role-nav li.on").index();	//判断当前是第几个on
				var liLength = $(".role-nav li").length;
				
				if(leftOrRight == 2){
					var next = (index==0) ? liLength-1 : index-1;		
				}
				else if(leftOrRight == 3){
					var next = (index==liLength-1) ? 0 : index+1;
				}
				$(".role-nav li.on").removeClass("on");
				$(".role-nav li").eq(next).addClass("on");
				$(".role-content li").css("display","none");
				$(".role-content li").eq(next).css("display","block");
			})
			
			$("body").on("click",".carousel p span",function(){
				var index = $(this).index();
				//clearInterval(obj.stop);
				clearTimeout(obj.stop);
				
				obj.carouselIndex = index;//表示从第几个位置进入轮播
				//setInterval(self.carousel,1600);
				//self.carousel();
				
				Index.carousel();
				
			})
			
			$("body").on("click",".js-video",function(){
				var vid = $(this).attr("data-video");
                 var html = '<embed id="myVideo" name="myVide" src="http://assets.dwstatic.com/video/vpp.swf" wmode="transparent" allowFullScreen="true" quality="high"  height="500"  width="720" align="middle" allowScriptAccess="always" flashvars="uu=a04808d307&vu=&continous_play=0&auto_play=1&videoId=0&vid='+vid+'&width=720&height=500&channelId=bfx" type="application/x-shockwave-flash"> </embed> ';
                $(".pop_bg,.pop_trans").show();
                $("#video").html(html);
				}).on("click",".pop_close",function(){
                $(".pop_bg,.pop_trans").hide();
               // $("#video #CuPlayer").remove();
                $("#video").html("");

				})
			
/*
			$(window).on("blur",function(){
				$(".music").html(""); 
			}).on("focus",function(){
				Index.addMusic();
			})
*/			
			
			$(document).on("visibilitychange webkitvisibilitychange mozvisibilitychange",function() {  
            //	var date=Date();
            	//console.log(self.isVisible()); //离开时为false 
            		if(!self.isVisible()) { 
            		//	console.log("开始",date)
               			$("#music").html("");
            		}  
            		else{
            	//		console.log("暂停",date)
            			Index.addMusic();
            		}
        	})
			
		}
	};
	Index.init();
})(jQuery)
