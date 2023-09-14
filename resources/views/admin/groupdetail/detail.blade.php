@extends('admin.main')
@section('content')
<div class="px-4 py-2">
    <div>
    <a href="/admin/groupdetail/add/{{$id}}" class="btn btn-success">Thêm thành viên</a>
    </div>
    {{-- <div class="row mt-3">
        @foreach ($groupDetails as $groupdetail )
        <div class="col-sm-3 mb-3 mb-sm-0">
          <div class="card">
            <div class="card-body -100">
              <p class="card-text">Tên :{{$groupdetail->dealerName}}</p>
              <p class="card-text">Số điện thoại :{{$groupdetail->phoneNumber}}</p>
              <p class="card-text text-truncate ">Quốc gia :{{$groupdetail->country}}</p>
              <button class="btn btn-danger">Xoá</button>
            </div>
          </div>
        </div>
        @endforeach
    </div> --}}

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
                @foreach ($groupDetails as $groupdetail )
              <tr>
                <td >{{$groupdetail->dealerName}}</td>
                <td >{{$groupdetail->phoneNumber}}</td>
                <td >{{$groupdetail->country}}</td>
                <td >{{$groupdetail->businessItem}}</td>
                <td><button onclick="DeleteGroupDetail({{$groupdetail->id}},'/admin/groupdetail/delete')" class="btn btn-danger">Xoá</button></td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
@endsection
