@extends('admin.main')
@section('content')
<div class="row mt-3">
    <div class="col-6">
        <form action="" method="get">
            <div class="row">
                <div class="col-6">
                    <input class="d-flex form-control rounded" type="text" name="search" value="{{request()->search}}" class="form-control" placeholder="Tìm theo tên">
                </div>
                <div class="col-6">
                    <button class="d-flex btn btn-primary" type="submit" class="btn btn-success">Tìm kiếm</i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="px-4 py-2">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Mặt hàng kinh doanh</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($dealers as $dealer)
              <tr>
                <td >{{$dealer->dealerName}}</td>
                <td >{{$dealer->phoneNumber}}</td>
                <td >{{$dealer->specificAddress}}</td>
                <td >{{$dealer->businessItem}}</td>
                <td><a href="/admin/order/add/{{$dealer->id}}" class="btn btn-primary">Chọn</a></td>
              </tr>
              @endforeach
            </tbody>
        </table>
        {{ $dealers->appends($_GET)->links() }}
    </div>
@endsection

