function get_cookie(name) {
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    if (arr = document.cookie.match(reg)) return unescape(arr[2]);
    else return null;
}
var _cl = get_cookie('web_member_login_status');
if (_cl == null && (/login.sdyouxi.com/i.test(window.location.href))) {
    window.location.href = login_url;
}