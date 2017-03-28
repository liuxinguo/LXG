var info_obj,layer_obj,jsparam;
var layer1_finish = 0;
var layer2_finish = 0;
var layer3_finish = 0;
var layer4_finish = 0;
var layer5_finish = 0;
var layer6_finish = 0;
var layer7_finish = 0;
var layer8_finish = 0;
var layer9_finish = 0;
var layer10_finish = 0;
var layer11_finish = 0;
var layer12_finish = 0;
var layer13_finish = 0;
var layer14_finish = 0;
var layer15_finish = 0;
var layer16_finish = 0;
var layer17_finish = 0;
var layer18_finish = 0;
var layer19_finish = 0;
var layer20_finish = 0;
var layer21_finish = 0;
var layer22_finish = 0;
var layer24_finish = 0;
var layer25_finish = 0;
var layer26_finish = 0;
var layer27_finish = 0;
var layer28_finish = 0;
var layer29_finish = 0;

//获取将要显示的所有弹层信息
function get_layer(gid,sid)
{
    var querystr = window.location.href.split("?");
    $.getJSON("http://game.51.com/gamelayer/index?callback=?&account="+account+"&gid="+gid+"&sid="+sid+"&"+querystr[1], function(data){
        if ('s1'==data.result && data.layernum>0)
        {
            layer_obj = data;
            info_obj = data.info;
            show_layer(layer_obj);
        }
    });
}

//遍历所有弹层信息，直到第一个还未展示的弹层，然后展示该弹层
function show_layer(lobj)
{
    var i,lid,finishflag;
	var arr=new Array(); 
	for(i in lobj.layer)
	{
		arr.push(lobj.layer[i].level);
	}
	arr.sort(function compare(a,b){return b-a;});
	
	for(j=0;j<arr.length;j++)
	{
		n = arr[j];
		//console.log(n); 
		lid = lobj.layer[n].id;
            finishflag = eval('layer'+lobj.layer[n].id+'_finish');
            if (!finishflag)
                {
                    $.getScript("http://static.51img1.com/v3/op/gamenew.51.com/platform/js/"+lobj.layer[n].jsname+".js?v=20140123001", function(){ 
                        jsparam = lobj.jsparam[n];
                        setTimeout(eval('"'+lobj.layer[n].jsname+'()"'),lobj.layer[n].second*1000);
                    });
                    break;
                }
	
	}

}

function getCookielayer(c_name){
	if (document.cookie.length>0) {
		c_start=document.cookie.indexOf(c_name + "=");
		if (c_start!=-1) { 
			c_start=c_start + c_name.length+1; 
			c_end=document.cookie.indexOf(";",c_start);
			if (c_end==-1) c_end=document.cookie.length;
				return unescape(document.cookie.substring(c_start,c_end));
		} 
	}
	return "";
}

function SetCookielayer(name,value,expires,path)//,path,domain,secure)
{
	var expDays = parseInt(expires*24*60*60*1000);
	var expDate = new Date();
	expDate.setTime(expDate.getTime()+expDays);
	var expString = ((expires==null) ? "" : (";expires="+expDate.toGMTString()));
	var pathString = ((path==null) ? "" : (";path="+path));
	//var domainString = ((domain==null) ? "" : (";domain="+domain));
	//var secureString = ((secure==true) ? ";secure" : "" );
	document.cookie = escape(name) + "=" + escape(value) + expString + pathString; //+ pathString + domainString + secureString;
}

function SetCookielayerhour(name,value,expireshour,path)//,path,domain,secure)
{
	var expDays = parseInt(expireshour*60*60*1000);
	var expDate = new Date();
	expDate.setTime(expDate.getTime()+expDays);
	var expString = ((expireshour==null) ? "" : (";expires="+expDate.toGMTString()));
	var pathString = ((path==null) ? "" : (";path="+path));
	//var domainString = ((domain==null) ? "" : (";domain="+domain));
	//var secureString = ((secure==true) ? ";secure" : "" );
	document.cookie = escape(name) + "=" + escape(value) + expString + pathString; //+ pathString + domainString + secureString;
}