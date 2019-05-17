/**
 * Created by CHIBM on 2019/1/2.
 */
$('#sitestable').DataTable({
    dom: "Blfrtip",
    buttons: [
        {
            extend: "copy",
            className: "btn-sm"
        },
        {
            extend: "csv",
            className: "btn-sm"
        },
        {
            extend: "excelHtml5",
            className: "btn-sm"
        },
        {
            extend: "pdfHtml5",
            className: "btn-sm"
        },
        {
            extend: "print",
            className: "btn-sm"
        },

    ],
    // buttons: [
    //     {
    //         'extend': 'excel', //导出文件格式为excel
    //         'text': '导出',  //按钮标题
    //         'title': 'XXX-1132', //导出的excel标题
    //         'className': 'btn btn-primary', //按钮的class样式
    //         'exportOptions': { //从DataTable中选择要收集的数据。这包括列、行、排序和搜索的选项。请参阅button.exportdata()方法以获得完整的详细信息——该参数所提供的对象将直接传递到该操作中，以收集所需的数据，更多options选项参见：https://datatables.net/reference/api/buttons.exportData()
    //             'format': { //用于导出将使用的单元格格式化函数的容器对象 format有三个子标签，header，body和foot
    //                 body: function (data, row, column, node) { //body区域的function，可以操作需要导出excel的数据格式
    //                     if (column === 4 && (data == null || data == "" || data == "0%")) {
    //                         return 0;
    //                     }
    //                     else {
    //                         return data;
    //                     }
    //                 }
    //             }
    //         }
    //     }
    // ],
    responsive: true
});

$('#sitestable tbody tr').click(function () {
    siteid = $(this).attr("data-key");
    console.log(siteid);
    // window.location.href = currentbase_url + "/1/k-" + $('#txt-search').val();
    window.open('pages/sitedetail/'+siteid);
});



