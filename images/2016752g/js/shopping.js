


$(function(){
	$("#thumbs li").click(function(){
		i = $(this).index();
		n = i;

		$("#thumbs li").eq(i).find("a").addClass("current").end().siblings().find("a").removeClass("current");

		$("#bigpicarea .image").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
	})

	timer = setInterval(autoPlay,time);

	$("#bigpicarea").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(autoPlay,time);
	})

})
	var timer,n = 0,time = 3000;

	$(".image:not(:first-child)").hide();

	function autoPlay(){
		n = n >= 4 ? 0 : ++n;
		$("#thumbs li").eq(n).trigger("click");
	}
	























