  
            $.getJSON( "/mylist?rnd="+Math.random()+"&format=json&jsoncallback=?",
            function(data){
                if(data.mobile_isvalid==1){
                    $('#mobile_isvalid').html('<a href="javascript:;" class="go">已完成</a>');
                }
                if(data.email_isvalid==1){
                    $('#email_isvalid').html('<a href="javascript:;" class="go">已完成</a>');
                }
                if(data.is_avatar==1){
                    $('#is_avatar').html('<a href="javascript:;" class="go">已完成</a>');
                }
                if(data.recharge==1){
                    $('#recharge').html('<a href="javascript:;" class="go">已完成</a>');
                }
                if(data.addfavorite==1){
                    $('#addfavorite').html('<a href="javascript:;" class="go">已完成</a>');
                }
                if(data.member_info==1){
                    $('#member_info').html('<a href="javascript:;" class="go">已完成</a>');
                }
            });
 




        function toAddFavorite(sURL, sTitle){
            $.getJSON("http://api.com/User/Task/addfavorite?rnd="+Math.random()+"&format=json&jsoncallback=?",
            function(data){
                if(data.result==1){
                    alert(data.msg);
                    addFite(sURL, sTitle);
                    window.location.reload();
                }else if(data.result==0){
                    alert('您已经收藏过了!');
                }else{
                    alert('系统繁忙，请稍后再试!');
                }
                
            });
        }

    function addFite(sURL, sTitle)
    {
    try
    {
            window.external.addFavorite(sURL, sTitle);
    }
    catch (e)
    {
            try
            {
                window.sidebar.addPanel(sTitle, sURL, "");
            }
            catch (e)
            {
                alert("加入收藏失败，请使用Ctrl+D进行添加");
            }
    }
    }