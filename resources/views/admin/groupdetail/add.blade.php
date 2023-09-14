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
    <form action="{{route('gd.store')}}" method="post">
        <input type="hidden" name="groupID" value="{{$groupid}}">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Tên</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Quốc gia</th>
                <th scope="col">Mặt hàng kinh doanh</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($dealer as $groupdetail )
              <tr>
                <td >{{$groupdetail->dealerName}}</td>
                <td >{{$groupdetail->phoneNumber}}</td>
                <td >{{$groupdetail->country}}</td>
                <td >{{$groupdetail->businessItem}}</td>
                <td><input class="form-check-input" name="ids[]" type="checkbox" value="{{$groupdetail->id}}"></td>
              </tr>
              @endforeach
              {{ $dealer->appends($_GET)->links() }}
            </tbody>
        </table>
        <div class="col-6">
            <button class="d-flex btn btn-primary" type="submit" class="btn btn-success">Thêm</i></button>
        </div>
        @csrf
    </form>
@endsection
