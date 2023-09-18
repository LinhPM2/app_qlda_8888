@extends('admin.main')
@section('content')
    <div class="px-4 py-2">
        <div>
            <a href="/admin/order/select" class="btn btn-success">Tạo đơn</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Đơn vị</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Chú thích</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->dealerName }}</td>
                        <td>{{ $order->unit }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->notes }}</td>
                        <td>
                            <a href="{{ route('order.edit', ['orderid' => $order->id]) }}" class="btn btn-primary">Sửa</a>
                            <button type="button" data-id="{{ $order->id }}"
                                data-url="{{ route('order.delete', ['id' => $order->id]) }}"
                                @class(['deleteBtn', 'btn btn-danger'])>Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->appends($_GET)->links() }}
    </div>
@endsection
@section('extra_lib')
    <script>
        $(document).ready(function() {
            $('.deleteBtn').click(function() {
                var id = $(this).data('id');
                var url = $(this).data('url');
                Swal.fire({
                    title: 'Xóa đơn hàng này?',
                    text: 'Bạn có chắc chắn muốn xóa không?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    showLoaderOnConfirm: true,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        sendAjax('DELETE', id, url, (res) => {
                            $(this).closest('tr').remove();
                            Swal.fire('Success', res.message, 'success')
                        }, (res) => Swal.fire('Error Deleting', res.error, 'error'), JSON);
                    }
                })
            });
        });
    </script>
@endsection
