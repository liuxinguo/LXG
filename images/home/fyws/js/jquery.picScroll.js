(function($){
    $.fn.extend({
        picScroll:function(options){
            var defaults={
                'showNum' : 3,
                'step' : 1,
                'auto' : false,
                'time' : 5000,
                'leftBtn' : '.leftBtn',
                'rightBtn' : '.rightBtn',
                'imgWrap' : 'ul',
                'imgBox' : 'li',
                'callBack' : function(){}
            }
            var options=$.extend(defaults,options);
            return this.each(function(){
                var imgBox = $(this).find(options.imgBox);
                var eachWidth = imgBox.outerWidth() + parseInt(imgBox.css('margin-left')) + parseInt(imgBox.css('margin-right'));
                var size = $(this).find(options.imgBox).size();
                var width = size * eachWidth;
                var imgWrap = $(this).find(options.imgWrap);
                imgWrap.width( width );
                var scrollLeft = 0;
                var rightBtn = $(this).find(options.rightBtn);
                var leftBtn = $(this).find(options.leftBtn);
                rightBtn.click(function(){
                    scrollLeft -= eachWidth*options.step;
                    if( scrollLeft < -(size-options.showNum)*eachWidth ) scrollLeft = 0;
                    imgWrap.animate({'margin-left':scrollLeft},500);
                    var index = 0 - parseInt(scrollLeft/eachWidth);
                    options.callBack(imgBox,index);
                });
                leftBtn.click(function(){
                    scrollLeft += eachWidth*options.step;
                    if( scrollLeft > 0 ) scrollLeft = -(size-options.showNum)*eachWidth;
                    imgWrap.animate({'margin-left':scrollLeft},500);
                    var index = 0 - parseInt(scrollLeft/eachWidth);
                    options.callBack(imgBox,index);
                });
                if(options.auto == true){
                    var autoScrollHandler;
                    var autoScroll = function(){
                        autoScrollHandler = setInterval(function(){rightBtn.click();},options.time);
                    };
                    autoScroll();
                    $(this).hover(function(){
                        clearInterval(autoScrollHandler);
                    },
                    function(){
                        autoScroll();
                    });
                }
            });
        }
    });
})(jQuery);