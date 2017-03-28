jQuery_1_10_2(function($){
define(function (require, exports, module) {
    var Validate = require("./dialog-validate.js?v=4");

    var validate = new Validate();
    validate.validateSignin();
    validate.validateSignup();
    validate.validateFcm();

    var Dialog = function () {
        var dialog = $(".sign-dialog-hand");
        var tabs = dialog.find(".tab-area");
        var contents = dialog.find(".dialog-content");
        var close = dialog.find(".dialog-close");
        var fcmPage = dialog.find(".fcm-content");
        var skipStep = dialog.find(".skip-this-step");
        var maskHandler = $(".mask-layer");
        var settings = {};

        //TODO 鐢ㄦ埛閰嶇疆鍔熻兘
        var config = function (userSettings) {
            settings = $.extend({
                validateUsername: "/is_username_repeat"
            }, userSettings || {});
        }

        var show = function (index) {
            tabs.removeClass("tab-area-current").eq(index).addClass("tab-area-current");
            contents.hide().eq(index).show();
        };
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
        var init = function () {
            var self = this;

            tabs.on("click", function (e) {
                e.preventDefault();
                var index = tabs.index($(this));
                show(index);
            });

            close.on("click", function (e) {
                e.preventDefault();
                if (fcmPage.is(":visible")) {
                    location.reload();
                }
                dialog.hide();
                mask("hide");
            });

            skipStep.on("click", function (e) {
                e.preventDefault();
                location.reload();
            });
        };

        init();

        var call = function (method) {
            var self = this;
            var method = method || "signin";
            if (method == "signup") {
                tabs.find(".tab-signup").click();
            } else if (method == "signin") {
                tabs.find(".tab-signin").click();
            }
            dialog.show();
            mask("show");
            if (typeof document.body.style.maxHeight === "undefined") {
                var offsetHeight = $(window).scrollTop() + 200;
                dialog.css("top", offsetHeight)
            }
        };


        return {
            call: call,
            config: config
        }
    }();

    module.exports = Dialog;
});
});