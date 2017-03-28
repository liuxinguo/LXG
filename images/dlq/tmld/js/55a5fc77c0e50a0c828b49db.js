'use strict';
(function() {
    window.wdSlider={

        //初始化
        init:function(){

            var comArr = $(".wdSlider[component_parse!='true']");
            for(var i=0;i<comArr.length;i++){
                var comStyObj = JSON.parse($(comArr[i]).attr("component_style"));
                var comDataObj = JSON.parse($(comArr[i]).attr("component_data"));
                this.initData($(comArr[i]),comDataObj);
                this.initStyle($(comArr[i]),comStyObj);
            }
            this.bindEvent();
        },

        //组件样式初始化 
        initStyle:function($com,styObj){
            var comId =$com.attr("id");
            //初始化样式
            $com.css({
                "width": styObj.cw,
                "height": styObj.ch
            });
            //组件宽高
            window.addRule('#'+comId+' .J_content li',{
                "width":styObj.cw,
                "height":styObj.ch
            });
            //标题高度
            window.addRule('#'+comId+' .mod-slide-content li p','height',styObj.nav.ph);
            //标题行高
            window.addRule('#'+comId+' .mod-slide-content li p','line-height',styObj.nav.plh);
            //标题字体
            window.addRule('#'+comId+' .mod-slide-content li p','font-size',styObj.nav.pfz);
            //导航宽高
            window.addRule('#'+comId+' .mod-slide-trigger li',{
                "width":styObj.nav.trw,
                "height":styObj.nav.trh
            });
            //导航距离底部距离
            window.addRule('#'+comId+' .mod-slide-trigger','bottom',styObj.nav.trbm);
            //导航背景颜色
            window.addRule('#'+comId+' .mod-slide-trigger li','background-color',styObj.nav.trbg);
            //导航选中背景颜色
            window.addRule('#'+comId+' .mod-slide-trigger li.selected','background-color',styObj.nav.trsbg);
        },
        //组件数据初始化 生成html结构
        initData:function($com,dataObj){
            
        },
        bindEvent:function(){
            LEGO.slide('.wdSlider', {effect: "scrollY", event:"click"});
        }
    }; 
    wdSlider.init(); 
})();