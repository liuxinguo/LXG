$(function(){
    $("#yxname").bind('keyup focus',function(){
        var w = $("#yxname").val();
        if(w=="" || w=="搜索你想要的游戏"){
            $("#we-game-search-result").html("");
            $("#we-game-search-result").hide();
        }else{
            var result = search_table(w);
            if(result != '') {
                $("#we-game-search-result").show();
                set_table(result);
            } else {
                $("#we-game-search-result").show();
                $('#we-game-search-result').html('<p>搜索不到您的游戏</p>');
            }
        }
    }).blur(function(){
        setTimeout(function(){
            $("#we-game-search-result").hide();
        },1000);
    }).keydown(function(e){
        if(e.keyCode == 13){
            //$("#we-game-search-button").trigger('click');
            return false;
        }
    });

    function zwToPinyin(zw){
        var pinyin_result = [];
        pinyin_result = pinyin(zw, {style: PINYIN_STYLE.NORMAL,heteronym: false});
        pinyin_result = pinyin_result.join('').replace( /\,/g, '' );
        return pinyin_result;
    }
    
    function zwToPinyinFirstLetter(zw){
        var pinyin_result = [];
        pinyin_result = pinyin(zw, {style: PINYIN_STYLE.FIRST_LETTER,heteronym: false});
        pinyin_result = pinyin_result.join('').replace( /\,/g, '' );
        return pinyin_result;
    }

    function search_table(w){
        var word = $.trim(w);
        var result = [];
        var i, j, num_match = 0;
        for(i in _game_list_){
            if( _game_list_[i][0].indexOf((word))!= -1 || _game_list_[i][1].indexOf(word) != -1 
               || zwToPinyinFirstLetter(_game_list_[i][0]).indexOf((word))!= -1 
               || zwToPinyin(_game_list_[i][0]).indexOf((word))!= -1 )
            {
                result.push(_game_list_[i]);
                num_match++;
            }            
            if(num_match > 10)
                break;
        }      
        return (result);
    }

    function set_table(result){
        var i,hh='<p>请选择您喜欢的游戏</p><ul>';
        for(i in result){
            hh += '<li><a target="_blank" href="'+result[i][1]+'">'+result[i][0]+'</a></li>'
        }
        $('#we-game-search-result').html(hh);
    }
});