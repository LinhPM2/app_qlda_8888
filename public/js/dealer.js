$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function DeleteDealer(id, url){
    if(confirm("Bạn có thực sự muốn xóa đại lý này không? thao tác này sẽ xóa toàn bộ các liên hệ khác liên quan!")){
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
