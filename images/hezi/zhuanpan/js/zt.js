memberLogin(0);
showCount();
$(function(){
    function setsp() {
        var s = $('#side'), st = $(document).scrollTop();
        if ( st > 850 ) {
            s.css('top', st + 'px');
        }
        else {
            s.css('top', 850 + 'px');
        }
    } 
    $(document).keydown(function(event){ 
        if(event.keyCode==13){ 
            memberLogin(1);
        } 
    });
    $(window).bind('scroll', setsp);
});

function myswitch( t, b, id, len ) {
    for( i = 1; i <= len; i++ ){
        document.getElementById(t+"-"+i).className='';
        document.getElementById(b+"-"+i).style.display='none';
    }
    document.getElementById(t+"-"+id).className='current';
    document.getElementById(b+"-"+id).style.display='';
    $('html, body').animate({
        scrollTop:"850px"
    },500);
}

function copyText(id){
    try{
        var a = document.getElementById(id);
        window.clipboardData.setData('text',a.value);
        alert("复制成功，请到游戏里面兑换");
    }catch(e){
        alert("您的当前浏览器不支持自动复制功能！请您手动复制");
    }

}

function showCount(){
$.getJSON(api_hezi+"/ajax_action?rnd=" + Math.random() + "&format=json&jsoncallback=?",
        function(data) {
       
                for(var i =0;i<data.length;i++){
                    var info=$('#count_'+data[i].money).html();
                    var count=info-data[i].trans_count;
                    if(count<0){
                        count=0;
                    }
                    $('#count_'+data[i].money).html(count);
                }
        });

 
}

function memberLogin(isgoto) {
    var usname=$("#usname").val();
    var uspsd=$("#uspsd").val();
    if(usname=='请输入账号'){
        usname='';
    }
    $.getJSON(api_hezi+"/ajlogin?rnd="+Math.random()+"&username="+usname+"&password="+uspsd+"&format=json&jsoncallback=?",
        function(data){
            var _member = data;
            if(_member.errormsg == ""){
                if(isgoto==1){
                    document.write(_member.script);
                    return;
                }
			
                $('#login_name').val(_member.username);
                $('#user_name').html(_member.username);
                $('#user_points').html(_member.points);
                $('#user_coins').html(_member.member_coins);

                $("#denglu_nei").hide();
                $("#denglu_nei_hou").show();
                if(usname != '')document.write(_member.script);
            }else{
                if(usname != ''){
                    var str = _member.errormsg;
                    if (str===undefined){
                       document.write(_member.script);
                    }else{
                        alert(_member.errormsg);
                    }
                }
            }
        });
}


function lottery_info(){
    var cookname=$('#login_name').val();
    if(cookname ==''){
        alert("请您先登录再进行参与！");
        return false;
    }
    else{   
  $.getJSON(api_hezi+"/ajax_action?rnd=" + Math.random() + "&format=json&jsoncallback=?",
        function(data) {
             
                    if (data.success =='true'){
                        $('#lottery_style').removeClass('sp');
                        $('#lottery_style').addClass('sp2');
                        window.setTimeout(function()
                        {
                            $('#lottery_style').removeClass('sp2');
                            $('#lottery_style').addClass('sp');
                            alert(data.msg);
                        },4000);
                    }
                    else if(data.success == 0)
                    {
                        $('#lottery_style').removeClass('sp2');
                        $('#lottery_style').addClass('sp');
                        if(data.msg == "noStart"){
                            alert("不好意思，现在还不是抽奖时间，敬请期待！");
                            return false;
                        }else if(data.msg == "End"){
                            alert("活动已经结束，谢谢您的参与！");
                            return false;
                        }else if(data.msg == "nobindPhone"){
                            $popup('#bingPhone','.up_close ');
                            return false;
                        }else if(data.msg == "havinglottery"){
                            alert("您已经参加过抽奖！");
                            return false;
                        }else if(data.msg == "noSys"){
                            alert("服务器繁忙，请稍后再试！");
                            return false;
                        }else{
                            alert(data.msg);
                            return false;
                        }
                    }
            
            });
    }
}

function sign_up(){
    var cookname=$('#login_name').val();
    if(cookname ==''){
        alert("请您先登录再进行参与！");
        return false;
    }
    else{
        $(function(){
            $.ajax({
                type : "POST",
                url  : "ajax_action.php",
                data: "act=sign_up&cookname="+cookname,
                success : function(data) {
                    eval('data='+data);
                    if (data.success =='true'){
                        alert(data.msg);
                    }
                    else if(data.success == 0)
                    {

                        if(data.msg == "noStart"){
                            alert("不好意思，现在还不是签到时间，敬请期待！");
                            return false;
                        }else if(data.msg == "End"){
                            alert("活动已经结束，谢谢您的参与！");
                            return false;
                        }else if(data.msg == "nobindPhone"){
                            $popup('#bingPhone','.up_close ');
                            return false;
                        }else if(data.msg == "havingsign"){
                            alert("您已经签到过了！");
                            return false;
                        }else if(data.msg == "noSys"){
                            alert("服务器繁忙，请稍后再试！");
                            return false;
                        }else{
                            alert(data.msg);
                            return false;
                        }
                    }
                }
            });
        });
    }
}
