/**
 * Created by CH on 2018/10/29.
 */
$(function () {
    toastr.options.positionClass = 'toast-top-center';//设置toast提示框初始位置。
});

//此处采用提交时拦截submit请求，不采用loginsub.click里return false，
// 目的在于启用疑似前段框架中自带的form.submit中的验证。
$('#form-login').submit(function (e) {
    e.preventDefault();
    $('#loginsub').attr("disabled", true);
    if (validateinputform())
        validateloginuser();

});

$('#loginsub').click(function () {

    // e.preventDefault();
    // if (validateinputform())
    //     validateloginuser();
    // else
    //     toastr.warning('请填写完整');
    // return false;
});

function validateinputform() {
    var isinputfulll = $('#lg-username').val() != '' && $('#lg-userpwd').val() != '';
    return isinputfulll;
}

function validateloginuser() {
    // console.log(JSON.stringify($('#form-login').serializeObject()));
    var formdata = $('#form-login').serializeObject();
    $.ajax({
        url: baseserviceurl + "/validatelogin",
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        type: 'POST',
        data: {
            'logininfo': formdata,
        },
        async: true,
        dataType: 'json',
        context: document.body,
        success: function (data) {
            console.log(data);
            if (data.state == '1') {
                if (data.loginresult.loginstate) {
                    console.log('success');//TODD:location to index.html.
                    window.location="pages/index.html";
                }
                else {
                    toastr.error('用户名或密码错误');
                    $('#loginsub').attr("disabled", false);
                }
            }
            else {
                toastr.error('接口调用失败');
                $('#loginsub').attr("disabled", false);
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            toastr.error('服务器内部错误');
            $('#loginsub').attr("disabled", false);
            // alert(XMLHttpRequest.status);
            // alert(XMLHttpRequest.readyState);
            // alert(textStatus);
        }
    });
}


function loginsubbtndis() {

}

function loginsubbtnena() {

}

/**
 * 自动将form表单封装成json对象
 */
$.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};