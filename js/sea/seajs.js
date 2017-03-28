   jQuery_1_10_2(function($){
	seajs.config({
                alias: {
                    "dialog-css": "http://static.tonnn.com/webnew/welfare/css/dialog.css?v=7",
                    "dialog": "dialog.js?v=7"
                }
            });
            seajs.use(["dialog", "dialog-css"], function(User) {
                //暴露User对象到全局，供其余方法调用
                window.User = User;
                //带有common-signin-button的类的元素点击调用登录框
                $(".common-signin-button").on("click", function(e) {
                    e.preventDefault();
                    User.call();
                });
                $(".common-signup-button").on("click", function(e) {
                    e.preventDefault();
                    User.call("signup");
                });
            });
			});