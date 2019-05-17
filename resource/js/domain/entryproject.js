/**
 * Created by CH on 2018/10/21.
 */
$(function () {
    $('#loading').modal('show');
    getcities();

    // getareaes('成都市');
    // getstreets('成都市','锦江区');
});
$('#send').click(function (e) {
    combineaddress();
    // if ($('#sel-fran').val() == '') {
    //     toastr.warning('请选择所属经销商');
    //     return false;
    // }
    e.preventDefault();
    var submit = true;
    // evaluate the form using generic validaing
    if (!validator.checkAll($('#form-project'))) {
        submit = false;
    }
    if (submit) {
        // toastr.success('提交数据成功');
        console.log(JSON.stringify($('#form-project').serializeObject()));
        entryproject();
        // setTimeout('this.submit();',2000);
        // this.submit();//仅作刷新表单作用。
    }
    return false;
});

$('#modalconfirm').click(function () {
    $('#form-project').submit();
});


function entryproject() {
    var formdata = $('#form-project').serializeObject();
    $.ajax({
        url: baseserviceurl + "/entryproject",
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        type: 'POST',
        data: {
            'projectinfo': formdata,
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
        }
    });
}

function getchannels() {
    $.ajax({
        url: baseserviceurl+"/getchannels",
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        type: 'POST',
        data: {
        },
        async: true,
        dataType: 'json',
        context: document.body,
        success: function(data) {
            console.log(data);
            var  channels=data.data;
            $('#sel-channel').html('');
            var html='';
            for(var i=0;i<channels.length;i++){
                html+="<option value='" + channels[i].channelcode + "'>"+channels[i].channelname+"</option>";
            }
            $('#sel-channel').html(html);
            $('#loading').modal('hide');
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            $('#loading').modal('hide');
            // alert(XMLHttpRequest.status);
            // alert(XMLHttpRequest.readyState);
            // alert(textStatus);
        }
    });
}

function combineaddress() {
    $('#addresscode2').val($('#addressxq').val() + '-' + $('#addressld').val() + '栋' + $('#addressdy').val() + '单元' + $('#addressroom').val() + '号')
}

$('#sel-city').change(function () {
    getareaes($('#sel-city').val());
});

$('#sel-area').change(function () {
    getstreets($('#sel-city').val(), $('#sel-area').val());
});


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