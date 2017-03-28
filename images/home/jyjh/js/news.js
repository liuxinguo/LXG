	$('.media dt').click(function(){
		$('.media dd').slideUp('slow');
		var media_show = $('.media dd');
		if(media_show.is(':hidden')){
			media_show.slideDown("slow");
			$(this).find('i').removeClass().addClass('media_down');
		}else{
			media_show.slideUp("slow");
			$(this).find('i').removeClass().addClass('media_up');
		}
	});
    
	$(".pic_show").slide({titCell:".hd",mainCell:".bd ul",autoPage:true,effect:"left"});
    
    $(".issue").slide({titCell:".hd li",mainCell:".bd"});
    
    $(function() {
        $('#pic a').lightBox();
    });
