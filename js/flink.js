//友情链接滚动
$(function(){function extractNodes(pNode){if(pNode.nodeType==3)return null;var node,nodes=new Array();for(var i=0;node=pNode.childNodes[i];i++){if(node.nodeType==1)nodes.push(node)}return nodes}var obj=document.getElementById("footer-link");for(i=0;i<4;i++){obj.appendChild(extractNodes(obj)[i].cloneNode(true))}settime=0;var t=setInterval(rolltxt,50);function rolltxt(){if(obj.scrollTop%(obj.clientHeight-5)==0){settime+=1;if(settime==50){obj.scrollTop+=1;settime=0}}else{obj.scrollTop+=1;if(obj.scrollTop==(obj.scrollHeight-obj.clientHeight)){obj.scrollTop=0}}};obj.onmouseover=function(){clearInterval(t)};obj.onmouseout=function(){t=setInterval(rolltxt,50)}});

//get link
/*$(document).ready(function() {
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/game/index/getFriendLinkList",
        data:{},
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback:"apiGetFriendLinkList",
        success: function(json) {
            $('footer-c_c').html(json.friendlist);
        },
        error: function() {}
    });
});*/