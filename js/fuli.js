//提示框部分
jQuery_1_10_2(function($){
var Tips = function () {
    var allTips = $(".ui-tipbox");
    var maskHandler = $(".mask-layer");
    var closeHandler = $(".close-box-btn");

    var mask = function (status) {
        if (maskHandler.length == 0) {
            $("<div class='mask-layer'></div>").appendTo("body");
            maskHandler = $(".mask-layer");
        }
        maskHandler.height($(document).outerHeight());
        if (status == "show") {
            maskHandler.show();
        } else {
            maskHandler.hide();
        }
    };

    var show = function (typeClass) {
        var ie6Handler = allTips.addClass("fn-hide").filter(typeClass).removeClass("fn-hide");
        mask("show");

        if (typeof document.body.style.maxHeight === "undefined") {
            var offsetHeight = $(window).scrollTop() + 200;
            ie6Handler.css("top",offsetHeight)
        }
    };

    var hide = function (typeClass) {
        if (typeClass) {
            allTips.filter(typeClass).addClass("fn-hide");
        } else {
            allTips.addClass("fn-hide");
        }
        mask("hide");
    };

    closeHandler.click(function (e) {
        e.preventDefault();
        Tips.hide();
    });

    return {
        show: show,
        hide: hide
    }
}();

//侧边导航

function sideNav() {
    this.titleToContent = ["sc-content", "cz-content", "czfl-content", "lb-content"];
    this.sideNavMain = $(".side-nav");
    this.single = this.sideNavMain.find("li");
    this.rightInfo = $(".hot-tasks-nav"); //增加右侧部分
    //主内容离顶部的距离
    this.mainToTop = $(".game-fuli").offset().top;
    //自动调用初始化函数
    this.init();
}

sideNav.prototype.init = function () {
    var self = this;
    //启动灵动导航
    self.startSticky();
    //启动自动切换
    self.autoChange();
    //启动URLhash值对应到内容
    self.urlToContent();

    //关闭右侧
    self.rightInfo.find(".close-hot-task").on("click",function(){
        self.rightInfo.hide();

    });
}

sideNav.prototype.startSticky = function () {
    var self = this;
    $(window).scroll(function () {
        //当前body离顶部距离
        var currentTop = $(window).scrollTop();
        //判断距离决定使用哪种定位方式
        if (currentTop > self.mainToTop) {
            if (typeof document.body.style.maxHeight === "undefined") {
                //IE6下的情况，修正IE6不支持fixed
                self.sideNavMain.css({
                    "position": "absolute",
                    "top": 52 + currentTop - self.mainToTop + "px"
                });
                self.rightInfo.css({
                    "position": "absolute",
                    "top": 52 + currentTop - self.mainToTop + "px"
                });
            } else {
                self.sideNavMain.css({
                    "position": "fixed",
                    "top": "52px"
                });
                self.rightInfo.css({
                    "position": "fixed",
                    "top": "52px"
                });
            }
        } else {
            self.sideNavMain.css({
                "position": "absolute",
                "top": "95px"
            });
            self.rightInfo.css({
                "position": "absolute",
                "top": "270px"
            });
        }
    });
}

sideNav.prototype.autoChange = function () {
    var self = this;
    //点击时候切换
    self.single.on("click", function (e) {
        var eventType = e.type;
        var index = $(this).index();
        self.scrollTo(self.titleToContent[index], index, eventType);
    });
    //滚动的时候切换
    //每个内容分别离顶部的距离
    var distanceGroup = [];
    for (var i = 0, len = self.titleToContent.length; i < len; i++) {
        var distance = $("." + self.titleToContent[i]).offset().top;
        distance -= 150;
        distanceGroup.push(distance);
    }
    $(window).scroll(function () {
        var bodyScrollTop = $(window).scrollTop();
        if (bodyScrollTop >= distanceGroup[0] && bodyScrollTop < distanceGroup[1]) {
            self.scrollTo(self.titleToContent[0], 0);
        } else if (bodyScrollTop >= distanceGroup[1] && bodyScrollTop < distanceGroup[2]) {
            self.scrollTo(self.titleToContent[1], 1);
        } else if (bodyScrollTop >= distanceGroup[2] && bodyScrollTop < distanceGroup[3]) {
            self.scrollTo(self.titleToContent[2], 2);
        } else if (bodyScrollTop >= distanceGroup[3]) {
            self.scrollTo(self.titleToContent[3], 3);
        }
    });
}

sideNav.prototype.urlToContent = function () {
    var self = this;
    var hash = location.hash;
    if (hash) {
        hash = hash.replace("#", "");
        var nameToIndex = {
            "sc": 0,
            "cz": 1,
            "czfl": 2,
            "lb": 3
        }
        var index = nameToIndex[hash];
        self.scrollTo(self.titleToContent[index], index, "click");
    }
}

sideNav.prototype.scrollTo = function (content) {
    var self = this;
    //第二个参数为index，默认为0
    var index = arguments[1] || 0;
    //第三个参数判断事件类型
    var eventType = arguments[2] || null;
    var distance = $("." + content).offset().top;
    //偏移100像素
    var offset = 100;
    if (eventType == "click") {
        $(window).scrollTop(distance - offset);
    }
    self.single.removeClass("current").eq(index).addClass("current");
}

var sideNavObj = new sideNav();

//分页功能
var Paging = function () {
    var pageHandle = $(".page-split");

    pageHandle.each(function () {
        var pageHandle = $(this);
        var total = pageHandle.attr("data-server-len");
        total = parseInt(total);
        var html = "";

        var createPage = function () {
            var totalPage = Math.ceil(total / 30);
            for (var i = 1; i <= totalPage; i++) {
                html = html + ['<li class="next fn-left"><a href="javascript:void(0);" class="page-1">', (i - 1) * 30 + 1, '-', (i) * 30, '</a></li>'].join("");
            }
            pageHandle.html(html);
        };

        var paging = function () {
            pageHandle.find(".next").mouseover(function () {
                var index = $(this).addClass("page").index();
                index++;
                $(this).siblings(".next").removeClass("page");

                var range = {
                    min: (index - 1) * 30 + 1,
                    max: (index) * 30
                };

                pageHandle.siblings(".game-list").find(".ui-select-item").hide().slice(range.min - 1, range.max).show();

            });
        };
        
        createPage();
        paging()
        
    });
}();

//取的gameId
var gameId = $("#page-name").attr("data-game-id");

//首充福利
var Sc = function () {
    var SERVER = 0;
    var errors = $(".sc-content").find(".tips");
    var page = $(".sc-content").find(".page-split");
    var gameList = $(".sc-content").find(".game-list");
    var selectItems = $(".sc-content").find(".ui-select-item");
    var selectServer = $("#sc-select-server").find(".ui-select-trigger");
    selectServer.on("click", function () {
        $(this).addClass("ui-select-trigger-on").siblings(".ui-select-content").removeClass("fn-hide");
    });

    $("#sc-select-server").click(function (e) {
        e.stopPropagation();
    });

    $("body").click(function () {
        hideServer();
    });

    page.find(".page-a").click(function () {
        page.find(".next").removeClass("page");
        var index = $(this).parent().addClass("page").index();
        gameList.addClass("fn-hide").eq(index).removeClass("fn-hide");
    });

    selectItems.find("a").click(function (e) {
        e.preventDefault();
        var id = $(this).attr("data-server-id");
        SERVER = id;
        hideServer();
        var serverName = $(this).html();
        $("#sc-select-server").find(".ui-select-trigger").html(serverName);
    });

    function hideServer() {
        $("#sc-select-server").find(".ui-select-content").addClass("fn-hide");
        $("#sc-select-server").find(".ui-select-trigger").removeClass("ui-select-trigger-on");
    }

    function showError(errorClass) {
        errors.addClass("fn-hide").filter(errorClass).removeClass("fn-hide");
    }

    function getFirstCharge(){
        if (SERVER != 0) {
           showError(".tips-loading");
           $.ajax({
               type : "get",
               url : api_fuli+"/get_firstcharge",
               cache : false,
               data : { sid: SERVER, gid: gameId },
               dataType : "json",
               success : function (data) {
                   if (data.status == "1") {
                       //没登陆
                       showError(".tips-error-login");
                   } else if(data.status == "2"){
                       Tips.show(".tipbox-user");
                   } else if(data.status == "3"){
                       Tips.show(".tipbox-security");
                   } else if (data.status == "true") {
                       showError(".tips-success");
                   } else if (data.status == "false") {
                       var errorMsg = data.msg;
                       $("#sc-custom-error-info").html(errorMsg);
                       showError(".tips-error-custom");
                   } else if (data.status == "typeerror") {
                       Tips.show(".tipbox-user");
                   }
                   var a = function(){
                    $("#get-first-charge").one('click', getFirstCharge);
                   }
                   setTimeout(a, 1000);
               }
           });
       } else {
           showError(".tips-error-type");
       }
    }
    $("#get-first-charge").one('click', getFirstCharge);
}();

//充值福利
var Cz = function () {
    var SERVER = 0;
    var errors = $(".cz-content").find(".tips");
    var page = $(".cz-content").find(".page-split");
    var gameList = $(".cz-content").find(".game-list");
    var selectItems = $(".cz-content").find(".ui-select-item");
    var selectServer = $("#cz-select-server").find(".ui-select-trigger");
    var getPrice = $(".cz-content").find(".get-btn");
    var canGetPrice = false; //判断是否能领奖的标志
    var recordId = 0;
    var taskLine = 0;
    var type = "ptb"
    selectServer.on("click", function () {
        $(this).addClass("ui-select-trigger-on").siblings(".ui-select-content").removeClass("fn-hide");
    });

    $("#cz-select-server").click(function (e) {
        e.stopPropagation();
    });

    $("body").click(function () {
        hideServer();
    });

    page.find(".page-a").click(function () {
        page.find(".next").removeClass("page");
        var index = $(this).parent().addClass("page").index();
        gameList.addClass("fn-hide").eq(index).removeClass("fn-hide");
    });

    $(".cz-content .ui-select-item a").on("click",function (e) {
        e.preventDefault();
        var id = $(this).attr("data-server-id");
        SERVER = id;
        hideServer();
        var serverName = $(this).html();
        $("#cz-select-server").find(".ui-select-trigger").html(serverName);
        showError(".tips-loading");
		
        $.ajax({
            type : "get",
            url : api_fuli+"/get_server",
            cache : false,
            data : { sid: SERVER, gid: gameId },
            dataType : "json",
            success : function (data) {
                if (data.status == "1") {
                    //没登陆
                    showError(".tips-error-login");
                } else if(data.status == "2"){
                    Tips.show(".tipbox-user");
                } else if(data.status == "3"){
                    Tips.show(".tipbox-security");
                } else if (data.status == "true") {
                    errors.filter(".tips-success").html(data.userinfo).removeClass("fn-hide");
                    showError(".tips-success");
                    canGetPrice = true;
                    //重新渲染数据//2015.8.18
                    $("#game-yb-table .list-content-area").remove();
                    $("#game-yb-table ul").append(data.game_coin);
                    $("#game-ptb-table .list-content-area").remove();
                    $("#game-ptb-table ul").append(data.coin);
                } else if (data.status == "false") {
                    var errorMsg = data.msg;
                    $("#cz-custom-error-info").html(errorMsg);
                    showError(".tips-error-custom");
                } else if (data.status == "noroles") {
                    showError(".tips-error-type");
                }
            }
        });

    });
    
    function hideServer() {
        $("#cz-select-server").find(".ui-select-content").addClass("fn-hide");
        $("#cz-select-server").find(".ui-select-trigger").removeClass("ui-select-trigger-on");
    }

    function showError(errorClass) {
        errors.addClass("fn-hide").filter(errorClass).removeClass("fn-hide");
    }

    $(document).on("click", ".cz-content .get-btn" ,function (e) {
        e.preventDefault();
        type = $(this).attr("data-type");
        recordId = $(this).attr("data-price-id");
        taskLine = $(this).attr("data-gift-type");
        var py2hz = {
            yb: "元宝",
            ptb: "平台币"
        };
        $("#get-price-type").html(py2hz[type]);
        Tips.show(".tipbox-ingot");
    });

    //点击确定时候的操作
    $(document).on("click",".tipbox-ingot .sure-to-get", function (e) {
        e.preventDefault();
        if (canGetPrice) {
		// alert("尊敬的用户，您好！本功能正在升级中，预计1月31日12:00前开通，给您带来不便敬请谅解，谢谢！");
           $.ajax({
               type : "get",
			   url : api_fuli+"/sure_to_get",
               cache : false,
               data : { gift_type: type, record_id: recordId,sid: SERVER, gid: gameId },
               dataType : "json",
               success : function (data) {
                   if (data.status == "errorrank") {
                       //失败-等级不够
                       Tips.show(".tipbox-error-rank");
                   } else if(data.status == "false") {
                        
						var errorMsg = data.msg;
                       $("#dj-custom-error").html(errorMsg);
						Tips.show(".tipbox-error");
						
                   } else if(data.status == "2"){
                       Tips.show(".tipbox-user");
                   } else if(data.status == "3"){
                       Tips.show(".tipbox-security");
                   } else if (data.status == "errortime") {
                       //失败-时间过期
                       Tips.show(".tipbox-error-time");
                   } else if (data.status == "true") {
                       //领取成功
                       if (data.type == "yb") {
                           //领取元宝成功
                           Tips.show(".tipbox-get-success-yb");
                           hideStatus("yb", taskLine);
                       } else if (data.type == "ptb") {
                           //领取平台币成功
                           Tips.show(".tipbox-get-success-ptb");
                           hideStatus("ptb",taskLine);
                       }
                       
                   }
               }
           });

        } else {
            $("#cz-custom-error-info").html("请先选择一个有角色的服务器");
            showError(".tips-error-custom");
        }
    });
    
    function hideStatus(status,row){
        row = parseInt(row);
        row = row - 1;
        if(status == "yb"){
            $("#game-yb-table").find(".list-content-area").eq(row).find("a").removeClass().addClass("disabled-btn");
            $("#game-ptb-table").find(".list-content-area").eq(row).find("a").removeClass().addClass("get-other-disabled");
        }else if(status == "ptb"){
            $("#game-ptb-table").find(".list-content-area").eq(row).find("a").removeClass().addClass("disabled-btn");
            $("#game-yb-table").find(".list-content-area").eq(row).find("a").removeClass().addClass("get-other-disabled");
        }    
    }
}();

//充值返利
var Czfl = function () {
    var getBtns = $(".czfl-content").find(".get-btn"),
        rebateBtn = $(".rebate-btn"),
        recordId = 0,
        money = 0,
        ptb = 0,
        currentBtn = null;
    getBtns.on("click", function (e) {
        if($(this).hasClass("disabled-btn") === false){
            e.preventDefault();
            currentBtn = this;
            recordId = $(this).attr("data-fl-list-id");
            money = $(this).attr("data-fl-money");
            //ptb = parseInt(money) * 10; 去小数
			ptb = money * 10;
            Tips.show(".tipbox-rebate");
        }
    });
    rebateBtn.on("click", function () {
		//zhouwu 2014-1-30
		// alert("尊敬的用户，您好！本功能正在升级中，预计1月31日12:00前开通，给您带来不便敬请谅解，谢谢！");
       $.ajax({
           type : "get",
           url :  api_fuli+"/get_rebate",
           cache : false,
           data : { record_id: recordId },
		   dataType : "json",
           success : function(data){
			   if (data.status == "true") { 
			      $(".tipbox-get-success-fl").find(".fl-success-money").html(money).end().find(".fl-success-ptb").html(ptb);
                   Tips.show(".tipbox-get-success-fl");
                   $(currentBtn).removeClass().addClass("disabled-btn");
               } else  if(data.status == "2"){
                   Tips.show(".tipbox-user");
               } else if(data.status == "3"){
                   Tips.show(".tipbox-security");
               }else{
                   var errorMsg = data.msg;
                       $("#dj-custom-error").html(errorMsg);
						Tips.show(".tipbox-error");
               }
           }

       });
    });

    //翻页功能

    function Pager() {
        this.table = $("#my-czfl");
        this.pager = this.table.find(".my-czfl-pager");
        this.lists = this.table.find(".czmx-list");
        this.previous = this.pager.find(".previous-btn");
        this.next = this.pager.find(".next-btn");
        this.pageCurrent = this.pager.find(".page-current");
        this.pageTotal = this.pager.find(".page-sum");
        this.init();
    }

    Pager.prototype.init = function () {
        var self = this,
            perPageNum = 9, //每页最多九条记录
            len = self.lists.length;
        if (len === 0) {
            //暂时不进行操作
        } else {
            //计算出页数
            var totlePage = len === 0 ? 1 : Math.ceil(len / perPageNum);
            //计算当前所在页数
            changePage();
            self.pageTotal.html(totlePage);
        }

        self.previous.click(function () {
            var firstVisible = self.lists.filter(":visible").first();
            var firstVisibleIndex = self.lists.index(firstVisible);
            if (firstVisibleIndex > 0) {
                var prevPage = self.lists.slice(firstVisibleIndex - perPageNum, firstVisibleIndex);
                self.lists.addClass("fn-hide");
                prevPage.removeClass("fn-hide");
                changePage();
            }
        });

        self.next.click(function () {
            var firstVisible = self.lists.filter(":visible").first();
            var firstVisibleIndex = self.lists.index(firstVisible);
            if (firstVisibleIndex + perPageNum < len) {
                var nextPage = self.lists.slice(firstVisibleIndex + perPageNum, firstVisibleIndex + perPageNum + perPageNum);
                self.lists.addClass("fn-hide");
                nextPage.removeClass("fn-hide");
                changePage();
            }
        });

        function changePage() {
            var firstVisible = self.lists.filter(":visible").first();
            var firstVisibleIndex = self.lists.index(firstVisible);
            firstVisibleIndex++;
            var currentPage = Math.ceil(firstVisibleIndex / perPageNum);
            self.pageCurrent.html(currentPage);
        }

    };

    new Pager;
}();

//礼包福利
var Lb = function () {
    var SERVER = 0;
    var GIFT = 0;
    var errors = $(".lb-content").find(".tips");
    var page = $(".lb-content").find(".page-split");
    var gameList = $(".lb-content").find(".game-list");
    var selectItems = $(".lb-content").find(".ui-select-item");
    var selectGiftItems = $(".lb-content").find(".ui-select-gift");
    var selectServer = $("#lb-select-server").find(".ui-select-trigger");
    var selectGift = $("#lb-select-gift").find(".ui-select-trigger");
    selectServer.on("click", function () {
        $(this).addClass("ui-select-trigger-on").siblings(".ui-select-content").removeClass("fn-hide");
    });

    selectGift.on("click", function () {
        $(this).siblings(".ui-select-gift").removeClass("fn-hide");
    });

    $("#lb-select-server,#lb-select-gift").click(function (e) {
        e.stopPropagation();
    });

    $("body").click(function () {
        hideServer();
    });

    page.find(".page-a").click(function () {
        page.find(".next").removeClass("page");
        var index = $(this).parent().addClass("page").index();
        gameList.addClass("fn-hide").eq(index).removeClass("fn-hide");
    });

    selectItems.find("a").click(function (e) {
        e.preventDefault();
        var id = $(this).attr("data-server-id");
        SERVER = id;
        hideServer();
        var serverName = $(this).html();
        $("#lb-select-server").find(".ui-select-trigger").html(serverName);
    });

    selectGiftItems.find("a").click(function (e) {
        e.preventDefault();
        var id = $(this).attr("data-gift-id");
        GIFT = id;
        hideServer();
        var giftName = $(this).html();
        $("#lb-select-gift").find(".ui-select-trigger").html(giftName);
    });

    function hideServer() {
        $("#lb-select-server").find(".ui-select-content").addClass("fn-hide");
        $("#lb-select-server").find(".ui-select-trigger").removeClass("ui-select-trigger-on");
        $("#lb-select-gift").find(".ui-select-gift").addClass("fn-hide");
    }

    function showError(errorClass) {
        errors.addClass("fn-hide").filter(errorClass).removeClass("fn-hide");
    }

    $("#lb-get-gift").click(function () {
        if (SERVER != 0 && GIFT != 0) {
            var gameId = $(this).attr("data-game-id");

            $.ajax({
                type : "get",
                url : api_fuli+"/get_card",
                cache : false,
                data : { sid: SERVER, cid: GIFT,gid: gameId },
                dataType : "json",
                success : function (data) {
                    if (data.status == "1") {
                        //没登陆
                        showError(".tips-error-login");
                    } else if (data.status == "true") {
                        showError(".tips-success-card");
                        $("#lb-card-number").html(data.card);
                    } else if (data.status == "false") {
                        var errorMsg = data.msg;
                        $("#lb-custom-error-info").html(errorMsg);
                        showError(".tips-error-custom");
                    } else if (data.status == "typeerror") {
                        Tips.show(".tipbox-user");
                    }
                }
            });
        } else {
            showError(".tips-error-type");
        }
    });
}();
$("#remail").on("click",function(){
    Tips.show(".tip-box-qq-email");
})


});




