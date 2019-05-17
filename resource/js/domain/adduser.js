/**
 * Created by CH on 2018/10/23.
 */
$(function () {
    $('#loading').modal('show');
    getallfran();
    toastr.options.positionClass = 'toast-top-center';//设置toast提示框初始位置。
});

$('#submituser').click(function (e) {
    if ($('#sel-fran').val() == '') {
        toastr.warning('请选择所属经销商');
        return false;
    }

    e.preventDefault();
    var submit = true;


    // evaluate the form using generic validaing
    if (!validator.checkAll($('#form1'))) {
        submit = false;
    }

    if (submit) {
        // toastr.success('提交数据成功');
        adduser();
        // setTimeout('this.submit();',2000);
        // this.submit();//仅作刷新表单作用。
    }
    return false;
});

$('#modalconfirm').click(function () {
    $('#form1').submit();
});


function getallfran() {
    $.ajax({
        url: franchiserserviceurl + "/getallfranchiser",
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        type: 'POST',
        data: {},
        async: true,
        dataType: 'json',
        context: document.body,
        success: function (data) {
            //console.log(data);
            var frans = data.data;
            $('#sel-storefran').html('');
            var html = '';

            if (frans) {
                html += "<option value=''>请选择</option>";
                for (var i = 0; i < frans.length; i++) {
                    html += "<option value='" + frans[i].ID + "'>" + frans[i].franname + "</option>";
                }
            }
            else {
                html += "<option value=''>没有任何囤货商，请先注册囤货商</option>";
            }
            $('#sel-fran').html(html);
            $('#loading').modal('hide');
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            // alert(XMLHttpRequest.status);
            // alert(XMLHttpRequest.readyState);
            // alert(textStatus);
            $('#loading').modal('hide');
        }
    });
}

function adduser() {
    // console.log(JSON.stringify($('#form1').serializeObject()));
    var formdata = $('#form1').serializeObject();
    $.ajax({
        url: baseserviceurl + "/adduser",
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        type: 'POST',
        data: {
            'userinfo': formdata,
        },
        async: false,
        dataType: 'json',
        context: document.body,
        success: function (data) {
            console.log(data);
            if (data.state == '1') {
                $('#tipmodal').modal('show');
            }
            else {
                toastr.error('操作失败');
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            toastr.error('服务器内部错误');
            // alert(XMLHttpRequest.status);
            // alert(XMLHttpRequest.readyState);
            // alert(textStatus);
        }
    });
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