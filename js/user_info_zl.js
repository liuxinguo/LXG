function range(low, high, step) {
  var matrix = [];
  var inival, endval, plus;
  var walker = step || 1;
  var chars = false;

  if (!isNaN(low) && !isNaN(high)) {
    inival = low;
    endval = high;
  } else if (isNaN(low) && isNaN(high)) {
    chars = true;
    inival = low.charCodeAt(0);
    endval = high.charCodeAt(0);
  } else {
    inival = (isNaN(low) ? 0 : low);
    endval = (isNaN(high) ? 0 : high);
  }

  plus = ((inival > endval) ? false : true);
  if (plus) {
    while (inival <= endval) {
      matrix.push(((chars) ? String.fromCharCode(inival) : inival));
      inival += walker;
    }
  } else {
    while (inival >= endval) {
      matrix.push(((chars) ? String.fromCharCode(inival) : inival));
      inival -= walker;
    }
  }

  return matrix;
}

function f_user_zl() {
    var ulen=$("#user-zl-usname").val();
    var address=$(".address").val();
    var qq=$("#qq").val();
    var sex = $('input[name="sex"]:checked').val();
    var yeah = $('select[name="year"]').val();
    var moth = $('select[name="month"]').val();
    var day = $('select[name="day"]').val();
    var edu = $('select[name="education"]').val();
    var job = $('select[name="job"]').val();
    if(ulen.length < 2 || ulen.length >16){
        alert("您输入的昵称不符合要求");
        $('#user-zl-usname').focus();
        return false;
    }
    if(sex==''){
        alert("请选择性别！");
        return false;
    }
    if(address==''){
        alert("详细地址不能为空！");
        $('.address').focus();
        return false;
    }
    //^表示不匹配。d表示任意数字，{5,10}表示长度为5到10。
    var reg=/^\d{5,12}$/;
    if(!reg.test(qq)){
        alert("请输入你正确的QQ号");
        $("#qq").focus();
        return false;
    }

    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/userUpdateInfo",
        data:{'rnd': Math.random(),'member_nickname':ulen, 'year':yeah, 'moth':moth, 'day':day, 'sex':sex, 'education':edu, 'job':job, 'qq':qq, 'address':address},
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback:"apiUpdateUserInfo",
        success: function(json) {
            if(json.status == 1) {
                alert('提交成功');
                window.location.href = window.location.href;
            }else{
                alert(json.msg);
            }
        },
        error: function() {}
    });
}

$(document).ready(function() {
    var mydate = new Date();
    var _y = mydate.getFullYear();
    var y = []; y = range(1940,_y);
    var yoption = '';
    for(var i=y.length-1;i>=0;i--) {
        yoption += '<option value="'+y[i]+'">'+y[i]+'</option>';
    }
    $('select[name="year"]').html(yoption);
    //get user info
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/userAvatarVerifyInfo",
        data:{},
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback:"apiUserAvatarVerifyInfo",
        success: function(json) {
            if(json.status == 1) {
                $('#zl1-infor-con').html(json.info);
                $('.bianji').show();
            }
        },
        error: function() {}
    });
});

function e_user_zl() {
    $('.e-disabled').attr('disabled', false);
}