
$(function(){


    $("#f_user_zl").live('click', function() {
        var nickname = $("#nickname").val();
        var gender   = $("#gender").val();
        var year     = $("#year").val();
        var moth     = $("#moth").val();
        var day      = $("#day").val();
        var qq       = $("#qq").val();
        var address  = $("#address").val();
        $.ajax({
            type: "get",
            async: true,
            url: "/userUpdate_zl",
            data:{
                nickname: nickname,
                gender: gender,
                moth: moth,
                year: year,
                day: day,
                qq: qq,
                address: address
            },
            dataType: "jsonp",
            jsonp: "callback",
            jsonpCallback:"apiUserZl",
            success: function(json) {
                if (json.status == '0') {
                    alert(json.msg);
                }
                if (json.status == '1') {
                    alert(json.msg);
                    window.location.reload();
                }
            },
            error: function(staus) {
                alert('系统繁忙，请稍后再试!');
            }
        });
    });



	$(".user-sidebar ul>li").on("click",function(){
		var i = $(this).index();
		$(this).addClass("active").siblings().removeClass("active");
		$(".fen-db").eq(i).slideDown(400).parent().siblings().find(".fen-db").slideUp(400);
	})

	// 邮箱信息
    $("ul.message_con li").hover(function(){
        $(this).find("i").show().on("click",function(){
            $(this).parent().remove();
        })
    },function(){
        $(this).find("i").hide();
    })

    function newEmail(){
        $("ul.message_con li").each(function(i){        
            $(".click_read").eq(i).on("click",function(){
                if($(".message_cont").eq(i).is(":hidden")){
                    $(".message_cont").eq(i).show();
                    $(this).html("点击收藏");
                }else{
                    $(".message_cont").eq(i).hide();
                    $(this).html("点击阅读");
                }
            })
            
        })
    }
    newEmail();


	// 头像更改
	$(".btn-a label").on("click",function(){
		$(".btn-a span").show();
		$(".btn-a img").on("click",function(){
			$(".btn-img img").attr("src",$(this).attr("src"));
			
		})
		$(".btn-a a").on("click",function(){
			$(".btn-a span").hide();
		})
	})
	

})