$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function DeleteOtherContact(id, url){
    console.log(id,url)
    if(confirm("Bạn có thực sự muốn xóa liên hệ khác này không?")){
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
                        location.reload();
                    },1000)
                }
                else {
                    toastr.error("Xóa không thành công");
                }
            }
        })
    }
};