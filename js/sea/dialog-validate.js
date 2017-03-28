   jQuery_1_10_2(function($){
define(function (require, exports, module) {


    function Validate() {
        this.signin = $(".signin-content");
        this.sinAccout = this.signin.find(".account-handle");
        this.sinPwd = this.signin.find(".password-handle");
        this.signinBtn = this.signin.find(".login-btn");
        this.error = this.signin.find(".login-errors");
        this.errorMsg = {
            empty: "帐号和密码不能为空",
            error: "帐号或密码错误"
        };
        this.signup = $(".signup-content");
        this.supAccount = this.signup.find(".account-handle");
        this.supPwd = this.signup.find(".password-handle");
        this.supConPwd = this.signup.find(".password-confirm-handle");
        this.supBtn = this.signup.find(".signup-btn");
        this.supErrorMsg = {
            account: {
                empty: "帐号不能为空",
                minLen: "长度不能小于3字符",
                maxLen: "长度不能超过25个字符",
                firstWord: "开头必须为字母",
                errorWord: "只能使用字母、数字、下划线",
                exist: "帐号已存在，请更换其他帐号"
            },
            password: {
                empty: "密码不能为空",
                minLen: "长度不能小于6个字符",
                maxLen: "长度不能超过20个字符"
            },
            confirmPassword: {
                empty: "请再次填写密码",
                equal: " 两次填写的密码不一致"
            }
        };
        this.fcm = $(".fcm-content");
        this.supName = this.fcm.find(".name-handle");
        this.identity = this.fcm.find(".identity-handle");
        this.saveBtn = this.fcm.find(".save-btn");
        this.fcmErrorMsg = {
            trueName: {
                empty: "姓名不能为空",
                format: "请填写正确姓名"
            },
            identity: {
                empty: "身份证不能为空",
                format: "请输入正确的身份证号"
            }

        };
        //增加回车键提交表单功能
         $(".sign-dialog-hand").find(".base-input").keypress(function(event) {
            if (event.keyCode == 13) {
                $(this).parents(".dialog-content")
                .find(".common-btn").click();
            }
        });
    }

    Validate.prototype.validateSignin = function () {
        var self = this;

        self.sinAccout.add(self.sinPwd).on("blur", function () {
            var val = $(this).val();
            val = $.trim(val);
            if (val == "") {
                self.error.css("visibility", "visible").find(".error-msg").html(self.errorMsg.empty);
            }
            $(this).removeClass("base-input-focus");
        }).on("focus", function () {
            self.error.css("visibility", "hidden");
            $(this).addClass("base-input-focus");
        });

        self.signinBtn.on("click", function () {
            var that = this;
            if (!$(this).hasClass("login-btn-ing")) {
                if (self.vali()) {
                    $(this).addClass("login-btn-ing");
                    var account = $.trim(self.sinAccout.val());
                    var password = $.trim(self.sinPwd.val());
                    $.ajax({
                        type: "post",
                        url: "/welfare/login",
                        data: {
                            username: account,
                            password: password
                        },
                        dataType: "json",
                        success: function (data) {
                            if (data.status == "1") {
                                //成功的情况
                                location.reload();
                            } else if (data.status == "2") {
                                //帐号认证出错的情况
                                self.error.css("visibility", "visible").find(".error-msg").html(self.errorMsg.error);
                            }
                            $(that).removeClass("login-btn-ing");
                        },
                        error: function () {
                            alert("对不起，网络出现错误，请重试");
                            $(that).removeClass("login-btn-ing");
                        }
                    });
                }
            }
        });
    };

    Validate.prototype.vali = function () {
        var self = this;
        if ($.trim(self.sinAccout.val()) == "" || $.trim(self.sinPwd.val()) == "") {
            self.error.css("visibility", "visible").find(".error-msg").html(self.errorMsg.empty);
            return false;
        }
        return true;
    };

    Validate.prototype.validateSignup = function () {
        var self = this;

        //实际验证函数
        var validateContent = function (type) {
            var that = this;
            var val = $(this).val();
            val = $.trim(val);
            if (type == "accout") {
                if (val == "") {
                    showError.call(this, self.supErrorMsg.account.empty);
                    return false;
                } else if (val.length < 3) {
                    showError.call(this, self.supErrorMsg.account.minLen);
                    return false;
                } else if (val.length > 25) {
                    showError.call(this, self.supErrorMsg.account.maxLen);
                    return false;
                } else if (!(/^[a-zA-Z].*$/.test(val))) {
                    showError.call(this, self.supErrorMsg.account.firstWord);
                    return false;
                } else if (!(/^[a-zA-Z0-9_]*$/.test(val))) {
                    showError.call(this, self.supErrorMsg.account.errorWord);
                    return false;
                } else {
                    var result = false;
                    $.ajax({
                        type: "get",
                        url: "/welfare/login_name/exists",
                        cache : false,
                        data: {
                            username: val
                        },
                        dataType: "json",
                        async: false,
                        success: function (data) {
                            if (data.status == "1") {
                                result = true;
                            } else if (data.status == "2") {
                                showError.call(that, self.supErrorMsg.account.exist);
                            }
                        },
                        error: function () {
                            alert("对不起，网络出现错误，无法检测用户名是否存在，请刷新重试。");
                            result = false;
                        }
                    });
                    return result;
                }
            } else if (type == "pwd") {
                if (val == "") {
                    showError.call(this, self.supErrorMsg.password.empty);
                    return false;
                } else if (val.length < 6) {
                    showError.call(this, self.supErrorMsg.password.minLen);
                    return false;
                } else if (val.length > 20) {
                    showError.call(this, self.supErrorMsg.password.maxLen);
                    return false;
                }
            } else if (type == "pwdCon") {
                if (val == "") {
                    showError.call(this, self.supErrorMsg.confirmPassword.empty);
                    return false;
                } else if (val != self.supPwd.val()) {
                    showError.call(this, self.supErrorMsg.confirmPassword.equal);
                    return false;
                }
            }

            return true;
        };

        function showError(msg) {
            $(this).siblings(".errors").html(msg).show().siblings(".tips").hide();
        }

        self.supAccount.add(self.supPwd).add(self.supConPwd).on("blur", function () {
            if ($(this).hasClass("account-handle")) {
                validateContent.call(this, "accout");
            } else if ($(this).hasClass("password-handle")) {
                validateContent.call(this, "pwd");
            } else if ($(this).hasClass("password-confirm-handle")) {
                validateContent.call(this, "pwdCon");
            }
            $(this).removeClass("base-input-focus")
        }).on("focus", function () {
            $(this).siblings(".errors").hide().siblings(".tips").show();
            $(this).addClass("base-input-focus");
        });

        self.supBtn.on("click", function () {
            if (!$(this).hasClass("login-btn-ing")) {
                if (validateContent.call(self.supAccount.get(0), "accout") && validateContent.call(self.supPwd.get(0), "pwd") && validateContent.call(self.supConPwd.get(0), "pwdCon")) {
                    $(this).addClass("login-btn-ing");
                    var account = $.trim(self.supAccount.val());
                    var password = $.trim(self.supPwd.val());
                    $.ajax({
                        type: "post",
                        url: "/welfare/signup",
                        data: {
                            username: account,
                            password: password
                        },
                        dataType: "json",
                        success: function (data) {
                            if (data.status == "1") {
                                //成功的情况
                                self.signup.hide();
                                self.fcm.show();
                            } else if (data.status == "2") {
                                //帐号认证出错的情况
                                alert(data.error);
                            }
                            $(this).removeClass("login-btn-ing");
                        },
                        error: function () {
                            alert("对不起，网络出现错误，请重试");
                            $(this).removeClass("login-btn-ing");
                        }
                    });
                }
            }
        });
    };

    Validate.prototype.validateFcm = function () {
        var self = this;

        var validateContent = function (type) {
            var val = $(this).val();
            val = $.trim(val);
            if (type == "name") {
                if (val == "") {
                    showError.call(this, self.fcmErrorMsg.trueName.empty);
                    return false;
                } else if (!(/^[\u4e00-\u9fa5]+[·•]?[\u4e00-\u9fa5]+$/.test(val))) {
                    showError.call(this, self.fcmErrorMsg.trueName.format);
                    return false;
                }
            } else if (type == "identity") {
                if (val == "") {
                    showError.call(this, self.fcmErrorMsg.identity.empty);
                    return false;
                } else if (!(/^(\d{14}|\d{17})(\d|[xX])$/.test(val))) {
                    showError.call(this, self.fcmErrorMsg.identity.format);
                    return false;
                }
            }
            return true;
        }

            function showError(msg) {
                $(this).siblings(".errors").html(msg).show().siblings(".tips").hide();
            }

        self.supName.add(self.identity).on("blur", function () {
            var val = $(this).val();
            val = $.trim(val);
            if ($(this).hasClass("name-handle")) {
                validateContent.call(this, "name");
            } else if ($(this).hasClass("identity-handle")) {
                validateContent.call(this, "identity");
            }
            $(this).removeClass("base-input-focus");
        }).on("focus", function () {
            $(this).siblings(".errors").hide().siblings(".tips").show();
            $(this).addClass("base-input-focus");
        });

        self.saveBtn.on("click", function () {
            var that = this;
            if (!$(this).hasClass("login-btn-ing")) {
                if (validateContent.call(self.supName.get(0), "name") && validateContent.call(self.identity.get(0), "identity")) {
                    $(this).addClass("login-btn-ing");
                    var trueName = $.trim(self.supName.val());
                    var identity = $.trim(self.identity.val());
                    $.ajax({
                        type: "post",
                        url: "/welfare/fcm",
                        data: {
                            truename: trueName,
                            identity: identity
                        },
                        dataType: "json",
                        success: function (data) {
                            if (data.status == "1") {
                                //成功的情况
                                location.reload();
                            }
                            $(that).removeClass("login-btn-ing");
                        },
                        error: function () {
                            alert("对不起，网络出现错误，请重试");
                            $(that).removeClass("login-btn-ing");
                        }
                    });
                }
            }
        });
    };

    module.exports = Validate;
});
			});