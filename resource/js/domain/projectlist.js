/**
 * Created by CH on 2018/11/6.
 */
var proid;
$(function () {
    toastr.options.positionClass = 'toast-top-center';//设置toast提示框初始位置。
});
$('#btn-search').click(function () {
    window.location.href = currentbase_url + "/1/k-" + $('#txt-search').val();
    //window.open(currentbase_url + "/1/k-" + $('#txt-search').val());
});

$('.act_signbill').click(function () {
    proid = $(this).attr("data-comdata");
    $('#tipmodal').modal('show');
});

$('#modalconfirm').click(function () {
    signbill(proid);
    // console.log(proid);
});


function signbill(proid) {
    $.ajax({
        url: serviceurl + "/signbill",
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        type: 'POST',
        data: {
            'proid': proid,
        },
        async: false,
        dataType: 'json',
        context: document.body,
        success: function (data) {
            console.log(data);
            if (data.state == '1') {
                $('#tipmodal').modal('hide');
                window.location.reload(true);
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