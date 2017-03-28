            var $result = $('#result');
            var $resultTxt = $('#resultTxt');
            var $resultBtn = $('#resultBtn');

  $resultBtn.click(function(){ //点击关闭按钮提示信息隐藏
                $result.hide();
                $(".rotary_rg").hide();
            });


 $(".qued").click(function(){ //点击确定按钮提示信息隐藏
                $result.hide();
                $(".rotary_rg").hide();
        });




$(function(){
        $('#wrapper').countdown('2017/1/27', function(event) {
          $('#divtime').html(event.strftime('%D '));
        });
    })

$(function(){
    $(window).scroll(function(){
    var winSt = $(window).scrollTop()
    var winH = $(window).height()

    if( winSt > winH){
        $('#toTop').fadeIn();
    }else{
        $('#toTop').fadeOut();
    }

    $('#toTop').click(function(event) {
        $('html,body').stop().animate({scrollTop:0}, 300)
    });

    })

        $(".link-btn1,.top-nav4").click(function() {
        $("body,html").stop().animate({
            scrollTop: $("#wrap1").offset().top
        })
    })
    $(".link-btn2,.top-nav2").click(function() {
        $("body,html").stop().animate({
            scrollTop: $("#wrap2").offset().top
        })
    })
    $(".link-btn3,.top-nav3").click(function() {
        $("body,html").stop().animate({
            scrollTop: $("#wrap3").offset().top
        })
    })
    $(".link-btn4,.top-nav1").click(function() {
        $("body,html").stop().animate({
            scrollTop: $("#wrap4").offset().top
        })
    })

    $(window).scroll(function(event) {
    var winSt = $(window).scrollTop()
    var winH = $(window).height()
    if( winSt > winH*6/5){
        $('.main-left').fadeIn();
    }else{
        $('.main-left').fadeOut();
    }

    });
})

function lottery(){
  $.ajax({
    url: index_url+"/public/membergame?gid="+gid+"&num=1",
    type:"GET",
    dataType:"jsonp",
    cache: false, 
    error: function(){ 
        alert('登陆判断出错了！'); 
        return false; 
    }, 
    success:function(data){
      if(data.status=="1"){
        var prize= data.prize;
        if(prize=='0'){
        var n = confirm('免费抽奖次数为'+ prize +'，本次将消耗100平台币进行抽奖？'); 
            if(n){ 
               lottery1()
            }else{ 
               return false; 
            } 
        }else{ 
        var s =confirm('您还有'+ prize +'次免费抽奖机会，点击确定进行抽奖！'); 
            if(s){ 
                lottery1()
            }else{ 
                return false; 
            }
        }
      }else{
       alert('未登录，请先登陆！'); 
       return false; 
      }   

    }   
  })  

}

function lottery1(){
    $.ajax({ 
        type: 'POST', 
        url: index_url+'/zhounian/run',  //提交地址 改为你自己的
        dataType: 'json', 
        cache: false, 
        error: function(){ 
            alert('抽奖出错了！'); 
            return false; 
        }, 
        success:function(json){ 
            if(json.success=='1'){
            checkuser()
            $("#startbtn").unbind('click').css("cursor","default"); 
            var a = json.angle; //角度 
            var p = json.prize; //奖项 
            $("#startbtn").rotate({ 
                duration:3000, //转动时间 
                angle: 0, 
                animateTo:1800+a, //转动角度 
                easing: $.easing.easeOutSine, 
                callback: function(){ 
                   var text = '恭喜你，中得<em>'+p+'</em>还要再来一次吗？<br><br><a href="http://user.752g.com/user_info_zl.html">如实物奖品请先完善资料。<br>完善资料</a>';
                    $(".rotary_rg").show();
                    $result.show();
                    $resultTxt.html(text);
                    return false; 
                } 
            }); 

            }else if(json.success=='0'){
              alert(json.prize);
              return false;
            }

        } 
    }); 


} 

 
   