$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * @author vdac
 * @param {*} type HTTP request type
 * @param {*} data payload (khởi tạo thành object trước khi truyền)
 * @param {*} url  url
 * @param {*} callbackOnSuccess function cần thực hiện khi request thành công, mặc định sẽ thông báo qua toastr
 * @param {*} datatype kiểu dữ liệu, mặc định JSON
 * @param {*} actionString string thao tác, sẽ gắp string này với template thông báo trên toastr
 * @example sendAjax('DELETE', {id: 1}, "google.com", undefined, undefined, "Thao tác");
 */
const sendAjax = (type, data, url, callbackOnSuccess,callbackOnError, datatype, actionString = "Thao tác") => {
    //skip opt params ---> undefined
    $.ajax({
        type: type,
        datatype:datatype ? datatype : JSON,
        data:data,
        url:url,
        success: callbackOnSuccess ? callbackOnSuccess : toastr.success(`${actionString} thành công`),
        error: callbackOnError? callbackOnError : toastr.error(`${actionString} không thành công`)
    })
}

