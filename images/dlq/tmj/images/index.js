$(function(){
	var height = $(".server_list").height();
	var sh = $(".scroll").height();
	var bili =  parseInt((sh/height)*10);
	var selects = 0;
	//选区滚动条	
	$('.server_div').mousewheel(function(event,delta){
			var top = parseInt($(".server_list").attr('data'));
			selects = (bili/10)*(top);
			if(selects<=5){
				selects = 5;
			}	
			if(selects>=160){
				selects = 175;
			}
			if(delta==1){
				//鼠标滚上				
				if(top < 10){
					top = 0;
				}else{
					top =	top - 8 ;	
				}				
				$(".server_list").css({'top':-top});
				$(".server_list").attr('data',top);
				
				$(".selects").css({'top':selects});
			}else if(delta== -1){	
				//鼠标滚下
				if(top>=height-200){
					top = height-150;	
				}else{
					top =	top + 8 ;	
				}	
				$(".server_list").attr('data',top);
				$(".server_list").css({'top':-top});	
				$(".selects").css({'top':selects});
			}
	}); 
	
	$(".server_title li").click(function(){
		var index = $(this).index();
		$(this).addClass("on").siblings().removeClass("on");
		$(".server_list div").hide();
		$(".server_list div").eq(index).show();
		$(".selects").css({'top':'5px'});
		$(".server_list").css({'top':'0'});
		$(".server_list").attr('data','0');
	});
	
})