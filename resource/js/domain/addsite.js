/**
 * Created by CH on 2018/12/6.
 */


$('#send').click(function (e) {
    if ($('#sel-sitelevel').val() == '0') {
        toastr.warning('请选择机房等级');
        return false;
    }

    e.preventDefault();
    var submit = true;


    // evaluate the form using generic validaing
    if (!validator.checkAll($('#form-site'))) {
        submit = false;
    }

    if (submit) {
        // toastr.success('提交数据成功');

        var formdata = $('#form-site').serializeObject();
        addsite(formdata);
        // console.log(formdata);
        // setTimeout('this.submit();',2000);
        // this.submit();//仅作刷新表单作用。
    }
    return false;
});


function addsite(data) {
    // console.log(JSON.stringify($('#form1').serializeObject()));
    // var formdata = $('#form1').serializeObject();
    $.ajax({
        url: baseserviceurl + "/addsite",
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        type: 'POST',
        data: {
            'siteinfo': data,
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



$('#modalconfirm').click(function () {
    $('#form-site').submit();
});
