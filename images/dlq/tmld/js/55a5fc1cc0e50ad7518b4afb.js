(function($){
	window.wdServer={
		tab_len:2,
		init:function(){
	        var comArr = $(".wdServer[component_parse!='true']");
            for(var i=0;i<comArr.length;i++){
                var comDataObj = JSON.parse($(comArr[i]).attr("component_data"));
                this.initData($(comArr[i]),comDataObj);
            }
			this.bindEvent();
		},
		initData:function($com,dataObj){
			//初始化组件数据
            var serverTabHtml='',serverBoxHtml='';
            $com.find(".serverTab").html("");
            $com.find(".serverBox").html("");
            this.tab_len = dataObj.tabArr.length;
            for(var j=0;j<dataObj.tabArr.length;j++){
                if(j==0){
                    serverTabHtml +='<a class="tab'+(j)+' on" title="'+ dataObj.tabArr[j].tit + '">'+ dataObj.tabArr[j].tit + '</a>';
                    serverBoxHtml +='<div id="'+dataObj.tabArr[j].tabid+'" item="'+(j+1)+'"><a href="#" class="serverItem sItem"><i class="sIcon"></i><span class="sText">双线2服</span><span class="sDesc"></span></a></div>';
                }else{
                    serverTabHtml+='<a class="tab'+(j)+'" title="'+ dataObj.tabArr[j].tit + '">'+dataObj.tabArr[j].tit+'</a>';
                    serverBoxHtml +='<div id="'+dataObj.tabArr[j].tabid+'" style="display:none;" item="'+(j+1)+'"><a href="#" class="serverItem sItem"><i class="sIcon"></i><span class="sText">双线2服</span><span class="sDesc"></span></a><a href="#" class="serverItem sItem"><i class="sIcon"></i><span class="sText">双线1服</span><span class="sDesc"></span></a></div>';
                }
            }
            $com.find(".serverTab").html(serverTabHtml);
            $com.find(".serverBox").html(serverBoxHtml);
		},
		bindEvent:function(gameId,serid,ext){
          $("#Tab a").on("click",function(){
	            var index = $(this).index();
	            $(this).addClass("on").siblings().removeClass("on");
	            $(this).parent("#Tab").next("div").children("div").hide();
	          $(this).parent("#Tab").next("div").children("div").eq(index).fadeIn(0);
          })
		}
	};
	wdServer.init();
})(jQuery);