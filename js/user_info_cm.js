//个人资料与防沉迷
var bValid_sfz = false;
var bValid_rn = false;

function isIdCardNo(num) {
    num = num.toUpperCase();
    //身份证号码为15位或者18位，15位时全为数字，18位前17位为数字，最后一位是校验位，可能为数字或字符X。
    if (!(/(^\d{15}$)|(^\d{17}([0-9]|X)$)/.test(num))) {
        //alert('输入的身份证号长度不对，或者号码不符合规定！\n15位号码应全为数字，18位号码末位可以为数字或X。');
        return false;
    }
    //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
    //下面分别分析出生日期和校验位
    var len, re;
    len = num.length;
    if (len == 15) {
        re = new RegExp(/^(\d{6})(\d{2})(\d{2})(\d{2})(\d{3})$/);
        var arrSplit = num.match(re);
        //检查生日日期是否正确
        var dtmBirth = new Date('19' + arrSplit[2] + '/' + arrSplit[3] + '/' + arrSplit[4]);
        var bGoodDay;
        bGoodDay = (dtmBirth.getYear() == Number(arrSplit[2])) && ((dtmBirth.getMonth() + 1) == Number(arrSplit[3])) && (dtmBirth.getDate() == Number(arrSplit[4]));
        if (!bGoodDay) {
            //alert('输入的身份证号里出生日期不对！');
            return false;
        } else {
            //将15位身份证转成18位
            //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
            var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
            var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
            var nTemp = 0,
                i;
            num = num.substr(0, 6) + '19' + num.substr(6, num.length - 6);
            for (i = 0; i < 17; i++) {
                nTemp += num.substr(i, 1) * arrInt[i];
            }
            num += arrCh[nTemp % 11];
            return num;
        }
    }
    if (len == 18) {
        re = new RegExp(/^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/);
        var arrSplit = num.match(re);
        //检查生日日期是否正确
        var dtmBirth = new Date(arrSplit[2] + "/" + arrSplit[3] + "/" + arrSplit[4]);
        var bGoodDay;
        bGoodDay = (dtmBirth.getFullYear() == Number(arrSplit[2])) && ((dtmBirth.getMonth() + 1) == Number(arrSplit[3])) && (dtmBirth.getDate() == Number(arrSplit[4]));
        if (!bGoodDay) {
            //alert(dtmBirth.getYear());
            //alert(arrSplit[2]);
            //alert('输入的身份证号里出生日期不对！');
            return false;
        } else {
            //检验18位身份证的校验码是否正确。
            //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
            var valnum;
            var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
            var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
            var nTemp = 0,
                i;
            for (i = 0; i < 17; i++) {
                nTemp += num.substr(i, 1) * arrInt[i];
            }
            valnum = arrCh[nTemp % 11];
            if (valnum != num.substr(17, 1)) {
                //alert('18位身份证的校验码不正确！应该为：' + valnum);
                return false;
            }
            return num;
        }
    }
    return false;
}

function chkname() {
    bValid_rn = false;
    var rn_str = $("#truename").val();
    if (rn_str.match(/^[\u4e00-\u9fa5]{2,4}$/g)) {
        ShowMsg("msgname", 1, "可用的真实姓名!");
        bValid_rn = true;
        return;
    }
    ShowMsg("msgname", 0, "请检查姓名是否是2~4汉字，例如：王五");
}

function chkidcard() {
    var str_NO = $("#sfznum").val();
    bValid_sfz = false;
    if (isIdCardNo(str_NO)) {
        ShowMsg("msgsfz", 1, "身份证可用!");
        bValid_sfz = true;
    } else {
        ShowMsg("msgsfz", 0, "身份证有误，例如：320812198011111110");
        bValid_sfz = false;
    }
}

function ShowMsg(IdStr,ErrNum,ErrStr){
    var ClrArr=new Array("#f00","#33f","#339900");
    $("#"+IdStr).css({fontWeight:"bold",fontSize:"9pt",color:ClrArr[ErrNum]});
    $("#"+IdStr).html(ErrStr);
}

function form_submit(){
    chkidcard();if(!bValid_sfz){return false;}
    chkname();if(!bValid_rn){return false;}
    var realname = $("#truename").val();
    var idcardno = $("#sfznum").val();
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/userUpdateCm",
        data:{'truename':realname, 'sfznum':idcardno},
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback:"apiUpdateUserCm",
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
    //get user info
    $.ajax({
        type: "get",
        async: true,
        url: api_url+"/checkUserFcm",
        data:{},
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback:"apiCheckUserFcm",
        success: function(json) {
            if(json.status == 1) {
                $('#we-name-input').html(json.truename);
                $('#we-idcard-input').html(json.idcard);
                $('.submit').remove();
            }
        },
        error: function() {}
    });
});