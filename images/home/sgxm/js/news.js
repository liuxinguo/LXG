$(function(){
	//游戏新闻
	setMouse("newsList", ["li", "dl"], ["active", "active", "active", "active"], "replace", ["/youxigonggao/","/youxixinwen/", "/youxigonggao/",  "/youxihuodong/"]);
	
	
	$("a[rel=pic_list]").fancybox({
		'transitionIn'	: 'none',
		'transitionOut'	: 'none',
		'titlePosition' 	: 'over',
		'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
			return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
		}
	});	
			

	});
