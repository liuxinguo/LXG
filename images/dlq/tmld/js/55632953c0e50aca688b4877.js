(function($){
	window.articleListLYn={

		init:function(){

			var comArr = $(".articleListLYn[component_parse!='true']");
			for(var i=0;i<comArr.length;i++){
				var comStyObj = JSON.parse($(comArr[i]).attr("component_style"));
                var comDataObj = JSON.parse($(comArr[i]).attr("component_data"));
                this.initData($(comArr[i]),comDataObj);
                this.initStyle($(comArr[i]),comStyObj);
			}
             this.bindEvent();
		},
		//组件样式初始化 
		initStyle:function($com,comStyObj){

			var comId = $com.attr("id");
            //tab
            window.addRule('#'+comId+' .newtabs',{
                "background-image": 'url('+comStyObj.tb+')'
            });
            //tab字体
            window.addRule('#'+comId+' .newtabs p',{
                "color": comStyObj.tbfc
            });
            window.addRule('#'+comId+' .newtabs p.on',{
                "background-image": 'url('+comStyObj.tbo+')',
                "color": comStyObj.tbofc
            });
            //更多图标
            window.addRule('#'+comId+' .newcom_more',{
                "background-image": 'url('+comStyObj.ic+')'
            });
            //内容背景色
            window.addRule('#'+comId+' .newcoms',{
                "background": comStyObj.tbgc
            });
            //
            window.addRule('#'+comId+' .newcom_box .new_list label',{
                "color": comStyObj.lbc
            });
            window.addRule('#'+comId+' .newcom_box .new_list a',{
                "color": comStyObj.tc
            });
            window.addRule('#'+comId+' .newcom_box .new_list a span em',{
                "color": comStyObj.toc
            });
            window.addRule('#'+comId+' .new_list .new_date',{
                "color": comStyObj.dc
            });
            
		},
		
		//组件数据初始化 生成html结构
		initData:function($com,imgListObj){
            var comId = $com.attr("id");
			var comCMSObj = $com.attr("component_cms_tpl");
			var temp = '',con_temp = '',html = $(".newcom_box").html();
			$com.find(".newcoms").html("");
			$.each(imgListObj.tab,function(key,value){
				var cmsHtml = "";
				if(value.cms && comCMSObj){
					cmsHtml = comCMSObj.replace(/article_label/g,value.cms["link_label"]);//
                    cmsHtml = cmsHtml.replace(/tit_label/g,value.tabName);//
				}
				temp += '<p class="tab0'+(key+1)+'">'+value.tabName+'</p>';
				con_temp = '<div class="newcom_box">'+html+'</div>';
                $com.find(".newcoms").append(con_temp).find(".newcom_box:last").attr("component_cms",cmsHtml);
			})

			$com.find(".newtabs").html(temp).find("p:first").addClass("on");
			$com.find(".newcoms").find("div:first").show().nextAll().hide();
		},

		bindEvent:function(){

            $(".articleListLYn .newtabs p").on("mouseenter",function(){
                var index = $(this).index()
                $(this).addClass("on").siblings().removeClass("on")
                $(this).parent(".newtabs").next("div").children("div").hide()
                $(this).parent(".newtabs").next("div").children("div").eq(index).fadeIn(0)
            })
		}
	};
	articleListLYn.init();
})(jQuery);