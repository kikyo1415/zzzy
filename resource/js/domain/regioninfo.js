/**
 * Created by CH on 2018/10/21.
 */

function getcities() {
    $.ajax({
        url: baseserviceurl+"/getcities",
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        type: 'POST',
        data: {

        },
        async: true,
        dataType: 'json',
        context: document.body,
        success: function(data) {
            console.log(data);
            if(data.state!='1'){
                $('#loading').modal('hide');
                //TODO:数据库错误提示
                return;
            }

            var cities=data.data;
            $('#sel-city').html('');
           var html='';
            for(var i=0;i<cities.length;i++){
                html+="<option>"+cities[i].city+"</option>";
            }
            $('#sel-city').html(html);
            getareaes(cities[0].city);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {

            // alert(XMLHttpRequest.status);
            // alert(XMLHttpRequest.readyState);
            // alert(textStatus);
        }
    });
}

function getareaes(cityname) {
    $.ajax({
        url: baseserviceurl+"/getareaes",
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        type: 'POST',
        data: {
            'city':cityname
        },
        async: true,
        dataType: 'json',
        context: document.body,
        success: function(data) {
            console.log(data);
            var areaes=data.data;
            $('#sel-area').html('');
            var  html='';
            for(var i=0;i<areaes.length;i++){
                html+="<option>"+areaes[i].area+"</option>";
            }
            $('#sel-area').html(html);
            getstreets($('#sel-city').val(),areaes[0].area);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            $('#loading').modal('hide');
            // alert(XMLHttpRequest.status);
            // alert(XMLHttpRequest.readyState);
            // alert(textStatus);
        }
    });
}

function getstreets(cityname,areaname) {
    $.ajax({
        url: baseserviceurl+"/getstreets",
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        type: 'POST',
        data: {
            'city':cityname,
            'area':areaname
        },
        async: true,
        dataType: 'json',
        context: document.body,
        success: function(data) {
            console.log(data);
            var  streets=data.data;
            $('#addresscode1').html('');
            var html='';
            for(var i=0;i<streets.length;i++){
                html+="<option value='" + streets[i].ID + "'>"+streets[i].street+"</option>";
            }
            $('#addresscode1').html(html);
            getchannels();
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            $('#loading').modal('hide');
            // alert(XMLHttpRequest.status);
            // alert(XMLHttpRequest.readyState);
            // alert(textStatus);
        }
    });
}
