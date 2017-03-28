
function signok(){
  $("#login").hide();
  $("#reg").hide();
  $("#se_list").show();
  gamelog();
}
function signoff(){
  $("#login").show();
  $("#login1").show();
  $("#se_list").hide();
  $("#reg").hide();
    gamelog();
}
function regON () {
  $("#login").show();
  $("#reg").show();
  $("#login1").hide();
  $("#se_list").hide();
  
}
var islogin='';
var fastserver="";
var lastAction="";
var serverList=new Array();


//var gid = 86 ;
function onSina(){
	window.location=sinaurl;
} 

window.onload=onload()

function getcookie(objname){//获取指定名称的cookie的值

  var arrstr = document.cookie.split("; ");

  for(var i = 0;i < arrstr.length;i ++){

    var temp = arrstr[i].split("=");

    if(temp[0] == objname) return unescape(temp[1]);

  }

}
function onload(){

    if(getcookie("mini_login_user")!=null){

      document.getElementById("username").value=getcookie("mini_login_user");

      document.getElementById('rls').checked=true;

    }

    checkuser();
  }
function checkuser(){
  
  $.ajax({
    url: index_url+"/public/membergame?gid="+gid+"&num=1",
	
	 /**最近登陆**/

    type:"GET",

    dataType:"jsonp",

    success:function(data){

      if(data.status=="1"){

        islogin=1;          

        var html="<span>"

        html+=data.username;

        html +='</span>'; 

        $('#user_info').html(html);
        $('#uname').html(data.username);
        $('#money').html(data.money);
        $('#jifen').html(data.jifen);

        document.getElementById("prize").value = data.prize;
  
        signok();
       
        fastserver=data.new_sid;

       /** server_list('serverListCon',0); **/

      }else{

        islogin=0;

        signoff();

      }     

    }   

  })  

}
function getCookie(name) {
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    if (arr = document.cookie.match(reg)) return unescape(arr[2]);
    else return null;
}

  var Div = '<script type="text/javascript" src="http://www.752g.com/js/home/md5.js"></script><style>*{margin:0;padding:0;}html,body{width:100%;height:100%;position:relative;}.user,.pass{margin-top:10px;}.denglu{float:left;}.denglu input{width:124px;height:25px;}.deng{display:inline-block;float:right;width:58px;height:58px;text-align:center;line-height:58px;border:1px solid #ccc;margin-top:15px;margin-right:15px;cursor:pointer;}.yanz{width:300px;height:210px;border:1px solid #ccc;position:fixed;bottom:50%;left:50%;margin-bottom:-105px;margin-left:-150px;z-index:999;color:#3c3c3c;border-radius:5px;background-color:#fff;display:none;}.yanz input{width:132px;height:25px;margin-left:5px;margin-right:5px;border:1px solid #ccc;padding-left:2px;}.yanz .close{display:inline-block;width:38px;height:36px;background:url(images/close.png);position:absolute;right:-39px;top:0;cursor:pointer;}.kong{width:100%;height:130px;padding-left:40px;padding-top:10px;}.kong img{width:140px;display:block;padding-bottom:10px;}.kong span{display:block;margin-top:10px;overflow:hidden;}.kong span img{width:90px;height:30px;display:inline-block;float:left;}.kong span a{width:60px;height:30px;display:inline-block;float:left;text-align:center;line-height:30px;cursor:pointer;background:green;border-radius:5px;color:#fff;margin-left:10px;}.wenzi{font-size:14px;font-family:微软雅黑;}.green{color:green;}.red{color:red;}.yingy{width:100%;height:100%;background-color:#000;position:fixed;left:0;bottom:0;opacity:.2;display:none;}.btn-sm{margin-top:20px;margin-left:28%;display:inline-block;width:140px;height:30px;background-color:#febc0f;text-align:center;line-height:30px;color:#fff;cursor:pointer;border-radius:5px;}</style><div class="yanz"><div class="kong"><img src="images/logo.png" alt=""><span><img src="http://www.752g.com/index.php?s=/public/verify" id="verifyImg"><a href="javascript:void(0);" onclick="refreshCode();">刷新</a></span><a href="javascript:void(0);" onclick="closea();return false;" class="close"></a><label>验证码:</label><input type="text" onblur="javascript:validate();" name="yz_code" id="yz_code" placeholder="请输入验证码" class="yanma"><div class="wenzi " id="msgyz">请输入验证码</div></div><a href="javascript:void(0);" onclick="att();return false;" class="login_btn btn-sm">确认</a></div><div class="yingy"></div>';



$(Div).appendTo('body');

function refreshCode()
{
  //重载验证码
  var timenow = new Date().getTime();
  document.getElementById('verifyImg').src = "http://www.752g.com/index.php?s=/public/verify/"+timenow;
}
function validate() {
    var code = hex_md5($("#yz_code").val());

    var re_code = getCookie('mob_code');
    if (code != '' && code == re_code) {
        ShowMsg("msgyz", 1, "验证码输入正确！");
        bValid_code = true;
        return;
    } else {
        ShowMsg("msgyz", 0, "验证码输入错误！");
        bValid_code = false;
    }
}
function ShowMsg(IdStr, ErrNum, ErrStr) {
    var ClrArr = new Array("#f00", "#33f", "#339900");
    $("#" + IdStr).css({
        fontWeight: "bold",
        fontSize: "9pt",
        color: ClrArr[ErrNum]
    });
    $("#" + IdStr).html(ErrStr);
}

function closea(){
    $(".yanz").hide();
    $(".yingy").hide();
  }

function login(){
    var user=document.getElementById("username").value;
    var password=document.getElementById('userpass').value;

  if(user==''){
  alert('请输入用户名');
      return;
    } 

  if(password==''){     
  alert('请输入密码');
      return false;
    }

    $(".yanz").show();
    $(".yingy").show();
  }

function att(){
 validate();
    if (!bValid_code) {
        return false;
    }


    var user=document.getElementById("username").value;
    var password=document.getElementById('userpass').value;
    var rls=document.getElementById('rls').value;
    var yz_code=document.getElementById('yz_code').value;
  $.ajax({

    url: index_url+"/public/memberlogin?action=jsonlogin&username="+user+"&password="+password+"&verifycode="+yz_code+"&rls="+rls,
	
	/**1登陆成功**/

    type:"GET",

    dataType:"jsonp",

    success:function(data){

      if(data.success=='1'){
           $(".yanz").hide();
           $(".yingy").hide();
          checkuser();
        }else if(data.success=='2'){
          alert('用户不存在，或者被删除！');
		  return false;
        }else if(data.success=='3'){
          alert('密码错误！');
		  return false;
        }else if(data.success=='9'){
          alert('未知错误！');
		  return false;
        }
      }
    })
}
function gamelog(){
	//玩过的游戏
    $.getJSON( index_url+"/public/game_log?gid="+gid+"&num=1&callback=?",
      function(data){
	    var game_info = '';
	    for(i in data){
	        game_info +='<li><a href="'+data[i].href+'" target="_blank"><i></i>'+data[i].title+'</a></li>';
	    }
	    if(game_info=='') game_info ='您最近还没有玩过这个游戏！马上体验。';
      
	    document.getElementById("last_game_info").innerHTML = game_info;
    });

}
function register () {
  var usern = /^[a-zA-Z0-9_]{1,}$/;
  var username = document.getElementById("uid").value;
  var password = document.getElementById("pwd").value;
  var password1 = document.getElementById("pwd1").value;
  var threaty  = document.getElementById("treaty").checked;
  if(username == ''){
    alert("请输入用户名");
    return false;
  }
  if(!username.match(usern)){
    alert("用户名仅由数字、字母和下划线组成。请检查！");
    return false;
  }
  if(password == '' || password1 == ''){
    alert("请输入密码");
    return false;
  }
  if(password != password1){
    alert("两次密码不一致");
    return false;
  }
  if(threaty == false){
    alert("请仔细阅读并同意《用户注册协议》方可注册成功");
    return false;
}
  $.ajax({

    url:"/?m=user&action=jsonregister2&username="+username+"&password="+password,  
    //**注册 **/
    type:"GET",

    dataType:"jsonp",

    success:function(data){

      if(data.success=='1'){

          checkuser();

        }else if(data.success == '-1'){

          alert('此用户已经被注册！');
          return false;
        }else{
          alert('用户名或密码不对');
          return false;
        }
      }
    });
}
function server_list(id,limit){
  var host = window.location.host;
  var arr = window.location.host.split(".");
  if(limit==0){
    var inputdata = 'gid='+gid;
  }else{
    var inputdata = 'gid='+gid+'&limit='+limit;
  }
  $.ajax({
    url:"/game/servers",
    dataType:'jsonp',
    data:inputdata,
    jsonp:'callback',
    success:function(result){
      var zj = '';
      var tj = '';
      var sy = '';
      if(result['all']!=null){
        $.each(result['all'],function(k,v){
          serverList[v["sid"]]=new Array();
          serverList[v["sid"]]["district_id"]=v["district_id"];
          serverList[v["sid"]]["runtime"]=v["runtime"];
          serverList[v["sid"]]["title"]=v["title"];

          if(k==0){
            zj = '<a class="hover" href="javascript:void(0);" onClick="playgame(gid,'+v["district_id"]+');return false;">'+v["title"]+'</a>';
            tj = '<a class="hover" href="javascript:void(0);" onClick="playgame(gid,'+v["district_id"]+');return false;">'+v["title"]+'</a>';
          }
          if(k<12 && k>0){
            tj += '<a  href="javascript:void(0);" onClick="playgame(gid,'+v["district_id"]+');return false;">'+v["title"]+'</a>';
          }
          sy += '<a  href="javascript:void(0);" onClick="playgame(gid,'+v["district_id"]+');return false;">'+v["title"]+'</a>';

        });
      }
      if(result['play']!=null){
        $.each(result['play'],function(k,v){
          if(k==0){
            zj = '<a class="hover" href="javascript:void(0);" onClick="playgame(gid,'+v["district_id"]+');return false;">'+v["title"]+'</a>';
          }
        });
      }
      jQuery("#zj").html(zj);
      jQuery("#tj").html(tj);
      jQuery("#sy").html(sy);
    }
  });
}
function playgame(ingameid,sid){
    window.location.href = "/Default.php?m=game&client=1&game_id="+ingameid+"&district_id="+sid;

}
function gotogame(sid){

      if(sid==null){

        sid=document.getElementById('gotonum').value;

      }
      /*alert("此功能暂不开放！敬请期待");
      alert(sid);*/
      var host = window.location.host;
  var arr = window.location.host.split(".");
  inputdata = 'gid='+gid+'&sid='+sid;
  $.ajax({
    url:"/game/scServer/?"+inputdata+'&callback=?',
    dataType:'jsonp',
    //jsonp:'callback',
    success:function(result){
      if(result['status']==1){
        $.each(result['server'],function(k,v){
          playgame(gid,v['district_id']);
        });
      }else if(result['status']==0){
        alert("此服务器尚未开启，请选择已开启的服务器进入游戏!");
      }
    }
  });
      //playgame(gid,sid);      
  }
function exit(){
  //var username = $("#uname").html();
  var username = getcookie("mini_login_user");
  $.ajax({

    url:index_url+"/member/logout",

    type:"GET",

    dataType:"jsonp", 
   
    success:function(data){
 
      if(data.success=='1'){
        document.getElementById("username").value = username;
        document.getElementById("userpass").value = '';
        signoff();
      }

    }

  },true);

}
function add_favorite(a, title, url) {
	url = url || a.href;
	title = title || a.title;
	try{ // IE
		window.external.addFavorite(url, title);
	} catch(e) {
		try{ // Firefox
			window.sidebar.addPanel(title, url, "");
		} catch(e) {
			if (/Opera/.test(window.navigator.userAgent)) { // Opera
				a.rel = "sidebar";
				a.href = url;
				return true;
			}
			alert('加入收藏失败，请使用 Ctrl+D 进行添加');
		}
	}
	return false;
}
function set_homepage(a, url) {
	var tip = '您的浏览器不支持此操作\n请使用浏览器的“选项”或“设置”等功能设置首页';
	if (/360se/i.test(window.navigator.userAgent)) {
		alert(tip);
		return false;
	}
	url = url || a.href;
	try {
		a.style.behavior = 'url(#default#homepage)';
		a.setHomePage(url);
	} catch(e) {
		alert(tip);
	}
	return false;
}
function toQzoneLogin() {
    childWindow = window.open(index_url+"/opensns/qqlogin", "TencentLogin", "width=600,height=430,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
}
function tips (argument) {
  /*alert("请先注销帐号再进行用户注册");
  return false;*/
  $.ajax({

    url:"/?m=user&action=jsonlogout",

    type:"GET",

    dataType:"jsonp", 

    success:function(data){

       if(data.success=='1'){

        document.getElementById("userpass").value = '';
        document.getElementById("uid").value = '';
        document.getElementById("pwd").value = '';
        document.getElementById("pwd1").value = '';
        //checkuser();
        regON();
       }

    }

  },true);
}

