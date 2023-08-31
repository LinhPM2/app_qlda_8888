$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function DeleteDealer(id, url){
    console.log(id,url)
    if(confirm("Bạn có thực sự muốn xóa đại lý này không?")){
        $.ajax({
            type: 'DELETE',
            datatype:JSON,
            data:{id},
            url:url,
            success:function (result){
                console.log(result);
                if(result.error == 'false'){
                    toastr.success(result.message)
                    setTimeout(()=>{
                        setValue();
                    },1000)
                }
                else {
                    toastr.error("Xóa không thành công");
                }
            }
        })
    }
};
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
const sendAjax = (type, data, url, callbackOnSuccess, datatype = JSON, actionString = "Thao tác") => {
    //skip opt params ---> undefined
    $.ajax({
        type: type,
        datatype:datatype,
        data:data,
        url:url,
        success: callbackOnSuccess ? callbackOnSuccess : toastr.success(`${actionString} thành công`),
        error: toastr.error(`${actionString} không thành công`)
    })
}

