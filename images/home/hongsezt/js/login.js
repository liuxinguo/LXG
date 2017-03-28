
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

var gid=48;
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
    url:"/public/membergame?gid=44&num=1",
    //url:"http://member.yaowan.com/?m=user&action=checklogin&gid="+gid,
	
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
function login(){
  var user=document.getElementById("username").value;

  var password=document.getElementById('userpass').value;

  var rls=document.getElementById('rls').value;

  if(user==''){

  alert('请输入用户名');
      return;

    } 

  if(password==''){     

  alert('请输入密码');

      return false;
    }

  $.ajax({

    url:"/public/memberlogin?action=jsonlogin&username="+user+"&password="+password+"&rls="+rls,
	
	/**1登陆成功**/

    type:"GET",

    dataType:"jsonp",

    success:function(data){

      if(data.success=='1'){
          
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
    $.getJSON("/public/game_log?gid="+gid+"&num=1&callback=?",function(data){
	    var game_info = '';
	    for(i in data){
	        game_info +='<li><a href="'+data[i].href+'" target="_blank"><i></i>'+data[i].line +data[i].sid+'服　'+data[i].title+'</a></li>';
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

    url:"http://member.yaowan.com/?m=user&action=jsonregister2&username="+username+"&password="+password,  
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
    url:"http://gameapi.yaowan.com/game/servers",
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
    window.location.href = "http://www.yaowan.com/Default.php?m=game&client=1&game_id="+ingameid+"&district_id="+sid;

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
    url:"http://gameapi.yaowan.com/game/scServer/?"+inputdata+'&callback=?',
    //data:inputdata+'&callback=?',
    //url:"http://gameapi.yaowan.cc/?m=game!scServer",
    dataType:'jsonp',
    //jsonp:'callback',
    success:function(result){
      if(result['status']==1){
        $.each(result['server'],function(k,v){
          //alert(v['district_id']);
          playgame(gid,v['district_id']);
          //window.location.href = "http://www.yaowan.com/Default.php?m=game&action=sg&debug=y&client=1&game_id="+gid+"&district_id="+v['district_id'];
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

    url:"/member/logout",

    type:"GET",

    dataType:"jsonp", 
   
    success:function(data){

       //window.location.href="http://sc.yaowan.com/mini_login/index.html";   
      if(data.success=='1'){
        document.getElementById("username").value = username;
        document.getElementById("userpass").value = '';
        signoff();
      }

    }

  },true);

}
function tips (argument) {
  /*alert("请先注销帐号再进行用户注册");
  return false;*/
  $.ajax({

    url:"http://member.yaowan.com/?m=user&action=jsonlogout",

    type:"GET",

    dataType:"jsonp", 

    success:function(data){

       //window.location.href="http://sc.yaowan.com/mini_login/index.html";   
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
