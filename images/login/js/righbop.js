$(function() {
	if(undefined != window.parent.frames["leftFrame"]) {
		window.parent.frames['topFrame'].is_leftbar(1);//代表有左侧工具条，顶部定位
		window.parent.frames['rightFrame'].is_leftbar(1);//代表有左侧工具条，顶部定位
	}


	var ie=function(){
		var undef,rv=-1;
		if(navigator.appName=='Microsoft Internet Explorer') {
			var ua=navigator.userAgent;
			var re=new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
			if(re.exec(ua)!=null)	rv=parseFloat(RegExp.$1);
		}
		return((rv>-1) ? rv : undef);
	};

	var win = window,
			doc = document,
			isIE = !!win.ActiveXObject
	    isFF = !!doc.getBoxObjectFor || 'mozInnerScreenX' in win, // gecko 
	    isOP = !!win.opera && !!win.opera.toString().indexOf('Opera'), 
	    isWK = !!win.devicePixelRatio,                            // web-kit 
	    isSF = /a/.__proto__ == '//',                             // safari 
	    isCR = /s/.test(/a/.toString);                            // chrome 
	if(isIE) {
		ieVersion = ie();
		if(ieVersion == 6) {
			$("#sh_gameinfo_d").css("height","99px");
			$("#sh_myinfo_d").css("height","130px");
		}else if(ieVersion == 7) {
			$("#sh_gameinfo_d").css("height","95px");
		$("#sh_myinfo_d").css("height","130px");
		}else if(ieVersion == 8) {
			$("#sh_gameinfo_d").css("height","95px");
		$("#sh_myinfo_d").css("height","130px");
		}else if(ieVersion == 9) {
			$("#sh_gameinfo_d").css("height","95px");
		$("#sh_myinfo_d").css("height","130px");
		}else {
			$("#sh_gameinfo_d").css("height","95px");
		$("#sh_myinfo_d").css("height","130px");
		}
	}else {
		$("#sh_gameinfo_d").css("height","95px");
		$("#sh_myinfo_d").css("height","130px");
	}

});